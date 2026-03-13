<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkpersontoteam extends Model
{
    use HasFactory;

    protected $table = 'lnkpersontoteam';

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'role_id');
    }

}