<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iosversion extends Model
{
    use HasFactory;

    protected $table = 'iosversion';

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function networkdevices()
    {
        return $this->hasMany(Networkdevice::class, 'iosversion_id');
    }

}