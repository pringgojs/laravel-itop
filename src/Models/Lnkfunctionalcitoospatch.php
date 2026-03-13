<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkfunctionalcitoospatch extends Model
{
    use HasFactory;

    protected $table = 'lnkfunctionalcitoospatch';

    public function ospatch()
    {
        return $this->belongsTo(Ospatch::class, 'ospatch_id');
    }

    public function functionalci()
    {
        return $this->belongsTo(Functionalci::class, 'functionalci_id');
    }

}