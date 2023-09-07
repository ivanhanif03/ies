<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ServerBranch extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kode_aset'         => ['type' => 'varchar', 'constraint' => 100],
            'serial_number'         => ['type' => 'varchar', 'constraint' => 100],
            'ip_address_data'        => ['type' => 'varchar', 'constraint' => 50],
            'ip_address_management'        => ['type' => 'varchar', 'constraint' => 50],
            'hostname'          => ['type' => 'varchar', 'constraint' => 100],
            'merek'              => ['type' => 'varchar', 'constraint' => 100],
            'tipe'              => ['type' => 'varchar', 'constraint' => 100],
            'os_id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'processor'         => ['type' => 'varchar', 'constraint' => 50],
            'disk'              => ['type' => 'int', 'constraint' => 30],
            'tipe_disk'              => ['type' => 'varchar', 'constraint' => 100],
            'memory'            => ['type' => 'int', 'constraint' => 30],
            'tipe_memory'              => ['type' => 'varchar', 'constraint' => 100],
            'kontrak_id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'kc_id'            => ['type' => 'varchar', 'constraint' => 5],
            'kcp_id'            => ['type' => 'varchar', 'constraint' => 5, 'null' => true],
            'user_log'     => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('os_id', 'os', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('kontrak_id', 'kontrak', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('kc_id', 'kantor_cabang', 'kode_kantor', '', 'CASCADE');
        $this->forge->addForeignKey('kcp_id', 'kantor_cabang_pembantu', 'kode_kantor', '', 'CASCADE');

        $this->forge->createTable('server_branch', true);
    }

    public function down()
    {
        $this->forge->dropTable('server_branch', true);
    }
}