<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class OsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_os' => 'Windows Server 2003',
                'user_log'      => 'seeder',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
            [
                'nama_os' => 'Windows Server 2019',
                'user_log'      => 'seeder',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
        ];

        $this->db->table('os')->insertBatch($data);
    }
}
