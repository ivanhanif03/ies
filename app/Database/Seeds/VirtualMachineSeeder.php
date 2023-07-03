<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class VirtualMachineSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'cluster_id'     => 1,
                'os_id'     => 2,
                'app_id'     => 1,
                'nama_vm'          => 'NAMAVM1',
                'ip_address'          => '172.15.1.229',
                'hostname'            => 'GEMMONPOL',
                'disk'            => 1000,
                'memory'            => 16,
                'jumlah_core'            => 2,
                'processor'            => 4,
                'jenis_server'          => 'DB',
                'lisence'          => 'L12312ASA',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
        ];

        $this->db->table('virtualmachine')->insertBatch($data);
    }
}
