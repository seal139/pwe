<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KamarSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tipe_kamar' => 'Simple Rooms',
                'harga' => 450000,
                'deskripsi' => 'Rating ',
                'jumlah_kamar' => 10,
            ],
            [
                'tipe_kamar' => 'Premium',
                'harga' => 850000,
                'deskripsi' => 'Rating',
                'jumlah_kamar' => 5,
            ],
            [
                'tipe_kamar' => 'Deluxs',
                'harga' => 1300000,
                'deskripsi' => 'Rating',
                'jumlah_kamar' => 3,
            ],
        ];

        $this->db->table('kamar')->insertBatch($data);
    }
}