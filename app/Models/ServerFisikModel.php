<?php

namespace App\Models;

use CodeIgniter\Model;

class ServerFisikModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'server_fisik';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_aset', 'serial_number', 'app_id', 'jenis_app', 'ip_address_data', 'ip_address_management', 'hostname', 'jenis_appliance', 'rak_id', 'rak_unit', 'vendor_software_id', 'vendor_hardware_id', 'merek', 'tipe', 'os_id', 'disk', 'tipe_disk', 'memory', 'tipe_memory', 'processor', 'sos', 'eos', 'no_pks'];

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
            ->orderBy('server_fisik.id')
            ->get()->getResultArray();
    }

    public function getOneServerFisik($id)
    {
        return $this->db->table('server_fisik')
            ->join('vendor v_sw', 'server_fisik.vendor_software_id=v_sw.id', 'left')
            ->join('vendor v_hw', 'server_fisik.vendor_hardware_id=v_hw.id', 'left')
            ->join('apps', 'apps.id=server_fisik.app_id', 'left')
            ->join('raks', 'raks.id=server_fisik.rak_id', 'left')
            ->join('os', 'os.id=server_fisik.os_id', 'left')
            ->select('server_fisik.*')
            ->select('v_sw.nama_vendor v1')
            ->select('v_hw.nama_vendor v2')
            ->select('apps.*')
            ->select('raks.*')
            ->select('os.*')
            ->where('server_fisik.id', $id)
            ->get()->getRow();
    }

    public function getTotalServerFisikSentul()
    {
        return $this->db->table('server_fisik')
            ->join('raks', 'raks.id=server_fisik.rak_id', 'left')
            ->select('*')
            ->where('raks.lokasi', 'Sentul')
            ->countAllResults();
    }

    public function getTotalServerFisikSurabaya()
    {
        return $this->db->table('server_fisik')
            ->join('raks', 'raks.id=server_fisik.rak_id', 'left')
            ->select('*')
            ->where('raks.lokasi', 'Surabaya')
            ->countAllResults();
    }

    public function getTotalServerFisikOc()
    {
        return $this->db->table('server_fisik')
            ->join('raks', 'raks.id=server_fisik.rak_id', 'left')
            ->select('*')
            ->where('raks.lokasi', 'HO')
            ->countAllResults();
    }

    public function getTotalAppFisik()
    {
        return $this->db->table('server_fisik')
            ->select('app_id')
            ->distinct('app_id')
            ->countAllResults();
    }

    public function getTotalJenisAppFisik()
    {
        return $this->db->table('server_fisik')
            ->select('*')
            ->where('jenis_app', 'APP')
            ->countAllResults();
    }

    public function getTotalJenisWebFisik()
    {
        return $this->db->table('server_fisik')
            ->select('*')
            ->where('jenis_app', 'WEB')
            ->countAllResults();
    }

    public function getTotalJenisDbFisik()
    {
        return $this->db->table('server_fisik')
            ->select('*')
            ->where('jenis_app', 'DB')
            ->countAllResults();
    }

    public function getTotalJenisMngmtFisik()
    {
        return $this->db->table('server_fisik')
            ->select('*')
            ->where('jenis_app', 'MNGMT')
            ->countAllResults();
    }

    public function getTotalJenisDmzFisik()
    {
        return $this->db->table('server_fisik')
            ->select('*')
            ->where('jenis_app', 'DMZ')
            ->countAllResults();
    }

    public function getTotalJenisDevFisik()
    {
        return $this->db->table('server_fisik')
            ->select('*')
            ->where('jenis_app', 'DEV')
            ->countAllResults();
    }

    public function getAplikasiTerbaru()
    {
        return $this->db->table('server_fisik')
            ->join('apps', 'apps.id=server_fisik.app_id', 'left')
            ->select('*')
            ->limit(6)
            ->orderBy('server_fisik.id', 'DESC')
            ->get()->getResultArray();
    }

    public function getServerFisikTerbaru()
    {
        return $this->db->table('server_fisik')
            ->join('apps', 'apps.id=server_fisik.app_id', 'left')
            ->join('raks', 'raks.id=server_fisik.rak_id', 'left')
            ->join('os', 'os.id=server_fisik.os_id', 'left')
            ->select('*')
            ->limit(5)
            ->orderBy('server_fisik.id', 'DESC')
            ->get()->getResultArray();
    }
}
