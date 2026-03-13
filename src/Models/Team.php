<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';

    public function lnkpersontoteams()
    {
        return $this->hasMany(Lnkpersontoteam::class, 'team_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'team_id');
    }

    public function workorders()
    {
        return $this->hasMany(Workorder::class, 'team_id');
    }

}