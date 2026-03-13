<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkapplicationsolutiontobusinessprocess extends Model
{
    use HasFactory;

    protected $table = 'lnkapplicationsolutiontobusinessprocess';

    public function businessprocess()
    {
        return $this->belongsTo(Businessprocess::class, 'businessprocess_id');
    }

    public function applicationsolution()
    {
        return $this->belongsTo(Applicationsolution::class, 'applicationsolution_id');
    }

}