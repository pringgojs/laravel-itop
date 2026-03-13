<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webserver extends Model
{
    use HasFactory;

    protected $table = 'webserver';

    public function webapplications()
    {
        return $this->hasMany(Webapplication::class, 'webserver_id');
    }

}