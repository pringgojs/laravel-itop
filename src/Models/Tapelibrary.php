<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tapelibrary extends Model
{
    use HasFactory;

    protected $table = 'tapelibrary';

    public function tapes()
    {
        return $this->hasMany(Tape::class, 'tapelibrary_id');
    }

}