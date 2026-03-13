<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Softwarelicence extends Model
{
    use HasFactory;

    protected $table = 'softwarelicence';

    public function software()
    {
        return $this->belongsTo(Software::class, 'software_id');
    }

    public function softwareinstances()
    {
        return $this->hasMany(Softwareinstance::class, 'softwarelicence_id');
    }

}