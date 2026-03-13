<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivEventNewsroom extends Model
{
    use HasFactory;

    protected $table = 'priv_event_newsroom';

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

}