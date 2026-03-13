<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Networkdevice extends Model
{
    use HasFactory;

    protected $table = 'networkdevice';

    public function networkdevicetype()
    {
        return $this->belongsTo(Networkdevicetype::class, 'networkdevicetype_id');
    }

    public function iosversion()
    {
        return $this->belongsTo(Iosversion::class, 'iosversion_id');
    }

    public function lnkconnectablecitonetworkdevices()
    {
        return $this->hasMany(Lnkconnectablecitonetworkdevice::class, 'networkdevice_id');
    }

}