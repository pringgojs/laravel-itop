<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkvirtualdevicetovolume extends Model
{
    use HasFactory;

    protected $table = 'lnkvirtualdevicetovolume';

    public function volume()
    {
        return $this->belongsTo(Volume::class, 'volume_id');
    }

    public function virtualdevice()
    {
        return $this->belongsTo(Virtualdevice::class, 'virtualdevice_id');
    }

}