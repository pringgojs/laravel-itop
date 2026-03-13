<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Middleware extends Model
{
    use HasFactory;

    protected $table = 'middleware';

    public function middlewareinstances()
    {
        return $this->hasMany(Middlewareinstance::class, 'middleware_id');
    }

}