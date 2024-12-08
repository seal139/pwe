<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKamarFasilitasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kamar' => ['type' => 'INT'],
            'id_fasilitas' => ['type' => 'INT'],
        ]);

        // Menambahkan foreign key
        $this->forge->addForeignKey('id_kamar', 'kamar', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_fasilitas', 'fasilitas', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('kamar_fasilitas');
    }

    public function down()
    {
        // Drop foreign keys first
        $this->forge->dropForeignKey('kamar_fasilitas', 'kamar_fasilitas_id_kamar_foreign');
        $this->forge->dropForeignKey('kamar_fasilitas', 'kamar_fasilitas_id_fasilitas_foreign');

        // Drop table
        $this->forge->dropTable('kamar_fasilitas');
    }
}