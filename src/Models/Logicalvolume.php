<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logicalvolume extends Model
{
    use HasFactory;

    protected $table = 'logicalvolume';

    public function lun()
    {
        return $this->belongsTo(Lun::class, 'lun_id');
    }

    public function storagesystem()
    {
        return $this->belongsTo(Storagesystem::class, 'storagesystem_id');
    }

}