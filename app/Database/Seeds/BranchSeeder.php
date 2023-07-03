<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BranchSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_kantor' => 28,
                'nama_branch' => 'Bangkalan',
                'regional' => 3,
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
        ];

        $this->db->table('branch')->insertBatch($data);
    }
}
