<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivModuleInstall extends Model
{
    use HasFactory;

    protected $table = 'priv_module_install';

    public function privModuleInstall()
    {
        return $this->belongsTo(PrivModuleInstall::class, 'parent_id');
    }

    public function privModuleInstalls()
    {
        return $this->hasMany(PrivModuleInstall::class, 'parent_id');
    }

}