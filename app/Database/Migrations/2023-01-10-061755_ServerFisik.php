<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ServerFisik extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_server'       => ['type' => 'varchar', 'constraint' => 100],
            'merk'              => ['type' => 'varchar', 'constraint' => 30],
            'tipe'              => ['type' => 'varchar', 'constraint' => 30],
            'os'                => ['type' => 'varchar', 'constraint' => 30],
            'disk'              => ['type' => 'int', 'constraint' => 30],
            'memory'            => ['type' => 'int', 'constraint' => 30],
            'processor'         => ['type' => 'varchar', 'constraint' => 50],
            'lokasi'            => ['type' => 'varchar', 'constraint' => 50],
            'vendor_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'sos'               => ['type' => 'date'],
            'eos'               => ['type' => 'date'],
            'lisensi'           => ['type' => 'varchar', 'constraint' => 100],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('vendor_id', 'vendor', 'id', '', 'CASCADE');

        $this->forge->createTable('server_fisik', true);
    }

    public function down()
    {
        $this->forge->dropTable('server_fisik', true);
    }
}
