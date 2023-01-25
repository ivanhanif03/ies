<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VendorModel;

class Vendor extends BaseController
{
    protected $ServerFisikModel, $VendorModel;

    public function __construct()
    {
        $this->VendorModel = new VendorModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Vendor',
            'menu' => 'vendor',
            'validation' => \Config\Services::validation(),
            'vendor' => $this->VendorModel->getVendor()
        ];

        return view('vendor/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Vendor',
            'menu' => 'vendor',
            'vendor' => $this->VendorModel->getVendor($id)
        ];

        return view('vendor/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Vendor',
            'menu' => 'vendor',
            'validation' => \Config\Services::validation(),
            'vendor' => $this->VendorModel->getVendor()
        ];

        return view('vendor/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'nama_vendor'     => 'required',
            'alamat'    => 'required',
            'pic'  => 'required',
            'pic_phone'  => 'required',
            'akun_manager'  => 'required',
            'akun_manager_phone'  => 'required',
            'helpdesk'  => 'required',
            'helpdesk_phone'  => 'required',
            'scope_work'  => 'required',
            'nilai_kontrak'  => 'required',
            'tempo_pembayaran'  => 'required',
        ])) {
            return redirect()->to('vendor/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->VendorModel->save([
            'nama_vendor'    => $this->request->getVar('nama_vendor'),
            'alamat'   => $this->request->getVar('alamat'),
            'pic' => $this->request->getVar('pic'),
            'pic_phone' => $this->request->getVar('pic_phone'),
            'akun_manager' => $this->request->getVar('akun_manager'),
            'akun_manager_phone' => $this->request->getVar('akun_manager_phone'),
            'helpdesk' => $this->request->getVar('helpdesk'),
            'helpdesk_phone' => $this->request->getVar('helpdesk_phone'),
            'scope_work' => $this->request->getVar('scope_work'),
            'nilai_kontrak' => $this->request->getVar('nilai_kontrak'),
            'tempo_pembayaran' => $this->request->getVar('tempo_pembayaran'),
        ]);

        session()->setFlashdata('pesan', 'Data vendor baru berhasil ditambahkan');

        return redirect()->to('vendor');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Vendor',
            'menu' => 'vendor',
            'validation' => \Config\Services::validation(),
            'vendor' => $this->VendorModel->getVendor($id)
        ];

        return view('vendor/edit', $data);
    }

    public function update($id)
    {
        //Validation
        if (!$this->validate([
            'nama_vendor'     => 'required',
            'alamat'    => 'required',
            'pic'  => 'required',
            'pic_phone'  => 'required',
            'akun_manager'  => 'required',
            'akun_manager_phone'  => 'required',
            'helpdesk'  => 'required',
            'helpdesk_phone'  => 'required',
            'scope_work'  => 'required',
            'nilai_kontrak'  => 'required',
            'tempo_pembayaran'  => 'required',
        ])) {
            return redirect()->to('vendor/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->VendorModel->save([
            'id' => $id,
            'nama_vendor'    => $this->request->getVar('nama_vendor'),
            'alamat'   => $this->request->getVar('alamat'),
            'pic' => $this->request->getVar('pic'),
            'pic_phone' => $this->request->getVar('pic_phone'),
            'akun_manager' => $this->request->getVar('akun_manager'),
            'akun_manager_phone' => $this->request->getVar('akun_manager_phone'),
            'helpdesk' => $this->request->getVar('helpdesk'),
            'helpdesk_phone' => $this->request->getVar('helpdesk_phone'),
            'scope_work' => $this->request->getVar('scope_work'),
            'nilai_kontrak' => $this->request->getVar('nilai_kontrak'),
            'tempo_pembayaran' => $this->request->getVar('tempo_pembayaran'),
        ]);

        session()->setFlashdata('pesan', 'Data vendor berhasil diedit');

        return redirect()->to('vendor');
    }

    public function delete($id)
    {
        $this->ServerFisikModel->delete($id);
        session()->setFlashdata('pesan', 'Data vendor berhasil dihapus');
        return redirect()->to('vendor');
    }
}
