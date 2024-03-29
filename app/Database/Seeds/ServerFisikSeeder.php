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
                'username_os'            => 'usernameos',
                'password_os'            => 'passwordos',
                'ip_address_management'            => '192.22.1.3',
                'username_ilo'            => 'usernameilo',
                'password_ilo'            => 'passwordilo',
                'hostname'            => 'BTN_PROPERTI',
                'hostname'            => 'BTN_PROPERTI',
                'jenis_appliance'            => 'up',
                'rak_id'          => 1,
                'rak_unit'        => '2',
                'vendor_software_id'     => 1,
                'vendor_hardware_id'     => 1,
                'merek'     => 'Dell',
                'tipe'     => 'R250',
                'os_id'     => 2,
                'disk'        => '2000',
                'tipe_disk'        => 'SATA',
                'memory'        => '8',
                'tipe_memory'        => 'DDR4',
                'jumlah_core'        => 2,
                'processor'        => 8,
                'logical_processor'        => 16,
                'gambar_server'           => 'default_gambar_server.jpg',
                'dismantle'      => '2025-03-03',
                'user_log'      => 'seeder',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'kode_aset'     => 'D435345DDWX',
                'serial_number'     => 'LL12342567',
                'app_id'          => 1,
                'jenis_app'          => 'APP',
                'ip_address_data'            => '17.22.1.2',
                'username_os'            => 'usernameos',
                'password_os'            => 'passwordos',
                'ip_address_management'            => '192.22.1.5',
                'username_ilo'            => 'usernameilo',
                'password_ilo'            => 'passwordilo',
                'hostname'            => 'RTGS',
                'hostname'            => 'RTGS',
                'jenis_appliance'            => 'up',
                'rak_id'          => 1,
                'rak_unit'        => '2',
                'vendor_software_id'     => 1,
                'vendor_hardware_id'     => 1,
                'merek'     => 'HP',
                'tipe'     => 'R400',
                'os_id'     => 2,
                'disk'        => '3000',
                'tipe_disk'        => 'SSD',
                'memory'        => '16',
                'tipe_memory'        => 'DDR4',
                'jumlah_core'        => 2,
                'processor'        => 8,
                'logical_processor'        => 16,
                'gambar_server'           => 'default_gambar_server.jpg',
                'dismantle'      => null,
                'user_log'      => 'seeder',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
        ];

        $this->db->table('server_fisik')->insertBatch($data);
    }
}
