<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KantorCabang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'regional'         => ['type' => 'varchar', 'constraint' => 5],
            'kode_kantor'         => ['type' => 'varchar', 'constraint' => 5],
            'nama_kantor'     => ['type' => 'varchar', 'constraint' => 100],
            'jenis_kantor'     => ['type' => 'varchar', 'constraint' => 10],
            'alamat'     => ['type' => 'varchar', 'constraint' => 200],
            'no_telp'     => ['type' => 'varchar', 'constraint' => 100],
            'user_log'     => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('kode_kantor', true);
        // $this->forge->addUniqueKey('package');

        $this->forge->createTable('kantor_cabang', true);
    }

    public function down()
    {
        $this->forge->dropTable('kantor_cabang', true);
    }
}
