<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDeptUser extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'department'     => ['type' => 'varchar', 'constraint' => 10, 'null' => true, 'after' => 'phone']
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'department');
    }
}
