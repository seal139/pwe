<?php

namespace App\Models;

use CodeIgniter\Model;

class TamuModel extends Model
{
    protected $table = 'tbltamu';
    protected $primaryKey = 'id';
    protected $returnType       = 'object';
    protected $allowedFields = [
        'nama',
        'email',
        'no_telpon'
    ];

    // Validation rules can be added here
    protected $validationRules = [
        'nama' => [
            'label' => 'Nama',
            'rules' => 'required|min_length[3]|max_length[50]',
        ],
        'email' => [
            'label' => 'E-mail',
            'rules' => 'required|valid_email',
        ],
        'no_telpon' => [
            'label' => 'No Telepon',
            'rules' => 'required|numeric|exact_length[12]',
        ],
    ];

    // Validation messages can be added here
    protected $validationMessages = [
        'nama' => 'Nama is required and must be between 3 and 50 characters.',
        'email' => 'Email is required and must be a valid email address.',
        'no_telpon' => 'No. Telpon is required and must be a 12-digit number.'
    ];
}