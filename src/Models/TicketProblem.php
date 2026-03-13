<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketProblem extends Model
{
    use HasFactory;

    protected $table = 'ticket_problem';

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function servicesubcategory()
    {
        return $this->belongsTo(Servicesubcategory::class, 'servicesubcategory_id');
    }

    public function relatedChange()
    {
        return $this->belongsTo(Change::class, 'related_change_id');
    }

}