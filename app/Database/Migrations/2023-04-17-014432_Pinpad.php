<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pinpad extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'merek'         => ['type' => 'varchar', 'constraint' => 100],
            'type'         => ['type' => 'varchar', 'constraint' => 100],
            'serial_number'         => ['type' => 'varchar', 'constraint' => 100],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        // $this->forge->addUniqueKey('package');

        $this->forge->createTable('pinpad', true);
    }

    public function down()
    {
        $this->forge->dropTable('pinpad', true);
    }
}
