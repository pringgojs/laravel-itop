<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivBulkExportResult extends Model
{
    use HasFactory;

    protected $table = 'priv_bulk_export_result';

    public function person()
    {
        return $this->belongsTo(Person::class, 'user_id');
    }

}