<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class KontrakSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_kontrak'          => 'Pengadaan Server Baremetal',
                'no_pks'                => '14/ITOD/2023',
                'nilai_kontrak'         => '2000000000',
                'scope_work'            => 'Maintenance dan Perbaikan Server',
                'start_kontrak'         => '2023-03-03',
                'end_kontrak'           => '2023-04-04',
                'tempo_pembayaran'      => '2025-03-03',
                'vendor_id'             => '1',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
        ];

        $this->db->table('kontrak')->insertBatch($data);
    }
}
