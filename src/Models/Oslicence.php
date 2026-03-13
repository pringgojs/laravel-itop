<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oslicence extends Model
{
    use HasFactory;

    protected $table = 'oslicence';

    public function osversion()
    {
        return $this->belongsTo(Osversion::class, 'osversion_id');
    }

    public function servers()
    {
        return $this->hasMany(Server::class, 'oslicence_id');
    }

    public function virtualmachines()
    {
        return $this->hasMany(Virtualmachine::class, 'oslicence_id');
    }

}