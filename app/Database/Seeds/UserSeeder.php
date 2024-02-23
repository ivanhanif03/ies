<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email'                 => 'muhammad.vidiansyah@btn.co.id',
                'username'              => 'superadmin',
                'name'                  => 'M Ivan Hanif V',
                'phone'                 => '085293679662',
                'department'                 => 'SUPERADMIN',
                //PASSWORD : batara123
                'password_hash'         => '$2y$10$h7xC8SaarmEMvwTpS/2NUO9/rhFMT7nPirHQBMtXtLb1ucblPROzu',
                'active'                => '1',
                'force_pass_reset'      => '0',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
            [
                'email'                 => 'ivan.hanif@btn.co.id',
                'username'              => 'admin',
                'name'                  => 'M Ivan Hanif V',
                'phone'                 => '085293679662',
                'department'                 => 'IES',
                //PASSWORD : batara123
                'password_hash'         => '$2y$10$h7xC8SaarmEMvwTpS/2NUO9/rhFMT7nPirHQBMtXtLb1ucblPROzu',
                'active'                => '1',
                'force_pass_reset'      => '0',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
            [
                'email'                 => 'operator@btn.co.id',
                'username'              => 'operator',
                'name'                  => 'Gundala',
                'phone'                 => '085213249987',
                'department'                 => 'ACM',
                //PASSWORD : batara123
                'password_hash'         => '$2y$10$h7xC8SaarmEMvwTpS/2NUO9/rhFMT7nPirHQBMtXtLb1ucblPROzu',
                'active'                => '1',
                'force_pass_reset'      => '0',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
            [
                'email'                 => 'user@btn.co.id',
                'username'              => 'user',
                'name'                  => 'Sriasih',
                'phone'                 => '082144458792',
                'department'                 => 'NOP',
                //PASSWORD : batara123
                'password_hash'         => '$2y$10$h7xC8SaarmEMvwTpS/2NUO9/rhFMT7nPirHQBMtXtLb1ucblPROzu',
                'active'                => '1',
                'force_pass_reset'      => '0',
                'created_at'            => Time::now(),
                'updated_at'            => Time::now(),
            ],
        ];

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
