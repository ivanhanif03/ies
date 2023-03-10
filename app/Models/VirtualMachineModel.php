<?php

namespace App\Models;

use CodeIgniter\Model;

class VirtualMachineModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'virtualmachine';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['cluster_id', 'os_id', 'nama_vm', 'host', 'ip_address', 'hostname', 'disk', 'memory', 'processor', 'jenis_server', 'lisence'];

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

    public function getServerVirtualMachine($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getAll()
    {
        return $this->db->table('virtualmachine')
            ->join('cluster', 'cluster.id=virtualmachine.cluster_id', 'left')
            ->join('os', 'os.id=virtualmachine.os_id', 'left')
            ->select('cluster.*')
            ->select('os.*')
            ->select('virtualmachine.*')
            ->orderBy('virtualmachine.id')
            ->get()->getResultArray();
    }

    public function getOneServerVirtualMachine($id)
    {
        return $this->db->table('virtualmachine')
            ->join('cluster', 'cluster.id=virtualmachine.cluster_id', 'left')
            ->join('os', 'os.id=virtualmachine.os_id', 'left')
            ->select('cluster.*')
            ->select('os.*')
            ->select('virtualmachine.*')
            ->where('virtualmachine.id', $id)
            ->get()->getRow();
    }
}
