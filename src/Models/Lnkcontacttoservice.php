<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkcontacttoservice extends Model
{
    use HasFactory;

    protected $table = 'lnkcontacttoservice';

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

}