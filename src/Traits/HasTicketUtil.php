<?php
namespace Pringgojs\LaravelItop\Traits;

use Pringgojs\LaravelItop\Models\Change;
use Pringgojs\LaravelItop\Models\Contact;
use Pringgojs\LaravelItop\Models\LnkContactToTicket;
use Pringgojs\LaravelItop\Models\Organization;
use Pringgojs\LaravelItop\Models\TicketIncident;
use Pringgojs\LaravelItop\Models\TicketProblem;
use Pringgojs\LaravelItop\Models\TicketRequest;

trait HasTicketUtil
{
    
    public function create($ticketPayload = [], $contacts = [], $attachments =[] )
    {
        $ticket = $this->createTicket($ticketPayload);
        $this->createContacts($ticket, $contacts);
        $this->createAttachments($ticket, $attachments);
        return $ticket;
    }

    private function createTicket($ticketPayload)
    {
        return $this->create($ticketPayload);
    }

}