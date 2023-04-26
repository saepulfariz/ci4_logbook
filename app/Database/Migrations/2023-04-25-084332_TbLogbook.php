<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbLogbook extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'is_logbook' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tanggal' => [
                'type'       => 'DATE',
            ],
            'mulai' => [
                'type'       => 'TIME',
            ],
            'selesai' => [
                'type'       => 'TIME',
            ],
            'penjelasan' => [
                'type'       => 'TEXT',
            ],
            'paraf' => [
                'type'       => 'VARCHAR',
                'constraint'     => '128',
            ],
            'paraf_raw' => [
                'type'       => 'TEXT',
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
            'created_at' => [
                'type'           => 'DATETIME',
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('is_logbook', true);
        $this->forge->createTable('tb_logbook');
    }

    public function down()
    {
        $this->forge->dropTable('tb_logbook');
    }
}
