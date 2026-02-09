<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Model;

class ItopSyncMapping extends Model
{
    protected $table;

    protected $fillable = [
        'source_instance',
        'source_ticket_id',
        'dest_instance',
        'dest_ticket_id',
        'entity_type',
        'source_entity_id',
        'dest_entity_id',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('itop.migrations.mappings_table', 'itop_sync_mappings');
    }
}
