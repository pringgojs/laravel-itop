<?php

return [
    // Default driver: 'db' or 'api'
    'default_driver' => env('ITOP_DRIVER', 'db'),

    // Define iTop instances (for DB-first each instance has a DB connection name)
    'instances' => [
        // example:
        // 'itop_a' => [
        //     'driver' => 'db',
        //     'connection' => 'itop_a',
        //     'table' => 'tickets',
        // ],
    ],

    // Forwarding flows
    'flows' => [
        // example flow from itop_a to itop_b
        // 'a_to_b' => [
        //     'from' => 'itop_a',
        //     'to' => 'itop_b',
        //     'mapping' => [ 'title' => 'title', 'description' => 'description' ],
        //     'only_from_origin' => true,
        // ],
    ],

    // Default table names for internal package storage
    'migrations' => [
        'mappings_table' => 'itop_sync_mappings',
        'logs_table' => 'itop_sync_logs',
    ],
];
