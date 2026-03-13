<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkcontacttocontract extends Model
{
    use HasFactory;

    protected $table = 'lnkcontacttocontract';

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

}