<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    protected $table = 'kamar'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['tipe_kamar', 'harga', 'deskripsi', 'jumlah_kamar', ]; 

    // Mengambil semua data kamar
    public function getAllKamar()
    {
        return $this->findAll();
    }
}