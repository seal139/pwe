<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table      = 'tblbooking';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

    protected $allowedFields = [
        'id_tamu',
        'id_kamar',
        'tanggal_checkin',
        'tanggal_checkout',
        'jumlah_kamar'
    ];

    protected $validationRules = [
        'id_tamu'           => 'required|integer',
        'id_kamar'          => 'required|integer',
        'tanggal_checkin'   => 'required|valid_date[Y-m-d]',
        'tanggal_checkout'  => 'required|valid_date[Y-m-d]',
        'jumlah_kamar'      => 'required|integer|greater_than[0]',
    ];

    protected $validationMessages = [
        'id_tamu' => [
            'required' => 'Tamu is required.',
            'integer'  => 'Tamu must be a number.',
        ],
        'id_kamar' => [
            'required' => 'Kamar is required.',
            'integer'  => 'Kamar must be a number.',
        ],
        'tanggal_checkin' => [
            'required'  => 'Check-in date is required.',
            'valid_date'=> 'Check-in date must be a valid date in the format Y-m-d.',
        ],
        'tanggal_checkout' => [
            'required'     => 'Check-out date is required.',
            'valid_date'   => 'Check-out date must be a valid date in the format Y-m-d.',
        ],
        'jumlah_kamar' => [
            'required'     => 'Jumlah kamar is required.',
            'integer'      => 'Jumlah kamar must be an integer.',
            'greater_than' => 'Jumlah kamar must be a number > 0.',
        ],
    ];
}