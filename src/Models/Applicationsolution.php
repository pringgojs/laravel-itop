<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicationsolution extends Model
{
    use HasFactory;

    protected $table = 'applicationsolution';

    public function lnkapplicationsolutiontobusinessprocesses()
    {
        return $this->hasMany(Lnkapplicationsolutiontobusinessprocess::class, 'applicationsolution_id');
    }

    public function lnkapplicationsolutiontofunctionalcis()
    {
        return $this->hasMany(Lnkapplicationsolutiontofunctionalci::class, 'applicationsolution_id');
    }

}