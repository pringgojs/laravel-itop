<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkprovidercontracttoservice extends Model
{
    use HasFactory;

    protected $table = 'lnkprovidercontracttoservice';

    public function providercontract()
    {
        return $this->belongsTo(Providercontract::class, 'providercontract_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

}