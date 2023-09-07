<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorModel extends Model
{
    protected $table            = 'vendor';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_vendor', 'alamat', 'pic', 'pic_phone', 'akun_manager', 'akun_manager_phone', 'helpdesk', 'helpdesk_phone', 'user_log'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getVendor($id = false)
    {
        if ($id == false) {
            return $this->where('deleted_at', null)->orderBy('vendor.updated_at', 'DESC')->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
