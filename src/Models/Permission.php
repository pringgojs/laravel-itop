<?php

namespace Pringgojs\LaravelItop\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    public function scopeSearch($q, $search = null)
    {
        if (!$search) return;

        $q->where('name', 'like', '%'.$search.'%');
    }

    public function scopeOrderByDefault($q)
    {
        $q->orderBy('name');
    }
}
