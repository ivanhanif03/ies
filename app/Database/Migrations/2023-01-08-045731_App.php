<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class App extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_app'         => ['type' => 'varchar', 'constraint' => 100],
            'pic'              => ['type' => 'varchar', 'constraint' => 100],
            'divisi'              => ['type' => 'varchar', 'constraint' => 100],
            'no_hp_pic'        => ['type' => 'varchar', 'constraint' => 20],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        // $this->forge->addUniqueKey('package');

        $this->forge->createTable('apps', true);
    }

    public function down()
    {
        $this->forge->dropTable('apps', true);
    }
}
