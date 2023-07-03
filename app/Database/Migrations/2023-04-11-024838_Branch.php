<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Branch extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kode_kantor'         => ['type' => 'integer', 'constraint' => 5],
            'nama_branch'         => ['type' => 'varchar', 'constraint' => 100],
            'regional'         => ['type' => 'integer', 'constraint' => 1],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        // $this->forge->addUniqueKey('package');

        $this->forge->createTable('branch', true);
    }

    public function down()
    {
        $this->forge->dropTable('branch', true);
    }
}
