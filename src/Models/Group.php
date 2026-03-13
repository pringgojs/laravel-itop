<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'group';

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'parent_id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'parent_id');
    }

    public function lnkgrouptocis()
    {
        return $this->hasMany(Lnkgrouptoci::class, 'group_id');
    }

}