<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = "User";
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';


    /**
     * allowed Field
     */
    protected $allowedFields = [
        'username',
        'nama',
        'telp',
        'email'
    ];
}

