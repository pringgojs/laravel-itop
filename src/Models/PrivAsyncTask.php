<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivAsyncTask extends Model
{
    use HasFactory;

    protected $table = 'priv_async_task';

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

}