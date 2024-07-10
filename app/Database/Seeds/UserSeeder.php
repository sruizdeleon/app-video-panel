<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'     => 'Sergio',
                'surname'  => 'Ruiz',
                'email'    => 'sergio@mail.com',
                'password' => password_hash('12345', PASSWORD_DEFAULT),
                'role'     => 'admin',
                'avatar'    => 'https://cdn1.iconfinder.com/data/icons/avatar-2-2/512/Programmer-512.png',
            ],
            [
                'name'     => 'Pablo',
                'surname'  => 'García',
                'email'    => 'pablo@mail.com',
                'password' => password_hash('12345', PASSWORD_DEFAULT),
                'role'     => 'user',
                'avatar'    => 'https://cdn1.iconfinder.com/data/icons/avatar-2-2/512/Programmer-512.png',
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
