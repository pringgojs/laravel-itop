<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivLinkActionTrigger extends Model
{
    use HasFactory;

    protected $table = 'priv_link_action_trigger';

    public function link()
    {
        return $this->belongsTo(Link::class, 'link_id');
    }

    public function privAction()
    {
        return $this->belongsTo(PrivAction::class, 'action_id');
    }

    public function privTrigger()
    {
        return $this->belongsTo(PrivTrigger::class, 'trigger_id');
    }

}