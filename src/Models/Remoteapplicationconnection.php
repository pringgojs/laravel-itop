<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remoteapplicationconnection extends Model
{
    use HasFactory;

    protected $table = 'remoteapplicationconnection';

    public function remoteapplicationtype()
    {
        return $this->belongsTo(Remoteapplicationtype::class, 'remoteapplicationtype_id');
    }

    public function privActionWebhooks()
    {
        return $this->hasMany(PrivActionWebhook::class, 'remoteapplicationconnection_id');
    }

}