<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivOauthClient extends Model
{
    use HasFactory;

    protected $table = 'priv_oauth_client';

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

}