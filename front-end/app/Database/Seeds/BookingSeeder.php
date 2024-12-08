<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_tamu' => 1,
                'id_kamar' => 1, 
                'tanggal_checkin' => '2024-10-01',
                'tanggal_checkout' => '2024-10-05',
                'jumlah_kamar' => 2,
                'total_harga' => 450000,
                'status' => 'Booked',
            ],

        ];

        $this->db->table('booking')->insertBatch($data);
    }
}