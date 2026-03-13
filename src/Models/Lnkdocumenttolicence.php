<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkdocumenttolicence extends Model
{
    use HasFactory;

    protected $table = 'lnkdocumenttolicence';

    public function licence()
    {
        return $this->belongsTo(Licence::class, 'licence_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

}