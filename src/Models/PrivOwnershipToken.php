<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivOwnershipToken extends Model
{
    use HasFactory;

    protected $table = 'priv_ownership_token';

    public function person()
    {
        return $this->belongsTo(Person::class, 'user_id');
    }

}