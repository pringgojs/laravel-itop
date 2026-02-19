<?php

namespace Pringgojs\LaravelItop\Services;

class ItopServiceBuilder
{
    /**
     * Generate payload for ticket creation in iTop API.
     */
    public static function payloadTicketCreate(array $fields = [], bool $asJson = false)
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
                'description' => $fields['description'] ?? 'Desc From API',
                'status' => $fields['status'] ?? 'new',
                'public_log' => ['items' => $fields['public_log'] ?? []],
                'private_log' => ['items' => $fields['private_log'] ?? []],
            ],
        ];

        return $asJson ? json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : $payload;
    }

    /**
     * Generate payload for attachment creation in iTop API.
     * Supports multiple contents with flexible input formats and auto-detection of file data.
     * If $asJson is true, returns the payload as a JSON string; otherwise, returns as an array.
     * The 'contents' field can be provided in various formats:
     * - Single content as an associative array with 'filename', 'mimetype', and '
     * data' or 'binary' (base64 string or raw data).
     * - Multiple contents as an array of such associative arrays.
     * - Alternatively, files can be specified with 'path' to read from filesystem, or directly as base64 strings.
     * The method will normalize the input into the required format for the iTop API, including base64 encoding of file data if necessary.
     * Example usage:
     * $payload = ItopServiceBuilder::payloadAttachmentCreate([
     *   'item_class' => 'UserRequest',
     *   'item_id' => 123,
     *   'item_org_id' => 1,
     *   'contents' => [
     *    [
     *       'filename' => 'example.txt',
     *       'mimetype' => 'text/plain',
     *       'data' => 'VGhpcyBpcyBhbiBleGFtcGxlIGZpbGUu', // base64 encoded content
     *   ]
     *  ]);
     */
    public static function payloadAttachmentCreate(array $fields = [], bool $asJson = false)
    {
        $payload = [
            'operation' => $fields['operation'] ?? 'core/create',
            'class' => $fields['class'] ?? 'Attachment',
            'comment' => $fields['comment'] ?? 'new attachment from API',
            'fields' => [
                'item_class' => $fields['item_class'] ?? 'UserRequest',
                'item_id' => $fields['item_id'] ?? 1,
                'item_org_id' => $fields['item_org_id'] ?? 1,
            ],
        ];

        $normalizedContents = [];

        if (isset($fields['contents'])) {
            $contents = $fields['contents'];

            if (is_array($contents) && self::isAssoc($contents) && isset($contents['filename'])) {
                $contents = [$contents];
            }

            if (is_array($contents)) {
                foreach ($contents as $c) {
                    if (!is_array($c)) {
                        continue;
                    }
                    if (isset($c['path']) && (!isset($c['data']) || $c['data'] === '')) {
                        $normalizedContents[] = self::buildAttachmentContentFromFile($c['path'], $c['filename'] ?? null, $c['mimetype'] ?? null);
                    } elseif (isset($c['binary']) && (!isset($c['data']) || $c['data'] === '')) {
                        $normalizedContents[] = self::buildAttachmentContentFromFile($c['binary'], $c['filename'] ?? null, $c['mimetype'] ?? null);
                    } else {
                        $normalizedContents[] = [
                            'filename' => $c['filename'] ?? '',
                            'mimetype' => $c['mimetype'] ?? '',
                            'data' => $c['data'] ?? '',
                        ];
                    }
                }
            }
        }

        if (empty($normalizedContents) && isset($fields['files']) && is_array($fields['files'])) {
            foreach ($fields['files'] as $f) {
                if (is_string($f)) {
                    $normalizedContents[] = self::buildAttachmentContentFromFile($f);
                } elseif (is_array($f)) {
                    if (isset($f['path'])) {
                        $normalizedContents[] = self::buildAttachmentContentFromFile($f['path'], $f['filename'] ?? null, $f['mimetype'] ?? null);
                    } elseif (isset($f['binary'])) {
                        $normalizedContents[] = self::buildAttachmentContentFromFile($f['binary'], $f['filename'] ?? null, $f['mimetype'] ?? null);
                    } elseif (isset($f['data'])) {
                        $normalizedContents[] = [
                            'filename' => $f['filename'] ?? '',
                            'mimetype' => $f['mimetype'] ?? '',
                            'data' => $f['data'],
                        ];
                    }
                }
            }
        }

        if (empty($normalizedContents) && (isset($fields['filename']) || isset($fields['data']))) {
            $normalizedContents[] = [
                'filename' => $fields['filename'] ?? '',
                'mimetype' => $fields['mimetype'] ?? '',
                'data' => $fields['data'] ?? '',
            ];
        }

        $normalizedContents = array_values(array_filter($normalizedContents, function ($c) {
            return !empty($c['data']);
        }));

        if (!empty($normalizedContents)) {
            if (count($normalizedContents) === 1) {
                $payload['fields']['contents'] = $normalizedContents[0];
            } else {
                $payload['fields']['contents'] = $normalizedContents;
            }
        }

        return $asJson ? json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : $payload;
    }

    public static function buildAttachmentContentFromFile(string $pathOrData, string $filename = null, string $mimetype = null): array
    {
        $isFile = file_exists($pathOrData) && is_readable($pathOrData);

        if ($isFile) {
            $data = file_get_contents($pathOrData);
        } else {
            $data = $pathOrData;
        }

        if (!$isFile && is_string($data) && $data !== '') {
            $decoded = base64_decode($data, true);
            if ($decoded !== false && base64_encode($decoded) === $data) {
                $b64 = $data;
            } else {
                $b64 = base64_encode($data);
            }
        } else {
            $b64 = base64_encode($data);
        }

        if ($filename === null) {
            if ($isFile) {
                $filename = basename($pathOrData);
            } else {
                $filename = 'file.bin';
            }
        }

        if ($mimetype === null) {
            $detected = false;
            if ($isFile && function_exists('finfo_open')) {
                $fi = finfo_open(FILEINFO_MIME_TYPE);
                if ($fi !== false) {
                    $detected = finfo_file($fi, $pathOrData);
                    finfo_close($fi);
                }
            }
            $mimetype = $detected ?: 'application/octet-stream';
        }

        return [
            'filename' => $filename,
            'mimetype' => $mimetype,
            'data' => $b64,
        ];
    }

    private static function isAssoc(array $arr): bool
    {
        if ($arr === []) {
            return false;
        }

        return array_keys($arr) !== range(0, count($arr) - 1);
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
