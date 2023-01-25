<?php

namespace App\Models;

use CodeIgniter\Model;

class ServerFisikModel extends Model
{
    protected $table            = 'server_fisik';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_server', 'merk', 'tipe', 'os', 'disk', 'memory', 'processor', 'lokasi', 'vendor_id', 'sos', 'eos',  'lisensi'];

    // Dates
    protected $useTimestamps = true;

    public function getServerFisik($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getAll()
    {
        return $this->db->table('server_fisik')
            ->join('vendor', 'vendor.id=server_fisik.vendor_id', 'left')
            ->select('server_fisik.*')
            ->select('vendor.*')
            ->orderBy('server_fisik.id')
            ->get()->getResultArray();
    }

    public function getNamaVendor($id)
    {
        return $this->db->table('server_fisik')
            ->join('vendor', 'vendor.id=server_fisik.vendor_id', 'left')
            ->select('vendor.nama_vendor', 'nama_vendor')
            ->where('server_fisik.id', $id)
            ->get()->getRow()->nama_vendor;
    }
}
