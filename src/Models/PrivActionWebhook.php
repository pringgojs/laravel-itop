<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivActionWebhook extends Model
{
    use HasFactory;

    protected $table = 'priv_action_webhook';

    public function remoteapplicationconnection()
    {
        return $this->belongsTo(Remoteapplicationconnection::class, 'remoteapplicationconnection_id');
    }

    public function testRemoteapplicationconnection()
    {
        return $this->belongsTo(TestRemoteapplicationconnection::class, 'test_remoteapplicationconnection_id');
    }

}