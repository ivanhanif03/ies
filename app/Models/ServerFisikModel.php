<?php

namespace App\Models;

use CodeIgniter\Model;

class ServerFisikModel extends Model
{
    protected $table            = 'server_fisik';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['kode_aset', 'app_id', 'jenis_app', 'ip_address', 'hostname', 'rak_id', 'rak_unit', 'vendor_id', 'merk', 'tipe', 'os', 'disk', 'memory', 'processor',  'sos', 'eos',  'no_pks'];

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
            ->join('apps', 'apps.id=server_fisik.app_id', 'left')
            ->join('raks', 'raks.id=server_fisik.rak_id', 'left')
            ->select('server_fisik.*')
            ->select('vendor.*')
            ->select('apps.*')
            ->select('raks.*')
            ->orderBy('server_fisik.id')
            ->get()->getResultArray();
    }

    public function getOneServerFisik($id)
    {
        return $this->db->table('server_fisik')
            ->join('vendor', 'vendor.id=server_fisik.vendor_id', 'left')
            ->join('apps', 'apps.id=server_fisik.app_id', 'left')
            ->join('raks', 'raks.id=server_fisik.rak_id', 'left')
            ->select('server_fisik.*')
            ->select('vendor.*')
            ->select('apps.*')
            ->select('raks.*')
            ->where('server_fisik.id', $id)
            ->get()->getRow();
    }
}
