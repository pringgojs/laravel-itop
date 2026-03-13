<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logicalinterface extends Model
{
    use HasFactory;

    protected $table = 'logicalinterface';

    public function virtualmachine()
    {
        return $this->belongsTo(Virtualmachine::class, 'virtualmachine_id');
    }

}