<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkconnectablecitonetworkdevice extends Model
{
    use HasFactory;

    protected $table = 'lnkconnectablecitonetworkdevice';

    public function networkdevice()
    {
        return $this->belongsTo(Networkdevice::class, 'networkdevice_id');
    }

    public function connectableci()
    {
        return $this->belongsTo(Connectableci::class, 'connectableci_id');
    }

}