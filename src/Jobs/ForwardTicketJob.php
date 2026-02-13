<?php

namespace Pringgojs\LaravelItop\Jobs;

use Exception;
use Illuminate\Support\Facades\DB;
use Pringgojs\LaravelItop\Models\ItopSyncLog;
use Pringgojs\LaravelItop\Clients\DbItopClient;
use Pringgojs\LaravelItop\Models\ItopSyncMapping;

class ForwardTicketJob
{
    public string $fromInstance;
    public string $toInstance;
    public string $ticketId;

    public function __construct(string $fromInstance, string $toInstance, string $ticketId)
    {
        $this->fromInstance = $fromInstance;
        $this->toInstance = $toInstance;
        $this->ticketId = $ticketId;
    }

    public function handle()
    {
        $log = new ItopSyncLog();
        $log->instance_from = $this->fromInstance;
        $log->ticket_id_from = $this->ticketId;
        $log->instance_to = $this->toInstance;

        try {
            $source = new DbItopClient($this->fromInstance);
            $dest = new DbItopClient($this->toInstance);

            $ticket = $source->findTicket($this->ticketId);

            if (! $ticket) {
                $log->status = 'source_not_found';
                $log->message = 'Source ticket not found';
                $log->save();
                return ['status' => 'source_not_found'];
            }

            // Idempotency: check mapping using new entity-based fields first, fallback to old ticket columns
            $mapping = ItopSyncMapping::where('source_instance', $this->fromInstance)
                ->where('entity_type', 'ticket')
                ->where('source_entity_id', $this->ticketId)
                ->first();

            if (! $mapping) {
                // fallback for older mappings
                $mapping = ItopSyncMapping::where('source_instance', $this->fromInstance)
                    ->where('source_ticket_id', $this->ticketId)
                    ->first();
            }

            if ($mapping) {
                $log->status = 'already_forwarded';
                $log->ticket_id_to = $mapping->dest_ticket_id ?? $mapping->dest_entity_id;
                $log->message = 'Ticket already forwarded';
                $log->payload = $ticket;
                $log->save();
                return ['status' => 'already_forwarded', 'dest_ticket_id' => $mapping->dest_ticket_id ?? $mapping->dest_entity_id];
            }

            // Basic mapping: pass through same fields. Users should provide custom transformers later.
            $payload = $ticket;

            // Handle configured relations for this flow (e.g., contacts, persons)
            $flows = config('itop.flows', []);
            $flow = null;
            foreach ($flows as $f) {
                if (($f['from'] ?? null) === $this->fromInstance && ($f['to'] ?? null) === $this->toInstance) {
                    $flow = $f;
                    break;
                }
            }

            if ($flow && ! empty($flow['relations']) && is_array($flow['relations'])) {
                foreach ($flow['relations'] as $relationName => $relationConfig) {
                    $relationTable = $relationConfig['table'] ?? $relationName;
                    $foreignKey = $relationConfig['foreign_key'] ?? 'ticket_id';
                    $mapToField = $relationConfig['map_to_field'] ?? null;
                    $uniqueKeys = $relationConfig['unique_keys'] ?? [];

                    // fetch related rows from source
                    $sourceRows = DB::connection($source->getConnection())
                        ->table($relationTable)
                        ->where($foreignKey, $this->ticketId)
                        ->get()->map(fn($r) => (array) $r)->toArray();

                    foreach ($sourceRows as $row) {
                        $sourceEntityId = (string) ($row['id'] ?? $row['ID'] ?? '');

                        // check existing mapping
                        $entityMapping = ItopSyncMapping::where('source_instance', $this->fromInstance)
                            ->where('entity_type', $relationName)
                            ->where('source_entity_id', $sourceEntityId)
                            ->first();

                        if ($entityMapping) {
                            $mappedId = $entityMapping->dest_entity_id;
                        } else {
                            // try to find by unique keys in destination
                            $destFilters = [];
                            foreach ($uniqueKeys as $k) {
                                if (isset($row[$k])) {
                                    $destFilters[$k] = $row[$k];
                                }
                            }

                            $found = null;
                            if (! empty($destFilters)) {
                                $found = DB::connection($dest->getConnection())->table($relationTable)->where($destFilters)->first();
                            }

                            if ($found) {
                                $mappedId = (string) ($found->id ?? $found->ID ?? '');
                            } else {
                                // create in dest (strip id and foreign key)
                                $createData = $row;
                                if (isset($createData['id'])) {
                                    unset($createData['id']);
                                }
                                if (isset($createData[$foreignKey])) {
                                    unset($createData[$foreignKey]);
                                }

                                $createdEntity = DB::connection($dest->getConnection())->table($relationTable)->insertGetId($createData);
                                $mappedId = (string) $createdEntity;
                            }

                            // save entity mapping
                            ItopSyncMapping::create([
                                'source_instance' => $this->fromInstance,
                                'source_ticket_id' => $this->ticketId,
                                'dest_instance' => $this->toInstance,
                                'dest_ticket_id' => null,
                                'entity_type' => $relationName,
                                'source_entity_id' => $sourceEntityId,
                                'dest_entity_id' => $mappedId,
                                'meta' => [
                                    'created_at' => now()->toDateTimeString(),
                                ],
                            ]);
                        }

                        // if mapping indicates we should inject to ticket payload
                        if ($mapToField) {
                            $payload[$mapToField] = $mappedId;
                        }
                    }
                }
            }

            $created = $dest->createTicket($payload);

            // Save mapping and log (populate both old and new columns)
            $destId = (string) ($created['id'] ?? $created['ID'] ?? '');
            $map = ItopSyncMapping::create([
                'source_instance' => $this->fromInstance,
                'source_ticket_id' => $this->ticketId,
                'dest_instance' => $this->toInstance,
                'dest_ticket_id' => $destId,
                'entity_type' => 'ticket',
                'source_entity_id' => $this->ticketId,
                'dest_entity_id' => $destId,
                'meta' => [
                    'created_at' => now()->toDateTimeString(),
                ],
            ]);

            $log->status = 'forwarded';
            $log->ticket_id_to = $map->dest_ticket_id;
            $log->payload = $ticket;
            $log->response = $created;
            $log->save();

            return ['status' => 'forwarded', 'dest_ticket_id' => $map->dest_ticket_id];
        } catch (Exception $e) {
            $log->status = 'error';
            $log->message = $e->getMessage();
            $log->payload = []; 
            $log->save();

            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}
