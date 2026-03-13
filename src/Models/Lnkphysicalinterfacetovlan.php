<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkphysicalinterfacetovlan extends Model
{
    use HasFactory;

    protected $table = 'lnkphysicalinterfacetovlan';

    public function physicalinterface()
    {
        return $this->belongsTo(Physicalinterface::class, 'physicalinterface_id');
    }

    public function vlan()
    {
        return $this->belongsTo(Vlan::class, 'vlan_id');
    }

}