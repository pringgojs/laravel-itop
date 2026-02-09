<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Model;

class ItopSyncLog extends Model
{
    protected $table;

    protected $fillable = [
        'instance_from',
        'ticket_id_from',
        'instance_to',
        'ticket_id_to',
        'status',
        'payload',
        'response',
        'message',
    ];

    protected $casts = [
        'payload' => 'array',
        'response' => 'array',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('itop.migrations.logs_table', 'itop_sync_logs');
    }
}
