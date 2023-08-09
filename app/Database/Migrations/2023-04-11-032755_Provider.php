<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Provider extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_provider'         => ['type' => 'varchar', 'constraint' => 100],
            'nama_kontak'         => ['type' => 'varchar', 'constraint' => 100],
            'no_hp_kontak'         => ['type' => 'varchar', 'constraint' => 15],
            'user_log'     => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        // $this->forge->addUniqueKey('package');

        $this->forge->createTable('provider', true);
    }

    public function down()
    {
        $this->forge->dropTable('provider', true);
    }
}
