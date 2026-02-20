<?php

namespace Pringgojs\LaravelItop\Services\Builders;

class TicketPayloadBuilder implements PayloadBuilderInterface
{
    public static function payload(array $fields = [], bool $asJson = false)
    {
        $payload = [
            'operation' => $fields['operation'] ?? 'core/create',
            'comment' => $fields['comment'] ?? 'ticket created from API',
            'class' => $fields['class'] ?? 'UserRequest',
            'output_fields' => $fields['output_fields'] ?? 'id, ref, title, status',
            'fields' => [
                'org_id' => $fields['org_id'] ?? 1,
                'caller_id' => $fields['caller_id'] ?? 2,
                'title' => $fields['title'] ?? 'Title From API',
                'description' => $fields['description'] ?? 'Desc From API'
            ],
        ];

        if (isset($fields['status'])) {
            $payload['fields']['status'] = $fields['status'];
        }

        if (isset($fields['key'])) {
            $payload['key'] = $fields['key'];
        }

        if (isset($fields['public_log']) && is_array($fields['public_log'])) {
            $payload['fields']['public_log'] = ['items' => $fields['public_log']];
        }

        if (isset($fields['private_log']) && is_array($fields['private_log'])) {
            $payload['fields']['private_log'] = ['items' => $fields['private_log']];
        }

        return $asJson ? json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : $payload;
    }

    
}
