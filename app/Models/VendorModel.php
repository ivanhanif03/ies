<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorModel extends Model
{
    protected $table            = 'vendor';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_vendor', 'alamat', 'pic', 'pic_phone', 'akun_manager', 'akun_manager_phone', 'helpdesk', 'helpdesk_phone'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getVendor($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
