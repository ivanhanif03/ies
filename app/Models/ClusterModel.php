<?php

namespace App\Models;

use CodeIgniter\Model;

class ClusterModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cluster';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['data_center', 'nama_cluster', 'user_log'];

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

    public function getCluster($id = false)
    {
        if ($id == false) {
            return $this->where('deleted_at', null)->orderBy('cluster.updated_at', 'DESC')->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
