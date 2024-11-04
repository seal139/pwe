<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = "tbllogin";
    protected $primaryKey = "username";
    protected $returnType = "object";
    //protected $useTimestamps = true;
    
    protected $allowedFields = ['username', 'password','nama','email','no_telpon'];
}