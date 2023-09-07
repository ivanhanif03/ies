<?php

namespace App\Models;

use CodeIgniter\Model;

class KantorCabangPembantuModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kantor_cabang_pembantu';
    protected $primaryKey       = 'kode_kantor';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kantor_cabang_id', 'kode_kantor', 'nama_kantor', 'jenis_kantor', 'klasifikasi_kantor', 'user_log', 'alamat', 'no_telp'];

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

    public function getKantorCabangPembantu($kode_kantor = false)
    {
        if ($kode_kantor == false) {
            return $this->where('deleted_at', null)->orderBy('kantor_cabang_pembantu.updated_at', 'DESC')->findAll();
        }
        return $this->where(['kode_kantor' => $kode_kantor])->first();
    }

    public function getAll()
    {
        return $this->db->table('kantor_cabang_pembantu')
            ->join('kantor_cabang kc', 'kantor_cabang_pembantu.kantor_cabang_id=kc.kode_kantor', 'left')
            // ->select('kantor_cabang.*')
            ->select('kc.regional ro')
            ->select('kc.kode_kantor kode_kc')
            ->select('kc.nama_kantor nama_kc')
            ->select('kantor_cabang_pembantu.*')
            ->where('kantor_cabang_pembantu.deleted_at', null)
            ->orderBy('kantor_cabang_pembantu.updated_at', 'DESC')
            ->get()->getResultArray();
    }

    public function getOneKantorCabangPembantu($kode_kantor)
    {
        return $this->db->table('kantor_cabang_pembantu')
            ->join('kantor_cabang kc', 'kc.kode_kantor=kantor_cabang_pembantu.kantor_cabang_id', 'left')
            ->select('kc.nama_kantor nama_kc')
            ->select('kantor_cabang_pembantu.*')
            ->where('kantor_cabang_pembantu.kode_kantor', $kode_kantor)
            ->get()->getRow();
    }

    public function getDropdownKcp($kc)
    {
        return $this->db->table('kantor_cabang_pembantu')
            ->select('kantor_cabang_pembantu.*')
            ->where('kantor_cabang_pembantu.kantor_cabang_id', $kc['kantor_cabang_id'])
            ->orderBy('kantor_cabang_pembantu.updated_at', 'DESC')
            ->get()->getResult();
    }
}
