<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datacenterdevice extends Model
{
    use HasFactory;

    protected $table = 'datacenterdevice';

    public function rack()
    {
        return $this->belongsTo(Rack::class, 'rack_id');
    }

    public function enclosure()
    {
        return $this->belongsTo(Enclosure::class, 'enclosure_id');
    }

    public function powera()
    {
        return $this->belongsTo(Powera::class, 'powera_id');
    }

    public function powerB()
    {
        return $this->belongsTo(PowerB::class, 'powerB_id');
    }

    public function fiberchannelinterfaces()
    {
        return $this->hasMany(Fiberchannelinterface::class, 'datacenterdevice_id');
    }

    public function lnkdatacenterdevicetosans()
    {
        return $this->hasMany(Lnkdatacenterdevicetosan::class, 'datacenterdevice_id');
    }

}