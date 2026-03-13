<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Osfamily extends Model
{
    use HasFactory;

    protected $table = 'osfamily';

    public function osversions()
    {
        return $this->hasMany(Osversion::class, 'osfamily_id');
    }

    public function pcs()
    {
        return $this->hasMany(Pc::class, 'osfamily_id');
    }

    public function servers()
    {
        return $this->hasMany(Server::class, 'osfamily_id');
    }

    public function virtualmachines()
    {
        return $this->hasMany(Virtualmachine::class, 'osfamily_id');
    }

}