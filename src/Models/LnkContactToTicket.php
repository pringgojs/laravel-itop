<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LnkContactToTicket extends Model
{
    use HasFactory;

    protected $table = 'lnkcontacttoticket';
    
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }
}
