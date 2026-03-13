<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkdocumenttoerror extends Model
{
    use HasFactory;

    protected $table = 'lnkdocumenttoerror';

    public function link()
    {
        return $this->belongsTo(Link::class, 'link_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

    public function error()
    {
        return $this->belongsTo(Error::class, 'error_id');
    }

}