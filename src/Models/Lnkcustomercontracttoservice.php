<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkcustomercontracttoservice extends Model
{
    use HasFactory;

    protected $table = 'lnkcustomercontracttoservice';

    public function customercontract()
    {
        return $this->belongsTo(Customercontract::class, 'customercontract_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function sla()
    {
        return $this->belongsTo(Sla::class, 'sla_id');
    }

}