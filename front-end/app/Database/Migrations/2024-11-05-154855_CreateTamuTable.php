<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTamuTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'nama' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'email' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'no_telepon' => ['type' => 'VARCHAR', 'constraint' => '15'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tamu');
    }

    public function down()
    {
        $this->forge->dropTable('tamu');
    }
}