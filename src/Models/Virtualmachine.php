<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Virtualmachine extends Model
{
    use HasFactory;

    protected $table = 'virtualmachine';

    public function virtualhost()
    {
        return $this->belongsTo(Virtualhost::class, 'virtualhost_id');
    }

    public function osfamily()
    {
        return $this->belongsTo(Osfamily::class, 'osfamily_id');
    }

    public function osversion()
    {
        return $this->belongsTo(Osversion::class, 'osversion_id');
    }

    public function oslicence()
    {
        return $this->belongsTo(Oslicence::class, 'oslicence_id');
    }

    public function logicalinterfaces()
    {
        return $this->hasMany(Logicalinterface::class, 'virtualmachine_id');
    }

}