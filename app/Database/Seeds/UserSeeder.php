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
                'password' => password_hash('Password.123', PASSWORD_DEFAULT),
                'role'     => 'admin',
                'avatar'    => 'https://cdn.icon-icons.com/icons2/1736/PNG/512/4043260-avatar-male-man-portrait_113269.png',
            ],
            [
                'name'     => 'Paula',
                'surname'  => 'García',
                'email'    => 'paula@mail.com',
                'password' => password_hash('Password.123', PASSWORD_DEFAULT),
                'role'     => 'user',
                'avatar'    => 'https://cdn.icon-icons.com/icons2/1736/PNG/512/4043251-avatar-female-girl-woman_113291.png',
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
