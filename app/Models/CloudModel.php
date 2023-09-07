<?php

namespace App\Models;

use CodeIgniter\Model;

class CloudModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cloud';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['provider_id', 'os_id', 'app_id', 'nama_cloud', 'ip_address', 'hostname', 'disk', 'memory', 'jumlah_core', 'processor', 'jenis_server', 'jenis_payment', 'biaya', 'masa_aktif', 'memo', 'user_log'];

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

    public function getCloud($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getAll()
    {
        return $this->db->table('cloud')
            ->join('provider', 'provider.id=cloud.provider_id', 'left')
            ->join('os', 'os.id=cloud.os_id', 'left')
            ->join('apps', 'apps.id=cloud.app_id', 'left')
            ->select('provider.*')
            ->select('os.*')
            ->select('apps.*')
            ->select('cloud.*')
            ->where('cloud.deleted_at', null)
            ->orderBy('cloud.updated_at', 'DESC')
            ->get()->getResultArray();
    }

    public function getOneCloud($id)
    {
        return $this->db->table('cloud')
            ->join('provider', 'provider.id=cloud.provider_id', 'left')
            ->join('os', 'os.id=cloud.os_id', 'left')
            ->join('apps', 'apps.id=cloud.app_id', 'left')
            ->select('provider.*')
            ->select('os.*')
            ->select('apps.*')
            ->select('cloud.*')
            ->where('cloud.id', $id)
            ->get()->getRow();
    }

    public function getTotalCloud()
    {
        return $this->db->table('cloud')
            ->join('provider', 'provider.id=cloud.provider_id', 'left')
            ->select('*')
            ->countAllResults();
    }

    public function getCloudTerbaru()
    {
        return $this->db->table('cloud')
            ->join('provider', 'provider.id=cloud.provider_id', 'left')
            ->join('os', 'os.id=cloud.os_id', 'left')
            ->join('apps', 'apps.id=cloud.app_id', 'left')
            ->select('*')
            ->limit(5)
            ->orderBy('cloud.id', 'DESC')
            ->get()->getResultArray();
    }
}
