<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hypervisor extends Model
{
    use HasFactory;

    protected $table = 'hypervisor';

    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }

    public function server()
    {
        return $this->belongsTo(Server::class, 'server_id');
    }

}