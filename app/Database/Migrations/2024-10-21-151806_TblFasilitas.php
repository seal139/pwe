<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblFasilitas extends Migration
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
            'nama_fasilitas'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
            ],
            'deskripsi'       => [
                'type'           => 'TEXT',
            ],
        ]);
        // Membuat primary key	

        $this->forge->addKey('id', TRUE);

        // Membuat tabel tblkamar
        $this->forge->createTable('tblfasilitas', TRUE);
        
    }

    public function down()
    {
        $this->forge->dropTable('tblfasilitas');
    }
}
