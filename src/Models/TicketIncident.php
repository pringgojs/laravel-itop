<?php

namespace Pringgojs\LaravelItop\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pringgojs\LaravelItop\Traits\HasPublicLog;

class TicketIncident extends Model
{
    use HasFactory, HasPublicLog;

    // protected $connection = 'mysql2'; // Menggunakan koneksi mysql2

    protected $table = 'ticket_incident'; // Nama tabel
}
