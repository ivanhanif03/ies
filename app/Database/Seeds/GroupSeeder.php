<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'admin',
                'description'    => 'Admin',
            ],
            [
                'name' => 'operator',
                'description'    => 'Operator Input',
            ],
            [
                'name' => 'user',
                'description'    => 'User',
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('auth_groups')->insertBatch($data);
    }
}
