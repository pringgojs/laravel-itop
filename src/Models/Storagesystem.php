<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storagesystem extends Model
{
    use HasFactory;

    protected $table = 'storagesystem';

    public function logicalvolumes()
    {
        return $this->hasMany(Logicalvolume::class, 'storagesystem_id');
    }

}