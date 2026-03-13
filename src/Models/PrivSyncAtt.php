<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivSyncAtt extends Model
{
    use HasFactory;

    protected $table = 'priv_sync_att';

    public function syncSource()
    {
        return $this->belongsTo(SyncSource::class, 'sync_source_id');
    }

}