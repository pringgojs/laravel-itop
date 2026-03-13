<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'location';

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function persons()
    {
        return $this->hasMany(Person::class, 'location_id');
    }

    public function physicaldevices()
    {
        return $this->hasMany(Physicaldevice::class, 'location_id');
    }

}