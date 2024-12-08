<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama_fasilitas' => '2 Kamar', 'deskripsi' => '2 Kamar'],
            ['nama_fasilitas' => '3 Sofa', 'deskripsi' => '3 Sofa'],
            ['nama_fasilitas' => 'Wifi', 'deskripsi' => 'Wifi'],
            ['nama_fasilitas' => 'Televisi', 'deskripsi' => 'Tv'],
            ['nama_fasilitas' => 'Ac', 'deskripsi' => 'Ac'],

        ];

        // Using Query Builder to Insert Data
        $this->db->table('fasilitas')->insertBatch($data);
    }
}