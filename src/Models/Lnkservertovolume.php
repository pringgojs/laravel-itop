<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkservertovolume extends Model
{
    use HasFactory;

    protected $table = 'lnkservertovolume';

    public function volume()
    {
        return $this->belongsTo(Volume::class, 'volume_id');
    }

    public function server()
    {
        return $this->belongsTo(Server::class, 'server_id');
    }

}