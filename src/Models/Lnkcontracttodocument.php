<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkcontracttodocument extends Model
{
    use HasFactory;

    protected $table = 'lnkcontracttodocument';

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

}