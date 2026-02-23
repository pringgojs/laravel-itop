<?php

namespace Pringgojs\LaravelItop\Utils;

class ResponseNormalizer
{

    public static function normalizeItopUpdateResponse(array $resp): array
    {
        $result = [
            'code' => $resp['code'] ?? null,
            'message' => $resp['message'] ?? null,
            'object' => null,
        ];

        if (!empty($resp['objects']) && is_array($resp['objects'])) {
            foreach ($resp['objects'] as $objKey => $obj) {
                $fields = $obj['fields'] ?? [];
                $result['object'] = [
                    'code' => $obj['code'] ?? null,
                    'message' => $obj['message'] ?? null,
                    'class' => $obj['class'] ?? null,
                    'id' => $fields['id'] ?? ($obj['key'] ?? null),
                    'ref' => $fields['ref'] ?? null,
                    'title' => $fields['title'] ?? null,
                    'status' => $fields['status'] ?? null,
                    'fields' => $fields,
                ];
                break;
            }
            return $result;
        }

        return $result;
    }

    public static function normalizeItopCreateResponse(array $resp): array
    {
        $result = [
            'code' => $resp['code'] ?? null,
            'message' => $resp['message'] ?? null,
            'object' => null,
        ];

        if (!empty($resp['objects']) && is_array($resp['objects'])) {
            foreach ($resp['objects'] as $objKey => $obj) {
                $fields = $obj['fields'] ?? [];
                $result['object'] = [
                    'class' => $obj['class'] ?? null,
                    'key' => $obj['key'] ?? $objKey,
                    'id' => $fields['id'] ?? ($obj['key'] ?? null),
                    'ref' => $fields['ref'] ?? null,
                    'title' => $fields['title'] ?? null,
                    'status' => $fields['status'] ?? null,
                    'fields' => $fields,
                ];
                break;
            }
            return $result;
        }

        if (!empty($resp['object']) && is_array($resp['object'])) {
            $obj = $resp['object'];
            $fields = $obj['fields'] ?? [];
            $result['object'] = [
                'class' => $obj['class'] ?? null,
                'key' => $obj['key'] ?? null,
                'id' => $fields['id'] ?? ($obj['key'] ?? null),
                'ref' => $fields['ref'] ?? null,
                'title' => $fields['title'] ?? null,
                'status' => $fields['status'] ?? null,
                'fields' => $fields,
            ];
            return $result;
        }

        return $result;
    }
}
