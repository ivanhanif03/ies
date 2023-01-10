<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class VendorSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_vendor'           => 'Telkom Sigma',
                'alamat'                => 'Jakarta',
                'pic'                   => 'Ahmad',
                'pic_phone'             => '085283778721',
                'akun_manager'          => 'Joni',
                'akun_manager_phone'    => '085299781231',
                'helpdesk'              => 'Susi',
                'helpdesk_phone'        => '085299781231',
                'scope_work'            => 'Melakukan maintenance dan perbaikan',
                'nilai_kontrak'         => 1000000000,
                'tempo_pembayaran'      => '2028-11-11',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
        ];

        $this->db->table('vendor')->insertBatch($data);
    }
}
