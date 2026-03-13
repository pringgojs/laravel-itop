<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketRequest extends Model
{
    use HasFactory;

    protected $table = 'ticket_request';

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function servicesubcategory()
    {
        return $this->belongsTo(Servicesubcategory::class, 'servicesubcategory_id');
    }

    public function parentRequest()
    {
        return $this->belongsTo(TicketRequest::class, 'parent_request_id');
    }

    public function parentIncident()
    {
        return $this->belongsTo(TicketIncident::class, 'parent_incident_id');
    }

    public function parentProblem()
    {
        return $this->belongsTo(TicketProblem::class, 'parent_problem_id');
    }

    public function parentChange()
    {
        return $this->belongsTo(Change::class, 'parent_change_id');
    }

}