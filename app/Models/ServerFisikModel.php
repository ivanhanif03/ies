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
            ->join('vendor v_sw', 'server_fisik.vendor_software_id=v_sw.id', 'left')
            ->join('vendor v_hw', 'server_fisik.vendor_hardware_id=v_hw.id', 'right')
            ->join('apps', 'apps.id=server_fisik.app_id')
            ->join('raks', 'raks.id=server_fisik.rak_id')
            ->select('server_fisik.*')
            ->select('v_sw.nama_vendor v1')
            ->select('v_hw.nama_vendor v2')
            ->select('apps.*')
            ->select('raks.*')
            ->orderBy('server_fisik.id')
            ->get()->getResultArray();
    }

    public function getOneServerFisik($id)
    {
        return $this->db->table('server_fisik')
            ->join('vendor v_sw', 'server_fisik.vendor_software_id=v_sw.id', 'left')
            ->join('vendor v_hw', 'server_fisik.vendor_hardware_id=v_hw.id', 'right')
            ->join('apps', 'apps.id=server_fisik.app_id', 'left')
            ->join('raks', 'raks.id=server_fisik.rak_id', 'left')
            ->select('server_fisik.*')
            ->select('v_sw.nama_vendor v1')
            ->select('v_hw.nama_vendor v2')
            ->select('apps.*')
            ->select('raks.*')
            ->where('server_fisik.id', $id)
            ->get()->getRow();
    }
}
