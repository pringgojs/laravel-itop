<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documenttype extends Model
{
    use HasFactory;

    protected $table = 'documenttype';

    public function documents()
    {
        return $this->hasMany(Document::class, 'documenttype_id');
    }

}