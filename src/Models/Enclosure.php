<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enclosure extends Model
{
    use HasFactory;

    protected $table = 'enclosure';

    public function rack()
    {
        return $this->belongsTo(Rack::class, 'rack_id');
    }

    public function datacenterdevices()
    {
        return $this->hasMany(Datacenterdevice::class, 'enclosure_id');
    }

}