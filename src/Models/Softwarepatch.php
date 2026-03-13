<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Softwarepatch extends Model
{
    use HasFactory;

    protected $table = 'softwarepatch';

    public function software()
    {
        return $this->belongsTo(Software::class, 'software_id');
    }

    public function lnksoftwareinstancetosoftwarepatchs()
    {
        return $this->hasMany(Lnksoftwareinstancetosoftwarepatch::class, 'softwarepatch_id');
    }

}