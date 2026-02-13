<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pringgojs\LaravelItop\Traits\HasPublicLog;

class PrivUser extends Model
{
    use HasFactory, HasPublicLog;

    // protected $connection = 'mysql2'; // Menggunakan koneksi mysql2

    protected $table = 'priv_user'; // Nama tabel
}
