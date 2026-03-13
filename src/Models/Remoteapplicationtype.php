<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remoteapplicationtype extends Model
{
    use HasFactory;

    protected $table = 'remoteapplicationtype';

    public function remoteapplicationconnections()
    {
        return $this->hasMany(Remoteapplicationconnection::class, 'remoteapplicationtype_id');
    }

}