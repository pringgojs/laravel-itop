<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnksoftwareinstancetosoftwarepatch extends Model
{
    use HasFactory;

    protected $table = 'lnksoftwareinstancetosoftwarepatch';

    public function softwarepatch()
    {
        return $this->belongsTo(Softwarepatch::class, 'softwarepatch_id');
    }

    public function softwareinstance()
    {
        return $this->belongsTo(Softwareinstance::class, 'softwareinstance_id');
    }

}