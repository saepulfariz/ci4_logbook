<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedUser extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'sistem',
                'password' => password_hash('12345678', PASSWORD_DEFAULT),
                'npm' => 'sistembot',
                'email'    => 'sistem@gmail.com',
                'nama_lengkap'    => 'sistem administrator',
                'gambar' => 'default.jpg',
                'is_active' => 1,
                'id_role' => 1,
                'id_kategori' => 1,
                'cid' => 1,
                'uid' => 1,
                'created_at' => '2023-04-25 15:52:00.000',
                'updated_at' => '2023-04-25 15:52:00.000',
            ],
            [
                'username' => 'admin',
                'password' => password_hash('12345678', PASSWORD_DEFAULT),
                'npm' => 'admin',
                'email'    => 'admin@gmail.com',
                'nama_lengkap'    => 'administrator',
                'gambar' => 'default.jpg',
                'is_active' => 1,
                'id_role' => 1,
                'id_kategori' => 1,
                'cid' => 1,
                'uid' => 1,
                'created_at' => '2023-04-25 15:52:00.000',
                'updated_at' => '2023-04-25 15:52:00.000',
            ],
            [
                'username' => 'D1A200029',
                'password' => password_hash('12345678', PASSWORD_DEFAULT),
                'npm' => 'D1A200029',
                'email'    => 'ilham@gmail.com',
                'nama_lengkap'    => 'ilham samsul arifin',
                'gambar' => 'default.jpg',
                'is_active' => 1,
                'id_role' => 2,
                'id_kategori' => 1,
                'cid' => 1,
                'uid' => 1,
                'created_at' => '2023-04-25 15:52:00.000',
                'updated_at' => '2023-04-25 15:52:00.000',
            ],

        ];

        $this->db->table('tb_user')->insertBatch($data);
    }
}
