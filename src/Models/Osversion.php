<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Osversion extends Model
{
    use HasFactory;

    protected $table = 'osversion';

    public function osfamily()
    {
        return $this->belongsTo(Osfamily::class, 'osfamily_id');
    }

    public function oslicences()
    {
        return $this->hasMany(Oslicence::class, 'osversion_id');
    }

    public function ospatchs()
    {
        return $this->hasMany(Ospatch::class, 'osversion_id');
    }

    public function pcs()
    {
        return $this->hasMany(Pc::class, 'osversion_id');
    }

    public function servers()
    {
        return $this->hasMany(Server::class, 'osversion_id');
    }

    public function virtualmachines()
    {
        return $this->hasMany(Virtualmachine::class, 'osversion_id');
    }

}