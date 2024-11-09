<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblTamu extends Migration
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
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 50
            ],
            'no_telpon' => [
                'type'       => 'VARCHAR',
                'constraint' => 13
            ],
        ]);
        // Membuat primary key	

        $this->forge->addKey('id', TRUE);

        // Membuat tabel tblkamar
        $this->forge->createTable('tbltamu', TRUE);
        
    }

    public function down()
    {
        $this->forge->dropTable('tbltamu');
    }
}
