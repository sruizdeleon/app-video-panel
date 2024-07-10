<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VideoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'   => 'Imagine Dragons - Radioactive',
                'url'     => 'https://www.youtube.com/embed/vJao1u2uBqY',
                'user_id' => 1,
                'date'    => '2024-07-07',
            ],
            [
                'title'   => 'Ed Sheeran - Shape of You',
                'url'     => 'https://www.youtube.com/embed/JGwWNGJdvx8',
                'user_id' => 2,
                'date'    => '2024-07-07',
            ],
        ];

        $this->db->table('videos')->insertBatch($data);
    }
}