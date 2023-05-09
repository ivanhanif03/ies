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
            'nama_vendor'     => 'required|is_unique[vendor.nama_vendor]',
            'alamat'    => 'required',
            'pic'  => 'required',
            'pic_phone'  => 'required|min_length[9]|max_length[13]',
            'akun_manager'  => 'required',
            'akun_manager_phone'  => 'required|min_length[9]|max_length[13]',
            'helpdesk'  => 'required',
            'helpdesk_phone'  => 'required|min_length[9]|max_length[13]',
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

            $db = \Config\Database::connect();

            $cek_vendor = $db->table('vendor')->getWhere(['nama_vendor' => $nama_vendor])->getResult();

            if (count($cek_vendor) > 0) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, nama vendor sudah ada</b>');
            // }
            // if (($nama_vendor == null) || ($alamat == null) || ($pic == null) || ($pic_phone == null) || ($akun_manager == null) || ($akun_manager_phone == null) || ($helpdesk == null) || ($helpdesk_phone == null) || ($scope_work == null) || ($nilai_kontrak == null) || ($tempo_pembayaran == null)) {
            //     session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, kolom pada file import excel tidak boleh kosong</b>');
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
                ]);
                session()->setFlashdata('message', 'Berhasil import excel data vendor');
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
        $vendorLama = $this->VendorModel->getVendor($id);
        if ($vendorLama['nama_vendor'] == $this->request->getVar('nama_vendor')) {
            $rule_unique = 'required';
        } else {
            $rule_unique = 'required|is_unique[vendor.nama_vendor]';
        }

        if (!$this->validate([
            'nama_vendor'     => $rule_unique,
            'alamat'    => 'required',
            'pic'  => 'required',
            'pic_phone'  => 'required|min_length[9]|max_length[13]',
            'akun_manager'  => 'required',
            'akun_manager_phone'  => 'required|min_length[9]|max_length[13]',
            'helpdesk'  => 'required',
            'helpdesk_phone'  => 'required|min_length[9]|max_length[13]',
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
