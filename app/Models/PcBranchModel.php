<?php

namespace App\Models;

use CodeIgniter\Model;

class PcBranchModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pc_branch';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_aset', 'serial_number', 'ip_address', 'hostname', 'merek', 'tipe', 'os_id', 'processor', 'disk', 'tipe_disk', 'memory', 'tipe_memory', 'kc_id', 'kcp_id', 'user_log'];

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

    public function getPcBranch($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getAll()
    {
        return $this->db->table('pc_branch')
            ->join('os', 'os.id=pc_branch.os_id', 'left')
            ->join('kantor_cabang', 'kantor_cabang.kode_kantor=pc_branch.kc_id', 'left')
            ->join('kantor_cabang_pembantu', 'kantor_cabang_pembantu.kode_kantor=pc_branch.kcp_id', 'left')
            ->select('os.*')
            ->select('kantor_cabang.jenis_kantor jenis_kc')
            ->select('kantor_cabang.nama_kantor nama_kc')
            ->select('kantor_cabang_pembantu.jenis_kantor jenis_kcp')
            ->select('kantor_cabang_pembantu.nama_kantor nama_kcp')
            ->select('kantor_cabang.*')
            ->select('kantor_cabang_pembantu.*')
            ->select('pc_branch.*')
            ->where('pc_branch.deleted_at', null)
            ->orderBy('pc_branch.updated_at', 'DESC')
            ->get()->getResultArray();
    }

    public function getOnePcBranch($id)
    {
        return $this->db->table('pc_branch')
            ->join('os', 'os.id=pc_branch.os_id', 'left')
            ->join('kantor_cabang', 'kantor_cabang.kode_kantor=pc_branch.kc_id', 'left')
            ->join('kantor_cabang_pembantu', 'kantor_cabang_pembantu.kode_kantor=pc_branch.kcp_id', 'left')
            ->select('os.*')
            ->select('kantor_cabang.kode_kantor kode_kc')
            ->select('kantor_cabang.jenis_kantor jenis_kc')
            ->select('kantor_cabang.nama_kantor nama_kc')
            ->select('kantor_cabang_pembantu.kode_kantor kode_kcp')
            ->select('kantor_cabang_pembantu.jenis_kantor jenis_kcp')
            ->select('kantor_cabang_pembantu.nama_kantor nama_kcp')
            ->select('kantor_cabang.*')
            ->select('kantor_cabang_pembantu.*')
            ->select('pc_branch.*')
            ->where('pc_branch.id', $id)
            ->get()->getRow();
    }
}
