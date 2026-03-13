<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lnkdocumenttopatch extends Model
{
    use HasFactory;

    protected $table = 'lnkdocumenttopatch';

    public function patch()
    {
        return $this->belongsTo(Patch::class, 'patch_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

}