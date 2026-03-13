<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remoteoauthconnection extends Model
{
    use HasFactory;

    protected $table = 'remoteoauthconnection';

    public function oauth2client()
    {
        return $this->belongsTo(Oauth2client::class, 'oauth2client_id');
    }

}