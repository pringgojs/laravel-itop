<?php

namespace Pringgojs\LaravelItop\Services\Builders;

use Pringgojs\LaravelItop\Utils\ArrayHelper;

class AttachmentPayloadBuilder implements PayloadBuilderInterface
{
    public static function payload(array $fields = [], bool $asJson = false)
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

            if (is_array($contents) && ArrayHelper::isAssoc($contents) && isset($contents['filename'])) {
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

    
}
