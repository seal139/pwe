<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KamarFasilitasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Simpel Room Fasilitas
            ['id_kamar' => 1, 'id_fasilitas' => 1],
            ['id_kamar' => 1, 'id_fasilitas' => 2],
            ['id_kamar' => 1, 'id_fasilitas' => 3],
            ['id_kamar' => 1, 'id_fasilitas' => 4], // Tempat Tidur Queen Size


            // Premium Room Fasilitas
            ['id_kamar' => 2, 'id_fasilitas' => 1], // Tempat Tidur King Size
            ['id_kamar' => 2, 'id_fasilitas' => 2],
            ['id_kamar' => 2, 'id_fasilitas' => 4],
            ['id_kamar' => 2, 'id_fasilitas' => 5],


            // Deluxs Room Fasilitas
            ['id_kamar' => 3, 'id_fasilitas' => 1],
            ['id_kamar' => 3, 'id_fasilitas' => 2],
            ['id_kamar' => 3, 'id_fasilitas' => 3],
            ['id_kamar' => 3, 'id_fasilitas' => 4],
            ['id_kamar' => 3, 'id_fasilitas' => 5], // Tempat Tidur King Size

        ];

        $this->db->table('kamar_fasilitas')->insertBatch($data);
    }
}