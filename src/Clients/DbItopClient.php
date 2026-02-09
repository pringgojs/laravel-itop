<?php

namespace Pringgojs\LaravelItop\Clients;

use Pringgojs\LaravelItop\Contracts\ItopClientInterface;
use Illuminate\Support\Facades\DB;

class DbItopClient implements ItopClientInterface
{
    protected string $instanceName;
    protected array $config;
    protected string $connection;
    protected string $table;

    public function __construct(string $instanceName)
    {
        $this->instanceName = $instanceName;
        $this->config = config('itop.instances.' . $instanceName, []);
        $this->connection = $this->config['connection'] ?? config('database.default');
        $this->table = $this->config['table'] ?? 'tickets';
    }

    public function getConnection(): string
    {
        return $this->connection;
    }

    public function getDefaultTable(): string
    {
        return $this->table;
    }

    public function findTicket(string $ticketId): ?array
    {
        $row = DB::connection($this->connection)
            ->table($this->table)
            ->where('id', $ticketId)
            ->first();

        if (! $row) {
            return null;
        }

        return (array) $row;
    }

    public function createTicket(array $data): array
    {
        $id = DB::connection($this->connection)
            ->table($this->table)
            ->insertGetId($data);

        $created = DB::connection($this->connection)
            ->table($this->table)
            ->where('id', $id)
            ->first();

        return (array) $created;
    }

    public function search(array $filters, int $limit = 50, int $offset = 0): array
    {
        $query = DB::connection($this->connection)->table($this->table);

        foreach ($filters as $k => $v) {
            $query->where($k, $v);
        }

        return $query->limit($limit)->offset($offset)->get()->map(fn($r) => (array) $r)->toArray();
    }

    /**
     * Find rows in arbitrary table on this iTop connection
     */
    public function findInTable(string $table, array $filters = [], int $limit = 50, int $offset = 0): array
    {
        $query = DB::connection($this->connection)->table($table);

        foreach ($filters as $k => $v) {
            $query->where($k, $v);
        }

        return $query->limit($limit)->offset($offset)->get()->map(fn($r) => (array) $r)->toArray();
    }

    public function findOneInTable(string $table, array $filters = []): ?array
    {
        $row = DB::connection($this->connection)->table($table);

        foreach ($filters as $k => $v) {
            $row->where($k, $v);
        }

        $r = $row->first();

        return $r ? (array) $r : null;
    }

    public function createInTable(string $table, array $data): array
    {
        // prevent inserting id from source
        if (isset($data['id'])) {
            unset($data['id']);
        }

        $id = DB::connection($this->connection)->table($table)->insertGetId($data);

        $created = DB::connection($this->connection)->table($table)->where('id', $id)->first();

        return (array) $created;
    }
}
