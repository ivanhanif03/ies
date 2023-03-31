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

    public function getTotalVmSentul()
    {
        return $this->db->table('virtualmachine')
            ->join('cluster', 'cluster.id=virtualmachine.cluster_id', 'left')
            ->select('*')
            ->where('cluster.data_center', 'Sentul')
            ->countAllResults();
    }

    public function getTotalVmSurabaya()
    {
        return $this->db->table('virtualmachine')
            ->join('cluster', 'cluster.id=virtualmachine.cluster_id', 'left')
            ->select('*')
            ->where('cluster.data_center', 'Surabaya')
            ->countAllResults();
    }

    public function getTotalVmOc()
    {
        return $this->db->table('virtualmachine')
            ->join('cluster', 'cluster.id=virtualmachine.cluster_id', 'left')
            ->select('*')
            ->where('cluster.data_center', 'HO')
            ->countAllResults();
    }

    public function getTotalAppVm()
    {
        return $this->db->table('virtualmachine')
            ->select('*')
            ->countAllResults();
    }


    public function getTotalJenisAppVm()
    {
        return $this->db->table('virtualmachine')
            ->select('*')
            ->where('jenis_server', 'APP')
            ->countAllResults();
    }

    public function getTotalJenisWebVm()
    {
        return $this->db->table('virtualmachine')
            ->select('*')
            ->where('jenis_server', 'WEB')
            ->countAllResults();
    }

    public function getTotalJenisDbVm()
    {
        return $this->db->table('virtualmachine')
            ->select('*')
            ->where('jenis_server', 'DB')
            ->countAllResults();
    }

    public function getTotalJenisMngmtVm()
    {
        return $this->db->table('virtualmachine')
            ->select('*')
            ->where('jenis_server', 'MNGMT')
            ->countAllResults();
    }

    public function getTotalJenisDmzVm()
    {
        return $this->db->table('virtualmachine')
            ->select('*')
            ->where('jenis_server', 'DMZ')
            ->countAllResults();
    }

    public function getTotalJenisDevVm()
    {
        return $this->db->table('virtualmachine')
            ->select('*')
            ->where('jenis_server', 'DEV')
            ->countAllResults();
    }
}
