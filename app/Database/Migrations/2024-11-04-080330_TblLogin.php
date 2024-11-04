<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblLogin extends Migration
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
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => 20
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 128
            ],
            'nama'     => [
                'type'       => 'VARCHAR',
                'constraint' => 50
            ],
            'role'      => [
                'type'       => 'INT',
            ]
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('tbluser', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tbluser');
    }
}