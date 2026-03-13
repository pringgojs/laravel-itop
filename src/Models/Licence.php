<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
    use HasFactory;

    protected $table = 'licence';

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function lnkdocumenttolicences()
    {
        return $this->hasMany(Lnkdocumenttolicence::class, 'licence_id');
    }

}