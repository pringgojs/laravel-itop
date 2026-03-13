<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkgrouptoci extends Model
{
    use HasFactory;

    protected $table = 'lnkgrouptoci';

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function ci()
    {
        return $this->belongsTo(Ci::class, 'ci_id');
    }

}