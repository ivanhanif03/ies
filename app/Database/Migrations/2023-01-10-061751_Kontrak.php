<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kontrak extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_kontrak'      => ['type' => 'varchar', 'constraint' => 200],
            'no_pks'            => ['type' => 'varchar', 'constraint' => 50],
            'nilai_kontrak'     => ['type' => 'int', 'constraint' => 50],
            'scope_work'        => ['type' => 'varchar', 'constraint' => 500],
            'tempo_pembayaran'  => ['type' => 'varchar', 'constraint' => 50],
            'vendor_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('vendor_id', 'vendor', 'id', '', 'CASCADE');

        $this->forge->createTable('kontrak', true);
    }

    public function down()
    {
        $this->forge->dropTable('kontrak', true);
    }
}
