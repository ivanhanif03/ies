<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Vendor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_vendor'       => ['type' => 'varchar', 'constraint' => 100],
            'alamat'            => ['type' => 'varchar', 'constraint' => 200],
            'pic'               => ['type' => 'varchar', 'constraint' => 50],
            'pic_phone'         => ['type' => 'varchar', 'constraint' => 20],
            'akun_manager'      => ['type' => 'varchar', 'constraint' => 50],
            'akun_manager_phone' => ['type' => 'varchar', 'constraint' => 50],
            'helpdesk'          => ['type' => 'varchar', 'constraint' => 50],
            'helpdesk_phone'    => ['type' => 'varchar', 'constraint' => 50],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('vendor', true);
    }

    public function down()
    {
        $this->forge->dropTable('vendor', true);
    }
}
