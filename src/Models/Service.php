<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service';

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function servicefamily()
    {
        return $this->belongsTo(Servicefamily::class, 'servicefamily_id');
    }

    public function lnkcontacttoservices()
    {
        return $this->hasMany(Lnkcontacttoservice::class, 'service_id');
    }

    public function lnkcustomercontracttoservices()
    {
        return $this->hasMany(Lnkcustomercontracttoservice::class, 'service_id');
    }

    public function lnkdocumenttoservices()
    {
        return $this->hasMany(Lnkdocumenttoservice::class, 'service_id');
    }

    public function lnkfunctionalcitoservices()
    {
        return $this->hasMany(Lnkfunctionalcitoservice::class, 'service_id');
    }

    public function lnkprovidercontracttoservices()
    {
        return $this->hasMany(Lnkprovidercontracttoservice::class, 'service_id');
    }

    public function servicesubcategories()
    {
        return $this->hasMany(Servicesubcategory::class, 'service_id');
    }

    public function ticketIncidents()
    {
        return $this->hasMany(TicketIncident::class, 'service_id');
    }

    public function ticketProblems()
    {
        return $this->hasMany(TicketProblem::class, 'service_id');
    }

    public function ticketRequests()
    {
        return $this->hasMany(TicketRequest::class, 'service_id');
    }

}