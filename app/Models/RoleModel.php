<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table            = 'auth_groups_users';
    protected $primaryKey       = 'user_id';
    protected $allowedFields    = ['group_id', 'user_id'];

    // Dates
    protected $useTimestamps = false;

    // Get Role by User Id
    public function getRole($id)
    {
        return $this->db->table('auth_groups_users')
            ->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id', 'left')
            ->join('users', 'users.id=auth_groups_users.user_id', 'left')
            ->select('users.username')
            ->select('auth_groups.name')
            ->select('auth_groups_users.user_id')
            ->where('auth_groups_users.user_id', $id)
            ->get()->getRowArray();
    }
}
