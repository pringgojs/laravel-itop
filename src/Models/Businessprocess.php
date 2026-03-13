<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Businessprocess extends Model
{
    use HasFactory;

    protected $table = 'businessprocess';

    public function lnkapplicationsolutiontobusinessprocesses()
    {
        return $this->hasMany(Lnkapplicationsolutiontobusinessprocess::class, 'businessprocess_id');
    }

}