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
}
