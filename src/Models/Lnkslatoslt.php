<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkslatoslt extends Model
{
    use HasFactory;

    protected $table = 'lnkslatoslt';

    public function sla()
    {
        return $this->belongsTo(Sla::class, 'sla_id');
    }

    public function slt()
    {
        return $this->belongsTo(Slt::class, 'slt_id');
    }

}