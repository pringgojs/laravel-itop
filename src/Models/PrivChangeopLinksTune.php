<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivChangeopLinksTune extends Model
{
    use HasFactory;

    protected $table = 'priv_changeop_links_tune';

    public function link()
    {
        return $this->belongsTo(Link::class, 'link_id');
    }

}