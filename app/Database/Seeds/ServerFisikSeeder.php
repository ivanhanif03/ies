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
                'kode_aset'     => 'D12131DDWX',
                'app_id'          => 1,
                'jenis_app'          => 'APP',
                'ip_address'            => '17.22.1.1',
                'hostname'            => 'BTN_PROPERTI',
                'rak_id'          => 1,
                'rak_unit'        => '2',
                'vendor_id'     => 1,
                'merk'     => 'Dell',
                'tipe'     => 'R250',
                'os'     => 'Windows',
                'disk'        => '2000',
                'memory'        => '8',
                'processor'        => 'Intel Xeon E-2314G',
                'sos'           => '2023-11-12',
                'eos'           => '2028-11-12',
                'no_pks'       => 'SADAW1WEQWEXC',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
        ];

        $this->db->table('server_fisik')->insertBatch($data);
    }
}
