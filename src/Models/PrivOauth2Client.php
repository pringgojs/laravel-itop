<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivOauth2Client extends Model
{
    use HasFactory;

    protected $table = 'priv_oauth2_client';

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

}