<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RunSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('GroupSeeder');
        $this->call('GroupUserSeeder');
        $this->call('AppSeeder');
        $this->call('RakSeeder');
        $this->call('VendorSeeder');
        $this->call('ServerFisikSeeder');
    }
}
