<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkdocumenttosoftware extends Model
{
    use HasFactory;

    protected $table = 'lnkdocumenttosoftware';

    public function software()
    {
        return $this->belongsTo(Software::class, 'software_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

}