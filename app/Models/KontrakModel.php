<?php

namespace App\Models;

use CodeIgniter\Model;

class KontrakModel extends Model
{
    protected $table            = 'kontrak';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_kontrak', 'no_pks', 'nilai_kontrak', 'scope_work', 'start_kontrak', 'end_kontrak', 'tempo_pembayaran', 'vendor_id', 'user_log'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getAllKontrak($id = false)
    {
        if ($id == false) {
            return $this->where('deleted_at', null)->findAll();
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
            ->orderBy('kontrak.id')
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
