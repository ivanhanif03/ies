<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rak extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_rak'       => ['type' => 'varchar', 'constraint' => 100],
            'lokasi'            => ['type' => 'varchar', 'constraint' => 200],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('raks', true);
    }

    public function down()
    {
        $this->forge->dropTable('raks', true);
    }
}
