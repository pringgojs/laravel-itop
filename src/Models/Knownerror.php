<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knownerror extends Model
{
    use HasFactory;

    protected $table = 'knownerror';

    public function cust()
    {
        return $this->belongsTo(Cust::class, 'cust_id');
    }

    public function problem()
    {
        return $this->belongsTo(Problem::class, 'problem_id');
    }

}