<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKamarTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'tipe_kamar' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'harga' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'deskripsi' => ['type' => 'TEXT'],
            'jumlah_kamar' => ['type' => 'INT'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kamar');
    }

    public function down()
    {
        $this->forge->dropTable('kamar');
    }
}