<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ServerFisik extends Migration
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
            'ip_address_management'        => ['type' => 'varchar', 'constraint' => 50],
            'hostname'          => ['type' => 'varchar', 'constraint' => 100],
            'jenis_appliance'          => ['type' => 'varchar', 'constraint' => 100],
            'rak_id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'rak_unit'          => ['type' => 'varchar', 'constraint' => 30],
            'vendor_software_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'vendor_hardware_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'merek'              => ['type' => 'varchar', 'constraint' => 100],
            'tipe'              => ['type' => 'varchar', 'constraint' => 100],
            'os'                => ['type' => 'varchar', 'constraint' => 30],
            'disk'              => ['type' => 'int', 'constraint' => 30],
            'tipe_disk'              => ['type' => 'varchar', 'constraint' => 100],
            'memory'            => ['type' => 'int', 'constraint' => 30],
            'tipe_memory'              => ['type' => 'varchar', 'constraint' => 100],
            'processor'         => ['type' => 'varchar', 'constraint' => 50],
            'sos'               => ['type' => 'date'],
            'eos'               => ['type' => 'date'],
            'no_pks'           => ['type' => 'varchar', 'constraint' => 100],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('vendor_software_id', 'vendor', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('vendor_hardware_id', 'vendor', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('app_id', 'apps', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('rak_id', 'raks', 'id', '', 'CASCADE');

        $this->forge->createTable('server_fisik', true);
    }

    public function down()
    {
        $this->forge->dropTable('server_fisik', true);
    }
}
