<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vlan extends Model
{
    use HasFactory;

    protected $table = 'vlan';

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function lnkphysicalinterfacetovlans()
    {
        return $this->hasMany(Lnkphysicalinterfacetovlan::class, 'vlan_id');
    }

    public function lnksubnettovlans()
    {
        return $this->hasMany(Lnksubnettovlan::class, 'vlan_id');
    }

}