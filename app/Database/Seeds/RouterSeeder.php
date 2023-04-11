<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RouterSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_os' => 'Windows Server 2003',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
            [
                'nama_os' => 'Windows Server 2019',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
        ];

        $this->db->table('os')->insertBatch($data);
    }
}
