<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KantorCabangPembantu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_kantor'         => ['type' => 'varchar', 'constraint' => 5],
            'kantor_cabang_id'         => ['type' => 'varchar', 'constraint' => 5],
            'nama_kantor'     => ['type' => 'varchar', 'constraint' => 100],
            'jenis_kantor'     => ['type' => 'varchar', 'constraint' => 10],
            'klasifikasi_kantor'     => ['type' => 'varchar', 'constraint' => 10, 'null' => true],
            'alamat'     => ['type' => 'varchar', 'constraint' => 200],
            'no_telp'     => ['type' => 'varchar', 'constraint' => 100],
            'user_log'     => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('kode_kantor', true);
        $this->forge->addForeignKey('kantor_cabang_id', 'kantor_cabang', 'kode_kantor', '', 'CASCADE');

        $this->forge->createTable('kantor_cabang_pembantu', true);
    }

    public function down()
    {
        $this->forge->dropTable('kantor_cabang_pembantu', true);
    }
}
