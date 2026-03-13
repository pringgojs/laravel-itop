<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model extends Model
{
    use HasFactory;

    protected $table = 'model';

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function physicaldevices()
    {
        return $this->hasMany(Physicaldevice::class, 'model_id');
    }

}