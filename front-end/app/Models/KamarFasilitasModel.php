<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarFasilitasModel extends Model
{
    protected $table = 'kamar_fasilitas';
    protected $allowedFields = ['id_kamar', 'id_fasilitas']; 

    // Mengambil semua data kamar fasilitas
    public function getAllKamarFasilitas()
    {
        return $this->findAll();
    }
}