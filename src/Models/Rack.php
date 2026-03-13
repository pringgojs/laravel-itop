<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    use HasFactory;

    protected $table = 'rack';

    public function datacenterdevices()
    {
        return $this->hasMany(Datacenterdevice::class, 'rack_id');
    }

    public function enclosures()
    {
        return $this->hasMany(Enclosure::class, 'rack_id');
    }

    public function pdus()
    {
        return $this->hasMany(Pdu::class, 'rack_id');
    }

}