<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physicaldevice extends Model
{
    use HasFactory;

    protected $table = 'physicaldevice';

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function model()
    {
        return $this->belongsTo(Model::class, 'model_id');
    }

}