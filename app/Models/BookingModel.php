<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'tblbooking';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_tamu',
        'id_kamar',
        'tanggal_checkin',
        'tanggal_checkout',
        'jumlah_kamar'
    ];

    // Validation rules can be added here
    protected $validationRules = [
        'id_tamu' => 'required|integer',
        'id_kamar' => 'required|integer',
        'tanggal_checkin' => 'required|valid_date',
        'tanggal_checkout' => 'required|valid_date|greater_than[tanggal_checkin]',
        'jumlah_kamar' => 'required|integer|greater_than[0]',
    ];

    // Validation messages can be added here
    protected $validationMessages = [
        'id_tamu' => 'Tamu is required.',
        'id_kamar' => 'Kamar is required.',
        'tanggal_checkin' => 'Check-in date is required and must be a valid date.',
        'tanggal_checkout' => 'Check-out date is required, must be a valid date, and must be after the check-in date.',
        'jumlah_kamar' => 'Jumlah kamar is required and must be a positive integer.',
    ];
}