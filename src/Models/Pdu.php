<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdu extends Model
{
    use HasFactory;

    protected $table = 'pdu';

    public function rack()
    {
        return $this->belongsTo(Rack::class, 'rack_id');
    }

    public function powerstart()
    {
        return $this->belongsTo(Powerstart::class, 'powerstart_id');
    }

}