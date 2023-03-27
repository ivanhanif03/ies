<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllUserSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('GroupSeeder');
        $this->call('GroupUserSeeder');
    }
}
