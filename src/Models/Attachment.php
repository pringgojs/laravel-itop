<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $table = 'attachment';

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'item_org_id');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'user_id');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function privChangeopAttachmentAddeds()
    {
        return $this->hasMany(PrivChangeopAttachmentAdded::class, 'attachment_id');
    }
}
