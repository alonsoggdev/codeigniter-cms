<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthCreateBackUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => false,
            ],
            'password_hash'      => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'created_at'  => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at'  => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'deleted_at'  => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('back_users');

        $this->db->query("INSERT INTO back_users (username, password_hash, created_at) VALUES ('admin', '" . password_hash('xcbnj76edcvbn', PASSWORD_DEFAULT) . "', NOW())");
    }

    public function down()
    {
        $this->forge->dropTable('back_users');
    }
}
