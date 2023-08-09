<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ProviderSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_provider' => 'AWS',
                'nama_kontak' => 'Achmad',
                'no_hp_kontak' => '085388769021',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
        ];

        $this->db->table('provider')->insertBatch($data);
    }
}
