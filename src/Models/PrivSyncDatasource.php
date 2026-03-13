<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivSyncDatasource extends Model
{
    use HasFactory;

    protected $table = 'priv_sync_datasource';

    public function person()
    {
        return $this->belongsTo(Person::class, 'user_id');
    }

    public function notifyContact()
    {
        return $this->belongsTo(NotifyContact::class, 'notify_contact_id');
    }

}