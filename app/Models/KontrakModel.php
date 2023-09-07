<?php

namespace App\Models;

use CodeIgniter\Model;

class KontrakModel extends Model
{
    protected $table            = 'kontrak';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_kontrak', 'no_pks', 'nilai_kontrak', 'scope_work', 'start_kontrak', 'end_kontrak', 'tempo_pembayaran', 'vendor_id', 'user_log'];

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

    public function getAllKontrak($id = false)
    {
        if ($id == false) {
            return $this->where('deleted_at', null)->orderBy('kontrak.updated_at', 'DESC')->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getKontrak()
    {
        return $this->db->table('kontrak')
            ->join('vendor', 'vendor.id=kontrak.vendor_id', 'left')
            ->select('vendor.*')
            ->select('kontrak.*')
            ->where('kontrak.deleted_at', null)
            ->orderBy('kontrak.updated_at', 'DESC')
            ->get()->getResultArray();
    }

    public function getOneKontrak($id)
    {
        return $this->db->table('kontrak')
            ->join('vendor', 'vendor.id=kontrak.vendor_id', 'left')
            ->select('vendor.*')
            ->select('kontrak.*')
            ->where('kontrak.id', $id)
            ->get()->getRow();
    }
}
