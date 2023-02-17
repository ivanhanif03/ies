<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class AppSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_app' => 'BTN Properti',
                'pic'    => 'Malik',
                'no_hp_pic'    => '0852273631111',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
            [
                'nama_app' => 'BTN Residence',
                'pic'    => 'Sopi',
                'no_hp_pic'    => '081322139876',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('apps')->insertBatch($data);
    }
}
