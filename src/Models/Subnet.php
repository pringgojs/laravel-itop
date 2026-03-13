<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subnet extends Model
{
    use HasFactory;

    protected $table = 'subnet';

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function lnksubnettovlans()
    {
        return $this->hasMany(Lnksubnettovlan::class, 'subnet_id');
    }

}