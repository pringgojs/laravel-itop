<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sla extends Model
{
    use HasFactory;

    protected $table = 'sla';

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function lnkcustomercontracttoservices()
    {
        return $this->hasMany(Lnkcustomercontracttoservice::class, 'sla_id');
    }

    public function lnkslatoslts()
    {
        return $this->hasMany(Lnkslatoslt::class, 'sla_id');
    }

}