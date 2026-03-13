<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivAsyncSendNewsroom extends Model
{
    use HasFactory;

    protected $table = 'priv_async_send_newsroom';

    public function privAction()
    {
        return $this->belongsTo(PrivAction::class, 'action_id');
    }

    public function privTrigger()
    {
        return $this->belongsTo(PrivTrigger::class, 'trigger_id');
    }

    public function privTriggerOnobject()
    {
        return $this->belongsTo(PrivTriggerOnobject::class, 'object_id');
    }

}