<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pc extends Model
{
    use HasFactory;

    protected $table = 'pc';

    public function osfamily()
    {
        return $this->belongsTo(Osfamily::class, 'osfamily_id');
    }

    public function osversion()
    {
        return $this->belongsTo(Osversion::class, 'osversion_id');
    }

}