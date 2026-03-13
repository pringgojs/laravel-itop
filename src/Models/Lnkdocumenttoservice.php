<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkdocumenttoservice extends Model
{
    use HasFactory;

    protected $table = 'lnkdocumenttoservice';

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

}