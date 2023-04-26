<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbLogbookKategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kategori' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '256',
            ],
            'kode' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'is_pleace' => [
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
        $this->forge->addKey('id_kategori', true);
        $this->forge->createTable('tb_logbook_kategori');
    }

    public function down()
    {
        $this->forge->dropTable('tb_logbook_kategori');
    }
}
