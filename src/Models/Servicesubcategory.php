<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicesubcategory extends Model
{
    use HasFactory;

    protected $table = 'servicesubcategory';

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function ticketIncidents()
    {
        return $this->hasMany(TicketIncident::class, 'servicesubcategory_id');
    }

    public function ticketProblems()
    {
        return $this->hasMany(TicketProblem::class, 'servicesubcategory_id');
    }

    public function ticketRequests()
    {
        return $this->hasMany(TicketRequest::class, 'servicesubcategory_id');
    }

}