<?php

namespace Pringgojs\LaravelItop\Services;

use Carbon\Carbon;

class TicketService
{
    public $ticket;
    public $ticketRequest;
    public $ticketIncident;

    public function __construct($ticket)
    {
        $this->ticket = $ticket;
        $this->ticketRequest = $this->ticket->ticketRequest ?? null;
        $this->ticketIncident = $this->ticket->ticketIncident ?? null;

        if (!$this->ticketRequest && !$this->ticketIncident) return []; // Jika tidak ada ticket request dan ticket incident, return array kosong
    }

}