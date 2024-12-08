<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'email', 'password', 'no_telepon', 'role', 'foto'];

    public function getByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}