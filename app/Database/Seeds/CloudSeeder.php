<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CloudSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'provider_id'     => 1,
                'os_id'     => 2,
                'app_id'     => 1,
                'nama_cloud'          => 'NAMAVM1',
                'ip_address'          => '172.15.1.229',
                'hostname'            => 'GEMMONPOL',
                'disk'            => 1000,
                'memory'            => 16,
                'jumlah_core'            => 2,
                'processor'            => 4,
                'jenis_server'          => 'DB',
                'jenis_payment'          => 'Subcription',
                'biaya'          => 100000000,
                'masa_aktif'      => '2025-03-03',
                'memo' => 'kosong',
                'user_log' => 'seeder',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
        ];

        $this->db->table('cloud')->insertBatch($data);
    }
}
