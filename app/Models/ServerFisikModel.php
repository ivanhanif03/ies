<?php

namespace App\Models;

use CodeIgniter\Model;

class ServerFisikModel extends Model
{
    protected $table            = 'server_fisik';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_server', 'merk', 'tipe', 'os', 'disk', 'memory', 'processor', 'lokasi', 'vendor_id', 'sos', 'eos', 'nilai_kontrak', 'lisensi'];

    // Dates
    protected $useTimestamps = true;
}
