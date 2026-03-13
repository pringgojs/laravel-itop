<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivAuditrule extends Model
{
    use HasFactory;

    protected $table = 'priv_auditrule';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}