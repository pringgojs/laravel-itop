<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivSyncReplica extends Model
{
    use HasFactory;

    protected $table = 'priv_sync_replica';

    public function syncSource()
    {
        return $this->belongsTo(SyncSource::class, 'sync_source_id');
    }

    public function dest()
    {
        return $this->belongsTo(Dest::class, 'dest_id');
    }

    public function destClassDest()
    {
        return $this->belongsTo(DestClassDest::class, 'dest_class_dest_id');
    }

}