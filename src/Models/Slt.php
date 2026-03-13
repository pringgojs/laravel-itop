<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slt extends Model
{
    use HasFactory;

    protected $table = 'slt';

    public function lnkslatoslts()
    {
        return $this->hasMany(Lnkslatoslt::class, 'slt_id');
    }

}