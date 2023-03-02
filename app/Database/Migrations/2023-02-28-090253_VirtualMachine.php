<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VirtualMachine extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'cluster_id'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'os_id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'host'             => ['type' => 'varchar', 'constraint' => 100],
            'ip_address'       => ['type' => 'varchar', 'constraint' => 100],
            'hostname'         => ['type' => 'varchar', 'constraint' => 100],
            'disk'             => ['type' => 'varchar', 'constraint' => 50],
            'memory'           => ['type' => 'varchar', 'constraint' => 50],
            'processor'        => ['type' => 'varchar', 'constraint' => 100],
            'jenis_server'     => ['type' => 'varchar', 'constraint' => 100],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('cluster_id', 'cluster', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('os_id', 'os', 'id', '', 'CASCADE');

        $this->forge->createTable('virtual_machine', true);
    }

    public function down()
    {
        $this->forge->dropTable('virtual_machine', true);
    }
}
