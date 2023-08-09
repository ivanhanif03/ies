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
        $this->call('OsSeeder');
        $this->call('ClusterSeeder');
        $this->call('AppSeeder');
        $this->call('RakSeeder');
        $this->call('VendorSeeder');
        $this->call('KontrakSeeder');
        $this->call('ProviderSeeder');
        $this->call('CloudSeeder');
        $this->call('VirtualMachineSeeder');
        $this->call('ServerFisikSeeder');
    }
}
