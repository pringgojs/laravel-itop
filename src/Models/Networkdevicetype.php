<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Networkdevicetype extends Model
{
    use HasFactory;

    protected $table = 'networkdevicetype';

    public function networkdevices()
    {
        return $this->hasMany(Networkdevice::class, 'networkdevicetype_id');
    }

}