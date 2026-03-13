<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivLnkActionNotifToContact extends Model
{
    use HasFactory;

    protected $table = 'priv_lnk_action_notif_to_contact';

    public function privAction()
    {
        return $this->belongsTo(PrivAction::class, 'action_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function privTrigger()
    {
        return $this->belongsTo(PrivTrigger::class, 'trigger_id');
    }

}