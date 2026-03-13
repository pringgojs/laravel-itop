<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkdocumenttofunctionalci extends Model
{
    use HasFactory;

    protected $table = 'lnkdocumenttofunctionalci';

    public function functionalci()
    {
        return $this->belongsTo(Functionalci::class, 'functionalci_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

}