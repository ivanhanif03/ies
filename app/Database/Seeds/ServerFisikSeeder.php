<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ServerFisikSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_server'   => 'APP-SKN',
                'merk'          => 'Dell',
                'tipe'          => 'DELL001',
                'os'            => 'Linux',
                'disk'          => 1000,
                'memory'        => 32,
                'processor'     => 'Intel Core i5 1123u',
                'lokasi'        => 'Sentul',
                'vendor_id'     => 1,
                'sos'           => '2023-11-12',
                'eos'           => '2028-11-12',
                'lisensi'       => 'SADAW1WEQWEXC',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
        ];

        $this->db->table('server_fisik')->insertBatch($data);
    }
}
