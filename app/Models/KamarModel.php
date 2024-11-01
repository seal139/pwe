<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    protected $table = 'tblkamar';
    protected $primaryKey = 'id';
    protected $returnType       = 'object';

    protected $allowedFields = [
        'tipe_kamar',
        'harga',
        'deskripsi',
        'jumlah_kamar',
        'gambar'
    ];

    // Validation rules can be added here
    protected $validationRules = [
        'tipe_kamar' => [
            'label' => 'Room Type', // Custom label for the validation message
            'rules' => 'required|min_length[3]|max_length[10]',
        ],

        'harga' => [
            'label' => 'Price', // Custom label for the validation message
            'rules' => 'required|numeric',
        ],

        'deskripsi' => [
            'label' => 'Description', // Custom label for the validation message
            'rules' => 'required|max_length[50]',
        ],

        'jumlah_kamar' => [
            'label' => 'Room Count', // Custom label for the validation message
            'rules' => 'required|integer|greater_than[0]',
        ],
        #'gambar' => 'max_size[gambar,1024]|ext_in[gambar,jpg,png,jpeg]' // Assuming file upload is handled
    ];

    // Validation messages can be added here
    protected $validationMessages = [
        'tipe_kamar' => 'Tipe kamar is required and must be between 3 and 10 characters.',
        'harga' => 'Harga is required and must be a number.',
        'deskripsi' => 'Deskripsi is required and must be less than 50 characters.',
        'jumlah_kamar' => 'Jumlah kamar is required and must be a positive integer.',
        'gambar' => 'Gambar must be a JPG, PNG, or JPEG file and less than 1MB.'
    ];
}