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
                'serial_number'     => 'LL1234567',
                'app_id'          => 1,
                'jenis_app'          => 'APP',
                'ip_address_data'            => '17.22.1.1',
                'ip_address_management'            => '192.22.1.3',
                'hostname'            => 'BTN_PROPERTI',
                'jenis_appliance'            => 'up',
                'rak_id'          => 1,
                'rak_unit'        => '2',
                'vendor_software_id'     => 1,
                'vendor_hardware_id'     => 2,
                'merek'     => 'Dell',
                'tipe'     => 'R250',
                'os_id'     => 2,
                'disk'        => '2000',
                'tipe_disk'        => 'SATA',
                'memory'        => '8',
                'tipe_memory'        => 'DDR4',
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
