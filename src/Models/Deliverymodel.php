<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverymodel extends Model
{
    use HasFactory;

    protected $table = 'deliverymodel';

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function lnkdeliverymodeltocontacts()
    {
        return $this->hasMany(Lnkdeliverymodeltocontact::class, 'deliverymodel_id');
    }

    public function organizations()
    {
        return $this->hasMany(Organization::class, 'deliverymodel_id');
    }

}