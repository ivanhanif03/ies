<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cluster extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'data_center'         => ['type' => 'varchar', 'constraint' => 100],
            'nama_cluster'         => ['type' => 'varchar', 'constraint' => 100],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        // $this->forge->addUniqueKey('package');

        $this->forge->createTable('cluster', true);
    }

    public function down()
    {
        $this->forge->dropTable('cluster', true);
    }
}
