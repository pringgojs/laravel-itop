<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkdeliverymodeltocontact extends Model
{
    use HasFactory;

    protected $table = 'lnkdeliverymodeltocontact';

    public function deliverymodel()
    {
        return $this->belongsTo(Deliverymodel::class, 'deliverymodel_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function role()
    {
        return $this->belongsTo(Contact::class, 'role_id');
    }

}