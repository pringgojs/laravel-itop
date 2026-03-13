<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivUrpUserorg extends Model
{
    use HasFactory;

    protected $table = 'priv_urp_userorg';

    public function allowedOrg()
    {
        return $this->belongsTo(AllowedOrg::class, 'allowed_org_id');
    }

}