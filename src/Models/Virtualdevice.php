<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Virtualdevice extends Model
{
    use HasFactory;

    protected $table = 'virtualdevice';

    public function lnkvirtualdevicetovolumes()
    {
        return $this->hasMany(Lnkvirtualdevicetovolume::class, 'virtualdevice_id');
    }

}