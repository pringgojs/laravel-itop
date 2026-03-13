<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Providercontract extends Model
{
    use HasFactory;

    protected $table = 'providercontract';

    public function lnkfunctionalcitoprovidercontracts()
    {
        return $this->hasMany(Lnkfunctionalcitoprovidercontract::class, 'providercontract_id');
    }

    public function lnkprovidercontracttoservices()
    {
        return $this->hasMany(Lnkprovidercontracttoservice::class, 'providercontract_id');
    }

}