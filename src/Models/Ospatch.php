<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ospatch extends Model
{
    use HasFactory;

    protected $table = 'ospatch';

    public function osversion()
    {
        return $this->belongsTo(Osversion::class, 'osversion_id');
    }

    public function lnkfunctionalcitoospatchs()
    {
        return $this->hasMany(Lnkfunctionalcitoospatch::class, 'ospatch_id');
    }

}