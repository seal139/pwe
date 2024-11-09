<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblKamar extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 6,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'tipe_kamar' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'harga' => [
                'type'    => 'DOUBLE',
                'default' => 0,
            ],
            'deskripsi' => [
                'type'       => 'VARCHAR',
                'constraint' => 250
            ],
            'jumlah_kamar' => [
                'type'    => 'DOUBLE',
                'default' => 0,
            ],      
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('tblkamar', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tblkamar');
    }
}
