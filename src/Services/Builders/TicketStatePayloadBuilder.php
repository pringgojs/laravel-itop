<?php

namespace Pringgojs\LaravelItop\Services\Builders;

class TicketStatePayloadBuilder implements PayloadBuilderInterface
{
    public static function payload(array $fields = [], bool $asJson = false)
    {
        $payload = [
            'operation' => $fields['operation'] ?? 'core/apply_stimulus',
            'class' => $fields['class'] ?? 'UserRequest',
            'stimulus' => $fields['stimulus'] ?? null,
            'fields' => [],
            'comment' => $fields['comment'] ?? 'state change via API',
        ];

        if (isset($fields['key'])) {
            $payload['key'] = $fields['key'];
        }


        // Merge explicit fields array if provided
        if (isset($fields['fields']) && is_array($fields['fields'])) {
            $payload['fields'] = array_merge($payload['fields'], $fields['fields']);
        }

        // Always ensure these keys are present in fields if set at top-level or in fields subarray
        foreach (['agent_id', 'pending_reason', 'solution', 'resolution_code'] as $k) {
            if (isset($fields[$k])) {
                $payload['fields'][$k] = $fields[$k];
            } elseif (isset($fields['fields'][$k])) {
                $payload['fields'][$k] = $fields['fields'][$k];
            }
        }

        // public_log and private_log can be provided as string or array(items)
        if (isset($fields['public_log'])) {
            if (is_array($fields['public_log'])) {
                $payload['fields']['public_log'] = ['items' => $fields['public_log']];
            } else {
                $payload['fields']['public_log'] = $fields['public_log'];
            }
        }

        if (isset($fields['private_log'])) {
            if (is_array($fields['private_log'])) {
                $payload['fields']['private_log'] = ['items' => $fields['private_log']];
            } else {
                $payload['fields']['private_log'] = $fields['private_log'];
            }
        }

        // Remove null stimulus if not provided
        if (empty($payload['stimulus'])) {
            unset($payload['stimulus']);
        }

        return $asJson ? json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : $payload;
    }
}
