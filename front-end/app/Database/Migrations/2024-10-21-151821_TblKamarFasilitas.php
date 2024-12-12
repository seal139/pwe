<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblKamarFasilitas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kamar' => [
                'type'       => 'INT',
                'constraint' => 6,
                'unsigned'   => true,
            ],
            'id_fasilitas' => [
                'type'       => 'INT',
                'constraint' => 6,
                'unsigned'   => true,
            ],
        ]);

        $this->forge->addKey(['id_kamar', 'id_fasilitas'], TRUE);

        $this->forge->addForeignKey('id_kamar', 'tblkamar', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_fasilitas', 'tblfasilitas', 'id', 'CASCADE', 'CASCADE');
        
        $this->forge->createTable('tblkamarfasilitas', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tblkamarfasilitas');
    }
}
