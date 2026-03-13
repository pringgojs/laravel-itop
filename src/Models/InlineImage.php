<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InlineImage extends Model
{
    use HasFactory;

    protected $table = 'inline_image';

    public function itemOrg()
    {
        return $this->belongsTo(ItemOrg::class, 'item_org_id');
    }

    public function itemClassItem()
    {
        return $this->belongsTo(ItemClassItem::class, 'item_class_item_id');
    }

}