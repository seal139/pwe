<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TamuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Ebe',
                'email' => 'ebe@example.com',
                'no_telepon' => '081223445678',
            ],

        ];

        $this->db->table('tamu')->insertBatch($data);
    }
}