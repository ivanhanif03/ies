<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ServerBranchSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_aset'     => 'D12131DDWX',
                'serial_number'     => 'LL1234567',
                'ip_address_data'            => '17.22.1.1',
                'ip_address_management'            => '192.22.1.3',
                'hostname'            => 'BTN_PROPERTI',
                'merek'     => 'Dell',
                'tipe'     => 'R250',
                'os_id'     => 1,
                'disk'        => '2000',
                'tipe_disk'        => 'SATA',
                'memory'        => '8',
                'tipe_memory'        => 'DDR4',
                'processor'        => 'Intel Xeon',
                'kontrak_id'     => 1,
                'kc_id'     => '14',
                'kcp_id'     => '54',
                'user_log'      => 'seeder',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
        ];

        $this->db->table('server_branch')->insertBatch($data);
    }
}
