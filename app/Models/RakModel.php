<?php

namespace App\Models;

use CodeIgniter\Model;

class RakModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'raks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_rak', 'lokasi', 'gambar_rak', 'user_log'];

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

    public function getRak($id = false)
    {
        if ($id == false) {
            return $this->where('deleted_at', null)->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getServerFisik($id)
    {
        return $this->db->table('server_fisik')
            ->join('vendor v_sw', 'server_fisik.vendor_software_id=v_sw.id', 'left')
            ->join('vendor v_hw', 'server_fisik.vendor_hardware_id=v_hw.id', 'left')
            ->join('apps', 'apps.id=server_fisik.app_id', 'left')
            ->join('raks', 'raks.id=server_fisik.rak_id', 'left')
            ->join('os', 'os.id=server_fisik.os_id', 'left')
            ->select('v_sw.nama_vendor v1')
            ->select('v_hw.nama_vendor v2')
            ->select('apps.*')
            ->select('raks.*')
            ->select('os.*')
            ->select('server_fisik.*')
            ->where('server_fisik.rak_id', $id)
            ->get()->getResultArray();
    }


    public function getOneServerFisik($id)
    {
        return $this->db->table('server_fisik')
            ->join('kontrak v_sw', 'server_fisik.vendor_software_id=v_sw.id', 'left')
            ->join('kontrak v_hw', 'server_fisik.vendor_hardware_id=v_hw.id', 'left')
            ->join('vendor vs', 'v_sw.vendor_id=vs.id')
            ->join('vendor vh', 'v_hw.vendor_id=vh.id')
            ->join('apps', 'apps.id=server_fisik.app_id', 'left')
            ->join('raks', 'raks.id=server_fisik.rak_id', 'left')
            ->join('os', 'os.id=server_fisik.os_id', 'left')
            ->select('vs.nama_vendor n1')
            ->select('vh.nama_vendor n2')
            ->select('v_sw.no_pks v1')
            ->select('v_hw.no_pks v2')
            ->select('v_sw.nama_kontrak k1')
            ->select('v_hw.nama_kontrak k2')
            ->select('apps.*')
            ->select('raks.*')
            ->select('os.*')
            ->select('server_fisik.*')
            ->where('server_fisik.id', $id)
            ->get()->getRow();
    }
}
