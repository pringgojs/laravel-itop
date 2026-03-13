<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $table = 'farm';

    public function hypervisors()
    {
        return $this->hasMany(Hypervisor::class, 'farm_id');
    }

}