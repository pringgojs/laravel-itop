<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dbserver extends Model
{
    use HasFactory;

    protected $table = 'dbserver';

    public function databaseschemas()
    {
        return $this->hasMany(Databaseschema::class, 'dbserver_id');
    }

}