<?php namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    protected $table            = "Room";
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';


    /**
     * allowed Field
     */
    protected $allowedFields = [
        'type',
        'price',
        'description',
        'roomCount'
    ];
}

