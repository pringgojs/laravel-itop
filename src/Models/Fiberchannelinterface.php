<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiberchannelinterface extends Model
{
    use HasFactory;

    protected $table = 'fiberchannelinterface';

    public function datacenterdevice()
    {
        return $this->belongsTo(Datacenterdevice::class, 'datacenterdevice_id');
    }

}