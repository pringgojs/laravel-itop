<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webapplication extends Model
{
    use HasFactory;

    protected $table = 'webapplication';

    public function webserver()
    {
        return $this->belongsTo(Webserver::class, 'webserver_id');
    }

}