<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '256',
            ],
            'npm' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '256',
            ],
            'id_role' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'id_kategori' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'tempat_mbkm' => [
                'type'       => 'VARCHAR',
                'constraint' => '256',
            ],
            'is_active' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'cid' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true
            ],
            'uid' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true
            ],
            'did' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'null' => true
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null' => true
            ],
            'deleted_at' => [
                'type'           => 'DATETIME',
                'null' => true
            ],
        ]);

        $this->forge->addKey('id_user', true);
        $this->forge->createTable('tb_user');
    }

    public function down()
    {
        $this->forge->dropTable('tb_user');
    }
}
