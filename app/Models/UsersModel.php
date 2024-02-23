<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['email', 'username', 'name', 'phone', 'department', 'active', 'password_hash'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getUser($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getTotalUserOs()
    {
        return $this->db->table('os')
            ->select('user_log, COUNT(user_log) as total_log')
            ->groupBy('user_log')
            ->orderBy('total_log', 'desc')
            ->get()->getResult();
    }

    public function getTotalUserApp()
    {
        return $this->db->table('apps')
            ->select('user_log, COUNT(user_log) as total_log')
            ->groupBy('user_log')
            ->orderBy('total_log', 'desc')
            ->get()->getResultArray();
    }

    // $this->db->select('user_id, COUNT(user_id) as total');
    // $this->db->group_by('user_id'); 
    // $this->db->order_by('total', 'desc'); 
    // $this->db->get('tablename', 10);
}
