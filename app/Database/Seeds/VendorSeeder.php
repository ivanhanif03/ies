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
                'alamat'                => 'The Telkom Hub, Telkom Landmark Tower, Jl. Gatot Subroto No.Kav. 52, RT.6/RW.1, West Kuningan, Mampang Prapatan, South Jakarta City, Jakarta 12710',
                'pic'                   => 'Ahmad',
                'pic_phone'             => '085283778721',
                'akun_manager'          => 'Joni',
                'akun_manager_phone'    => '085299781231',
                'helpdesk'              => 'Susi',
                'helpdesk_phone'        => '085299781231',
                'scope_work'            => 'Melakukan maintenance dan perbaikan',
                'nilai_kontrak'         => 1000000000,
                'tempo_pembayaran'      => '2023-02-25',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
            [
                'nama_vendor'           => 'Swadharma Duta Data',
                'alamat'                => 'Jl. Dewi Sartika No.262, RT.6/RW.5, Cawang, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13630',
                'pic'                   => 'Saep',
                'pic_phone'             => '085233331987',
                'akun_manager'          => 'Ivan',
                'akun_manager_phone'    => '081399087760',
                'helpdesk'              => 'Ronaldo',
                'helpdesk_phone'        => '084452618821',
                'scope_work'            => 'Melakukan maintenance dan perbaikan semuanya pokoknya',
                'nilai_kontrak'         => 4000000000,
                'tempo_pembayaran'      => '2027-03-17',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
        ];

        $this->db->table('vendor')->insertBatch($data);
    }
}
