<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PinpadSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'merek' => 'Windows Server 2003',
                'type' => 'Windows Server 2003',
                'serial_number' => 'Windows Server 2003',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
            [
                'merek' => 'Windows Server 2003',
                'type' => 'Windows Server 2003',
                'serial_number' => 'Windows Server 2003',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
        ];

        $this->db->table('pinpad')->insertBatch($data);
    }
}
