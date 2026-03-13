<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brand';

    public function iosversions()
    {
        return $this->hasMany(Iosversion::class, 'brand_id');
    }

    public function models()
    {
        return $this->hasMany(Model::class, 'brand_id');
    }

    public function physicaldevices()
    {
        return $this->hasMany(Physicaldevice::class, 'brand_id');
    }

}