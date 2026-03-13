<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicefamily extends Model
{
    use HasFactory;

    protected $table = 'servicefamily';

    public function services()
    {
        return $this->hasMany(Service::class, 'servicefamily_id');
    }

}