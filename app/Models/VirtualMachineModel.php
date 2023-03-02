<?php

namespace App\Models;

use CodeIgniter\Model;

class VirtualMachineModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'virtual_machine';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['cluster_id', 'os_id', 'host', 'ip_address', 'hostname', 'disk', 'memory', 'processor', 'jenis_server', 'lisence'];

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

    public function getVirtualMachine($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getAll()
    {
        return $this->db->table('virtual_machine')
            ->join('cluster', 'cluster.id=virtual_machine.cluster_id', 'left')
            ->join('os', 'os.id=virtual_machine.os_id', 'left')
            ->select('virtual_machine.*')
            ->select('cluster.*')
            ->select('os.*')
            ->orderBy('virtual_machine.id')
            ->get()->getResultArray();
    }

    public function getOneServerVm($id)
    {
        return $this->db->table('virtual_machine')
            ->join('cluster', 'cluster.id=virtual_machine.cluster_id', 'left')
            ->join('os', 'os.id=virtual_machine.os_id', 'left')
            ->select('virtual_machine.*')
            ->select('cluster.*')
            ->select('os.*')
            ->where('virtual_machine.id', $id)
            ->get()->getRow();
    }
}
