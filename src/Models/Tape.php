<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tape extends Model
{
    use HasFactory;

    protected $table = 'tape';

    public function tapelibrary()
    {
        return $this->belongsTo(Tapelibrary::class, 'tapelibrary_id');
    }

}