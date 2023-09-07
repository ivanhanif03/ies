<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cloud extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'provider_id'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'os_id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'app_id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'nama_cloud'             => ['type' => 'varchar', 'constraint' => 100],
            'ip_address'       => ['type' => 'varchar', 'constraint' => 100],
            'hostname'         => ['type' => 'varchar', 'constraint' => 100],
            'disk'             => ['type' => 'varchar', 'constraint' => 50],
            'memory'           => ['type' => 'varchar', 'constraint' => 50],
            'jumlah_core'        => ['type' => 'int', 'constraint' => 10],
            'processor'        => ['type' => 'int', 'constraint' => 10],
            'jenis_server'     => ['type' => 'varchar', 'constraint' => 100],
            'jenis_payment'           => ['type' => 'varchar', 'constraint' => 100],
            'biaya'           => ['type' => 'bigint', 'constraint' => 50],
            'masa_aktif'     => ['type' => 'varchar', 'constraint' => 50],
            'memo'     => ['type' => 'varchar', 'constraint' => 500, 'null' => true],
            'user_log'     => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('provider_id', 'provider', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('os_id', 'os', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('app_id', 'apps', 'id', '', 'CASCADE');

        $this->forge->createTable('cloud', true);
    }

    public function down()
    {
        $this->forge->dropTable('cloud', true);
    }
}