<?php

namespace Pringgojs\LaravelItop\Utils;

class ArrayHelper
{
    public static function isAssoc(array $arr): bool
    {
        if ($arr === []) {
            return false;
        }

        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    /**
     * Return lifecycle mapping of ticket status => stimulus
     * Extend this array as needed or move to config if you want runtime modification.
     *
     * @return array<string,string>
     */
    public static function lifecycleMapping(): array
    {
        return [
            'new' => 'ev_new',
            'waiting_for_approval' => 'ev_waiting_for_approval',
            'approved' => 'ev_approve',
            'resolved' => 'ev_resolve',
            'closed' => 'ev_close',
            'assigned' => 'ev_assign',
            'rejected' => 'ev_reject',
            'pending' => 'ev_pending',
            'reopened' => 'ev_reopen',
        ];
    }

    /**
     * Get stimulus name for a given ticket status.
     * Returns null when no mapping is found.
     *
     * @param string $status
     * @return string|null
     */
    public static function getStimulusForStatus(string $status): ?string
    {
        $key = self::normalizeStatusKey($status);
        $map = self::lifecycleMapping();

        return $map[$key] ?? null;
    }

    private static function normalizeStatusKey(string $status): string
    {
        $s = strtolower(trim($status));
        $s = preg_replace('/\s+/', '_', $s);
        $s = preg_replace('/[^a-z0-9_]/', '', $s);

        return $s;
    }
}
