<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivChange extends Model
{
    use HasFactory;

    protected $table = 'priv_change';

    public function person()
    {
        return $this->belongsTo(Person::class, 'user_id');
    }

}