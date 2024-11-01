<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasModel extends Model
{
    protected $table = 'tblfasilitas';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_fasilitas',
        'deskripsi'
    ];

    // Validation rules can be added here
    protected $validationRules = [
        'nama_fasilitas' => 'required|min_length[3]|max_length[50]',
        'deskripsi' => 'required'
    ];

    // Validation messages can be added here
    protected $validationMessages = [
        'nama_fasilitas' => 'Nama fasilitas is required and must be between 3 and 50 characters.',
        'deskripsi' => 'Deskripsi is required.'
    ];
}