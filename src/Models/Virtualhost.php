<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Virtualhost extends Model
{
    use HasFactory;

    protected $table = 'virtualhost';

    public function virtualmachines()
    {
        return $this->hasMany(Virtualmachine::class, 'virtualhost_id');
    }

}