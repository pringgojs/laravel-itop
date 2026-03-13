<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Middlewareinstance extends Model
{
    use HasFactory;

    protected $table = 'middlewareinstance';

    public function middleware()
    {
        return $this->belongsTo(Middleware::class, 'middleware_id');
    }

}