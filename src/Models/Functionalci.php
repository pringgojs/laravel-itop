<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Functionalci extends Model
{
    use HasFactory;

    protected $table = 'functionalci';

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function lnkapplicationsolutiontofunctionalcis()
    {
        return $this->hasMany(Lnkapplicationsolutiontofunctionalci::class, 'functionalci_id');
    }

    public function lnkcontacttofunctionalcis()
    {
        return $this->hasMany(Lnkcontacttofunctionalci::class, 'functionalci_id');
    }

    public function lnkdocumenttofunctionalcis()
    {
        return $this->hasMany(Lnkdocumenttofunctionalci::class, 'functionalci_id');
    }

    public function lnkerrortofunctionalcis()
    {
        return $this->hasMany(Lnkerrortofunctionalci::class, 'functionalci_id');
    }

    public function lnkfunctionalcitoospatchs()
    {
        return $this->hasMany(Lnkfunctionalcitoospatch::class, 'functionalci_id');
    }

    public function lnkfunctionalcitoprovidercontracts()
    {
        return $this->hasMany(Lnkfunctionalcitoprovidercontract::class, 'functionalci_id');
    }

    public function lnkfunctionalcitoservices()
    {
        return $this->hasMany(Lnkfunctionalcitoservice::class, 'functionalci_id');
    }

    public function lnkfunctionalcitotickets()
    {
        return $this->hasMany(Lnkfunctionalcitoticket::class, 'functionalci_id');
    }

    public function softwareinstances()
    {
        return $this->hasMany(Softwareinstance::class, 'functionalci_id');
    }

}