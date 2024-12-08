<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasModel extends Model
{
    protected $table = 'fasilitas'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['nama_fasilitas', 'deskripsi'];

    // Mengambil semua data fasilitas
    public function getAllFasilitas()
    {
        return $this->findAll();
    }

    public function getFasilitasById($id)
    {
        return $this->find($id);
    }
}