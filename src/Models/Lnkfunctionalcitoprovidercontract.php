<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkfunctionalcitoprovidercontract extends Model
{
    use HasFactory;

    protected $table = 'lnkfunctionalcitoprovidercontract';

    public function providercontract()
    {
        return $this->belongsTo(Providercontract::class, 'providercontract_id');
    }

    public function functionalci()
    {
        return $this->belongsTo(Functionalci::class, 'functionalci_id');
    }

}