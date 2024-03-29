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
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['cluster_id', 'os_id', 'app_id', 'nama_vm', 'ip_address', 'hostname', 'disk', 'memory', 'jumlah_core', 'processor', 'jenis_server', 'lisence', 'masa_aktif', 'replikasi', 'memo_vm', 'user_log'];

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
            return $this->where('deleted_at', null)->orderBy('virtualmachine.updated_at', 'DESC')->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getAll()
    {
        return $this->db->table('virtualmachine')
            ->join('cluster', 'cluster.id=virtualmachine.cluster_id', 'left')
            ->join('os', 'os.id=virtualmachine.os_id', 'left')
            ->join('apps', 'apps.id=virtualmachine.app_id', 'left')
            ->select('cluster.*')
            ->select('os.*')
            ->select('apps.*')
            ->select('virtualmachine.*')
            ->where('virtualmachine.deleted_at', null)
            ->orderBy('virtualmachine.updated_at', 'DESC')
            ->get()->getResultArray();
    }

    public function getOneServerVirtualMachine($id)
    {
        return $this->db->table('virtualmachine')
            ->join('cluster', 'cluster.id=virtualmachine.cluster_id', 'left')
            ->join('os', 'os.id=virtualmachine.os_id', 'left')
            ->join('apps', 'apps.id=virtualmachine.app_id', 'left')
            ->select('cluster.*')
            ->select('os.*')
            ->select('apps.*')
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
            ->where('virtualmachine.deleted_at', NULL)
            ->countAllResults();
    }

    public function getTotalVmSurabaya()
    {
        return $this->db->table('virtualmachine')
            ->join('cluster', 'cluster.id=virtualmachine.cluster_id', 'left')
            ->select('*')
            ->where('cluster.data_center', 'Surabaya')
            ->where('virtualmachine.deleted_at', NULL)
            ->countAllResults();
    }

    public function getTotalVmOc()
    {
        return $this->db->table('virtualmachine')
            ->join('cluster', 'cluster.id=virtualmachine.cluster_id', 'left')
            ->select('*')
            ->where('cluster.data_center', 'HO')
            ->where('virtualmachine.deleted_at', NULL)
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

    public function getVmTerbaru()
    {
        return $this->db->table('virtualmachine')
            ->join('cluster', 'cluster.id=virtualmachine.cluster_id', 'left')
            ->join('os', 'os.id=virtualmachine.os_id', 'left')
            ->join('apps', 'apps.id=virtualmachine.app_id', 'left')
            ->select('*')
            ->limit(5)
            ->orderBy('virtualmachine.id', 'DESC')
            ->get()->getResultArray();
    }
}
