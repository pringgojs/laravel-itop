<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patch extends Model
{
    use HasFactory;

    protected $table = 'patch';

    public function lnkdocumenttopatchs()
    {
        return $this->hasMany(Lnkdocumenttopatch::class, 'patch_id');
    }

}