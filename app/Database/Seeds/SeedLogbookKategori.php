<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedLogbookKategori extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_kategori' => 'Proyek studi/proyek independen',
                'kode' => 'PI-01',
                'is_pleace' => 0,
                'cid' => 1,
                'uid' => 1,
                'created_at' => '2023-04-25 15:52:00.000',
                'updated_at' => '2023-04-25 15:52:00.000',
            ],
            [
                'nama_kategori' => 'Magang MBKM',
                'kode' => 'MG-06',
                'is_pleace' => 1,
                'cid' => 1,
                'uid' => 1,
                'created_at' => '2023-04-25 15:52:00.000',
                'updated_at' => '2023-04-25 15:52:00.000',
            ],
            [
                'nama_kategori' => 'Proyek Kewirausahaan',
                'kode' => 'KW-01',
                'is_pleace' => 1,
                'cid' => 1,
                'uid' => 1,
                'created_at' => '2023-04-25 15:52:00.000',
                'updated_at' => '2023-04-25 15:52:00.000',
            ],
        ];


        $this->db->table('tb_logbook_kategori')->insertBatch($data);
    }
}
