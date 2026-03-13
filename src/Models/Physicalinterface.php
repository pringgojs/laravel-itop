<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physicalinterface extends Model
{
    use HasFactory;

    protected $table = 'physicalinterface';

    public function connectableci()
    {
        return $this->belongsTo(Connectableci::class, 'connectableci_id');
    }

    public function lnkphysicalinterfacetovlans()
    {
        return $this->hasMany(Lnkphysicalinterfacetovlan::class, 'physicalinterface_id');
    }

}