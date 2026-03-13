<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Databaseschema extends Model
{
    use HasFactory;

    protected $table = 'databaseschema';

    public function dbserver()
    {
        return $this->belongsTo(Dbserver::class, 'dbserver_id');
    }

}