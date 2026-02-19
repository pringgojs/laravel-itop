<?php
namespace Pringgojs\LaravelItop\Traits;

use Pringgojs\LaravelItop\Models\Attachment;
use Pringgojs\LaravelItop\Models\Change;
use Pringgojs\LaravelItop\Models\Contact;
use Pringgojs\LaravelItop\Models\LnkContactToTicket;
use Pringgojs\LaravelItop\Models\Organization;
use Pringgojs\LaravelItop\Models\TicketIncident;
use Pringgojs\LaravelItop\Models\TicketProblem;
use Pringgojs\LaravelItop\Models\TicketRequest;

trait HasTicketRelations
{
    
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function ticketRequest()
    {
        return $this->hasOne(TicketRequest::class, 'id', 'id');
    }

    public function ticketProblem()
    {
        return $this->hasOne(TicketProblem::class, 'id', 'id');
    }

    public function ticketIncident()
    {
        return $this->hasOne(TicketIncident::class, 'id', 'id');
    }

    /* yg punya change, adalah ticket dengan finalClass: NormalChange, RoutineChange, EmergencyChange  */
    public function ticketChange()
    {
        return $this->hasOne(Change::class, 'id', 'id');
    }

    public function contacts()
    {
        return $this->hasMany(LnkContactToTicket::class, 'ticket_id', 'id');
    }

    public function agent()
    {
        return $this->belongsTo(Contact::class, 'agent_id');
    }

    public function team()
    {
        return $this->belongsTo(Contact::class, 'team_id');
    }

    public function caller()
    {
        return $this->belongsTo(Contact::class, 'caller_id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'item_id', 'id')->where('item_class', $this->finalclass);
    }
}