<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Softwareinstance extends Model
{
    use HasFactory;

    protected $table = 'softwareinstance';

    public function functionalci()
    {
        return $this->belongsTo(Functionalci::class, 'functionalci_id');
    }

    public function software()
    {
        return $this->belongsTo(Software::class, 'software_id');
    }

    public function softwarelicence()
    {
        return $this->belongsTo(Softwarelicence::class, 'softwarelicence_id');
    }

    public function lnksoftwareinstancetosoftwarepatchs()
    {
        return $this->hasMany(Lnksoftwareinstancetosoftwarepatch::class, 'softwareinstance_id');
    }

}