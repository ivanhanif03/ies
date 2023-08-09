<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ServerFisik1 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'kode_aset'         => ['type' => 'varchar', 'constraint' => 100],
            'serial_number'         => ['type' => 'varchar', 'constraint' => 100],
            'app_id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'jenis_app'         => ['type' => 'varchar', 'constraint' => 100],
            'ip_address_data'        => ['type' => 'varchar', 'constraint' => 50],
            'username_os'          => ['type' => 'varchar', 'constraint' => 100],
            'password_os'          => ['type' => 'varchar', 'constraint' => 100],
            'ip_address_management'        => ['type' => 'varchar', 'constraint' => 50],
            'username_ilo'          => ['type' => 'varchar', 'constraint' => 100],
            'password_ilo'          => ['type' => 'varchar', 'constraint' => 100],
            'hostname'          => ['type' => 'varchar', 'constraint' => 100],
            'jenis_appliance'          => ['type' => 'varchar', 'constraint' => 100],
            'rak_id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'rak_unit'          => ['type' => 'varchar', 'constraint' => 30],
            'vendor_software_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'vendor_hardware_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'merek'              => ['type' => 'varchar', 'constraint' => 100],
            'tipe'              => ['type' => 'varchar', 'constraint' => 100],
            'os_id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'disk'              => ['type' => 'int', 'constraint' => 30],
            'tipe_disk'              => ['type' => 'varchar', 'constraint' => 100],
            'memory'            => ['type' => 'int', 'constraint' => 30],
            'tipe_memory'              => ['type' => 'varchar', 'constraint' => 100],
            'jumlah_core'         => ['type' => 'int', 'constraint' => 10],
            'processor'         => ['type' => 'int', 'constraint' => 10],
            'logical_processor'         => ['type' => 'int', 'constraint' => 10],
            'gambar_server'            => ['type' => 'varchar', 'constraint' => 200],
            'user_log'     => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('vendor_software_id', 'vendor', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('vendor_hardware_id', 'vendor', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('app_id', 'apps', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('rak_id', 'raks', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('os_id', 'os', 'id', '', 'CASCADE');

        $this->forge->createTable('server_fisik', true);
    }

    public function down()
    {
        $this->forge->dropTable('server_fisik', true);
    }
}
