<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkerrortofunctionalci extends Model
{
    use HasFactory;

    protected $table = 'lnkerrortofunctionalci';

    public function link()
    {
        return $this->belongsTo(Link::class, 'link_id');
    }

    public function functionalci()
    {
        return $this->belongsTo(Functionalci::class, 'functionalci_id');
    }

    public function error()
    {
        return $this->belongsTo(Error::class, 'error_id');
    }

}