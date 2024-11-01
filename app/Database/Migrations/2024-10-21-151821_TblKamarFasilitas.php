<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblKamarFasilitas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kamar'          => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
            ],
            'id_fasilitas'          => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
            ],
        
        ]);
        // Create composite primary key
        $this->forge->addKey(['id_kamar', 'id_fasilitas'], TRUE);

        // Add foreign key constraints
        $this->forge->addForeignKey('id_kamar', 'tblkamar', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_fasilitas', 'tblfasilitas', 'id', 'CASCADE', 'CASCADE');
        
        // Membuat tabel tblkamar
        $this->forge->createTable('tblkamarfasilitas', TRUE);
        
    }

    public function down()
    {
        $this->forge->dropTable('tblkamarfasilitas');
    }
}
