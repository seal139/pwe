<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblBooking extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_tamu'          => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
            ],
            'id_kamar'          => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
            ],
            'tanggal_checkin' => [
                'type'           => 'DATE'
            ],
            'tanggal_checkout'       => [
                'type'           => 'DATE'
            ],
            'jumlah_kamar' => [
                'type'           => 'INT',
                'default'        => 0,
            ],
        ]);
        // Membuat primary key	

        $this->forge->addKey('id', TRUE);

        // Add foreign key constraints
        $this->forge->addForeignKey('id_tamu', 'tbltamu', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_kamar', 'tblkamar', 'id', 'CASCADE', 'CASCADE');
                
        // Membuat tabel tblkamar
        $this->forge->createTable('tblbooking', TRUE);
        
    }

    public function down()
    {
        $this->forge->dropTable('tblbooking');
    }
}
