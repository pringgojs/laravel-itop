<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connectableci extends Model
{
    use HasFactory;

    protected $table = 'connectableci';

    public function lnkconnectablecitonetworkdevices()
    {
        return $this->hasMany(Lnkconnectablecitonetworkdevice::class, 'connectableci_id');
    }

    public function physicalinterfaces()
    {
        return $this->hasMany(Physicalinterface::class, 'connectableci_id');
    }

}