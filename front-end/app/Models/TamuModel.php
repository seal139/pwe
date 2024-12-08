<?php

namespace App\Models;

use CodeIgniter\Model;

class TamuModel extends Model
{
    protected $table = 'tamu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'email', 'no_telepon'];

    public function getTamu($id = null)
    {
        if ($id) {
            return $this->find($id);
        }
        return $this->findAll();
    }
    
}