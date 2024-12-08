<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_tamu',
        'id_kamar',
        'tanggal_checkin',
        'tanggal_checkout',
        'jumlah_kamar',
        'total_harga',
        'status',
    ];
}