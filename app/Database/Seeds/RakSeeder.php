<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class RakSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_rak'   => 'Rack 37',
                'lokasi'          => 'Sentul',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'nama_rak'   => 'Rack 32',
                'lokasi'          => 'Surabaya',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'nama_rak'   => 'Rack 15',
                'lokasi'          => 'HO',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
        ];

        $this->db->table('raks')->insertBatch($data);
    }
}
