<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contracttype extends Model
{
    use HasFactory;

    protected $table = 'contracttype';

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'contracttype_id');
    }

}