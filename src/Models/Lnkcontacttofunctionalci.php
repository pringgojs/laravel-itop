<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkcontacttofunctionalci extends Model
{
    use HasFactory;

    protected $table = 'lnkcontacttofunctionalci';

    public function functionalci()
    {
        return $this->belongsTo(Functionalci::class, 'functionalci_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

}