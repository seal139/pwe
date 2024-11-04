<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = "tbluser";
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';

    protected $allowedFields = [
        'username',
        'password',
        'nama',
    ];

    // Validation rules can be added here
    protected $validationRules = [
        'username' => [
            'label'  => 'Username',
            'rules'  => 'required|min_length[4]|max_length[20]|is_unique[tbluser.username]',
            'errors' => [
                'required' => '{field} Harus diisi',
                'min_length' => '{field} Minimal 4 Karakter',
                'max_length' => '{field} Maksimal 20 Karakter',
                'is_unique' => 'username sudah digunakan sebelumnya'
            ]
        ],

        'password' => [
            'label'  => 'Room Type',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} Harus diisi',
            ]
        ],

        'nama' => [
            'label'  => 'Name',
            'rules'  => 'required|min_length[4]|max_length[100]',
            'errors' => [
                'required'   => '{field} Harus diisi',
                'min_length' => '{field} Minimal 4 Karakter',
                'max_length' => '{field} Maksimal 50 Karakter',
                'is_unique'  => 'username sudah digunakan sebelumnya'
            ]
        ],        
    ];
}

