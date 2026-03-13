<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnksubnettovlan extends Model
{
    use HasFactory;

    protected $table = 'lnksubnettovlan';

    public function subnet()
    {
        return $this->belongsTo(Subnet::class, 'subnet_id');
    }

    public function vlan()
    {
        return $this->belongsTo(Vlan::class, 'vlan_id');
    }

}