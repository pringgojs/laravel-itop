<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $table = 'contract';

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function contracttype()
    {
        return $this->belongsTo(Contracttype::class, 'contracttype_id');
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    public function lnkcontacttocontracts()
    {
        return $this->hasMany(Lnkcontacttocontract::class, 'contract_id');
    }

    public function lnkcontracttodocuments()
    {
        return $this->hasMany(Lnkcontracttodocument::class, 'contract_id');
    }

}