<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    protected $table = 'software';

    public function lnkdocumenttosoftwares()
    {
        return $this->hasMany(Lnkdocumenttosoftware::class, 'software_id');
    }

    public function softwareinstances()
    {
        return $this->hasMany(Softwareinstance::class, 'software_id');
    }

    public function softwarelicences()
    {
        return $this->hasMany(Softwarelicence::class, 'software_id');
    }

    public function softwarepatchs()
    {
        return $this->hasMany(Softwarepatch::class, 'software_id');
    }

}