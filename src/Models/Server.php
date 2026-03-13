<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $table = 'server';

    public function osfamily()
    {
        return $this->belongsTo(Osfamily::class, 'osfamily_id');
    }

    public function osversion()
    {
        return $this->belongsTo(Osversion::class, 'osversion_id');
    }

    public function oslicence()
    {
        return $this->belongsTo(Oslicence::class, 'oslicence_id');
    }

    public function hypervisors()
    {
        return $this->hasMany(Hypervisor::class, 'server_id');
    }

    public function lnkservertovolumes()
    {
        return $this->hasMany(Lnkservertovolume::class, 'server_id');
    }

}