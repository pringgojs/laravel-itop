<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivChangeopAttachmentAdded extends Model
{
    use HasFactory;

    protected $table = 'priv_changeop_attachment_added';

    public function attachment()
    {
        return $this->belongsTo(Attachment::class, 'attachment_id');
    }

}