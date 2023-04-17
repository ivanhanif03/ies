<?php

namespace App\Models;

use CodeIgniter\Model;

class KontrakModel extends Model
{
    protected $table            = 'kontrak';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_kontrak', 'no_pks', 'nilai_kontrak', 'scope_work', 'tempo_pembayaran', 'vendor_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getKontrak()
    {
        return $this->db->table('kontrak')
            ->join('vendor', 'vendor.id=kontrak.vendor_id', 'left')
            ->select('vendor.*')
            ->select('kontrak.*')
            ->orderBy('kontrak.id')
            ->get()->getResultArray();
    }

    public function getOneKontrak($id)
    {
        return $this->db->table('kontrak')
            ->join('vendor', 'vendor.id=kontrak.vendor_id', 'left')
            ->select('*')
            ->where('kontrak.id', $id)
            ->get()->getRow();
    }
}
