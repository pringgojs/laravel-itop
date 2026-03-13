<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasfilesystem extends Model
{
    use HasFactory;

    protected $table = 'nasfilesystem';

    public function nas()
    {
        return $this->belongsTo(Nas::class, 'nas_id');
    }

}