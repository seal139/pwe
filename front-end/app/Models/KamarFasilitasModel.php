<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarFasilitasModel extends Model
{
    protected $table = 'tblkamarfasilitas';
    protected $primaryKey = ['id_kamar', 'id_fasilitas']; // Composite primary key
    //protected $returnType       = 'object';
    
    protected $allowedFields = [
        'id_kamar',
        'id_fasilitas'
    ];

    // Validation rules can be added here
    protected $validationRules = [
        'id_kamar' => 'required|integer',
        'id_fasilitas' => 'required|integer',
    ];

    // Validation messages can be added here
    protected $validationMessages = [
        'id_kamar' => 'Kamar is required.',
        'id_fasilitas' => 'Fasilitas is required.',
    ];
}