<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nas extends Model
{
    use HasFactory;

    protected $table = 'nas';

    public function nasfilesystems()
    {
        return $this->hasMany(Nasfilesystem::class, 'nas_id');
    }

}