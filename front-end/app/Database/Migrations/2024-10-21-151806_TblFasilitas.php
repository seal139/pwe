<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblFasilitas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'nama_fasilitas' => [
                'type'        => 'VARCHAR',
                'constraint'  => 50,
            ],
            'deskripsi' => [
                'type'       => 'VARCHAR',
                'constraint' => 250
            ],
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('tblfasilitas', TRUE);        
    }

    public function down()
    {
        $this->forge->dropTable('tblfasilitas');
    }
}
