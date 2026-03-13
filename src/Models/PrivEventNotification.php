<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivEventNotification extends Model
{
    use HasFactory;

    protected $table = 'priv_event_notification';

    public function privTrigger()
    {
        return $this->belongsTo(PrivTrigger::class, 'trigger_id');
    }

    public function privAction()
    {
        return $this->belongsTo(PrivAction::class, 'action_id');
    }

    public function privTriggerOnobject()
    {
        return $this->belongsTo(PrivTriggerOnobject::class, 'object_id');
    }

}