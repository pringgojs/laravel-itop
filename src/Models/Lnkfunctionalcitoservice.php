<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkfunctionalcitoservice extends Model
{
    use HasFactory;

    protected $table = 'lnkfunctionalcitoservice';

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function functionalci()
    {
        return $this->belongsTo(Functionalci::class, 'functionalci_id');
    }

}