<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivTemporaryObjectDescriptor extends Model
{
    use HasFactory;

    protected $table = 'priv_temporary_object_descriptor';

    public function host()
    {
        return $this->belongsTo(Host::class, 'host_id');
    }

    public function itemClassItem()
    {
        return $this->belongsTo(ItemClassItem::class, 'item_class_item_id');
    }

}