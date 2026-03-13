<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customercontract extends Model
{
    use HasFactory;

    protected $table = 'customercontract';

    public function lnkcustomercontracttoservices()
    {
        return $this->hasMany(Lnkcustomercontracttoservice::class, 'customercontract_id');
    }

}