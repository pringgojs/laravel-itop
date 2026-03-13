<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivLinkAuditCategoryDomain extends Model
{
    use HasFactory;

    protected $table = 'priv_link_audit_category_domain';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function domain()
    {
        return $this->belongsTo(Domain::class, 'domain_id');
    }

}