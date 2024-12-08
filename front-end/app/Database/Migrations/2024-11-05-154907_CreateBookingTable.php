<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'id_tamu' => ['type' => 'INT'],
            'id_kamar' => ['type' => 'INT'],
            'tanggal_checkin' => ['type' => 'DATE'],
            'tanggal_checkout' => ['type' => 'DATE'],
            'jumlah_kamar' => ['type' => 'INT'],
            'total_harga' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'status' => ['type' => 'VARCHAR', 'constraint' => '50'],
        ]);

        // Menambahkan foreign key
        $this->forge->addForeignKey('id_tamu', 'tamu', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_kamar', 'kamar', 'id', 'CASCADE', 'CASCADE');

        $this->forge->addKey('id', true);
        $this->forge->createTable('booking');
    }

    public function down()
    {
        // Drop foreign keys first
        $this->forge->dropForeignKey('booking', 'booking_id_tamu_foreign');
        $this->forge->dropForeignKey('booking', 'booking_id_kamar_foreign');

        // Drop table
        $this->forge->dropTable('booking');
    }
}