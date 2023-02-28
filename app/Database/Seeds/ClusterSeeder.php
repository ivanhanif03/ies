<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ClusterSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'data_center' => 'Sentul',
                'nama_cluster' => 'CLUSTER-1',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
            [
                'data_center' => 'Surabaya',
                'nama_cluster' => 'CLUSTER-2',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
        ];

        $this->db->table('cluster')->insertBatch($data);
    }
}
