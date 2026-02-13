<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LnkContactToTicket extends Model
{
    use HasFactory;

    // protected $connection = 'mysql2'; // Menggunakan koneksi mysql2

    protected $table = 'lnkcontacttoticket'; // Nama tabel
}
