<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVideosTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'url'         => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'date'        => [
                'type'       => 'DATE',
                'null'       => false,
            ],
            'user_id'     => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('videos');
    }

    public function down()
    {
        $this->forge->dropTable('videos');
    }
}
