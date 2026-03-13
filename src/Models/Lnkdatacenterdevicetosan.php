<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkdatacenterdevicetosan extends Model
{
    use HasFactory;

    protected $table = 'lnkdatacenterdevicetosan';

    public function san()
    {
        return $this->belongsTo(San::class, 'san_id');
    }

    public function datacenterdevice()
    {
        return $this->belongsTo(Datacenterdevice::class, 'datacenterdevice_id');
    }

}