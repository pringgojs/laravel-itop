<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivAppDashboards extends Model
{
    use HasFactory;

    protected $table = 'priv_app_dashboards';

    public function person()
    {
        return $this->belongsTo(Person::class, 'user_id');
    }

}