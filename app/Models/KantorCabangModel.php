<?php

namespace App\Models;

use CodeIgniter\Model;

class KantorCabangModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kantor_cabang';
    protected $primaryKey       = 'kode_kantor';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['regional', 'kode_kantor', 'nama_kantor', 'jenis_kantor', 'user_log', 'alamat', 'no_telp'];

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

    public function getKantorCabang($kode_kantor = false)
    {
        if ($kode_kantor == false) {
            return $this->where('deleted_at', null)->orderBy('kantor_cabang.updated_at', 'DESC')->findAll();
        }
        return $this->where(['kode_kantor' => $kode_kantor])->first();
    }
}
