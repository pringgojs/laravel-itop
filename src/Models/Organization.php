<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;


    protected $table = 'organization';
    
    public function scopeOrderByDefault($q)
    {
        $q->orderBy('name');
    }

}
