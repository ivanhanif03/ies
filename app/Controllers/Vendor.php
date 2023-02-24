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
            'nama_vendor'     => 'required|is_unique[vendor.nama_vendor,id,{id}]',
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

    public function saveExcel()
    {
        $file_excel = $this->request->getFile('fileexcel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach ($data as $x => $row) {
            if ($x == 0) {
                continue;
            }

            $nama_vendor = $row[0];
            $alamat = $row[1];
            $pic = $row[2];
            $pic_phone = $row[3];
            $akun_manager = $row[4];
            $akun_manager_phone = $row[5];
            $helpdesk = $row[6];
            $helpdesk_phone = $row[7];
            $scope_work = $row[8];
            $nilai_kontrak = $row[9];
            $tempo_pembayaran = $row[10];

            $db = \Config\Database::connect();

            $cek_vendor = $db->table('vendor')->getWhere(['nama_vendor' => $nama_vendor])->getResult();

            if (count($cek_vendor) > 0) {
                session()->setFlashdata('message', '<b>Data gagal diimport, nama vendor sudah ada</b>');
            } else {

                $this->VendorModel->save([
                    'nama_vendor' => $nama_vendor,
                    'alamat' => $alamat,
                    'pic' => $pic,
                    'pic_phone' => $pic_phone,
                    'akun_manager' => $akun_manager,
                    'akun_manager_phone' => $akun_manager_phone,
                    'helpdesk' => $helpdesk,
                    'helpdesk_phone' => $helpdesk_phone,
                    'scope_work' => $scope_work,
                    'nilai_kontrak' => $nilai_kontrak,
                    'tempo_pembayaran' => $tempo_pembayaran,
                ]);
                session()->setFlashdata('message', 'Berhasil import excel data rak');
            }
        }

        return redirect()->to('/vendor');
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
        $this->VendorModel->delete($id);
        session()->setFlashdata('pesan', 'Data vendor berhasil dihapus');
        return redirect()->to('vendor');
    }
}
