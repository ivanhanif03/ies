<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KontrakModel;
use App\Models\VendorModel;

class Kontrak extends BaseController
{
    protected $KontrakModel, $VendorModel;

    public function __construct()
    {
        $this->KontrakModel = new KontrakModel();
        $this->VendorModel = new VendorModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Kontrak',
            'menu' => 'kontrak',
            'validation' => \Config\Services::validation(),
            'kontrak' => $this->KontrakModel->getKontrak()
        ];

        return view('kontrak/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Kontrak',
            'menu' => 'kontrak',
            'kontrak' => $this->KontrakModel->getOneKontrak($id)
        ];

        return view('kontrak/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kontrak',
            'menu' => 'kontrak',
            'validation' => \Config\Services::validation(),
            'kontrak' => $this->KontrakModel->getKontrak(),
            'vendor' => $this->VendorModel->getVendor()
        ];

        return view('kontrak/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'nama_kontrak'     => 'required',
            'no_pks'     => 'required|is_unique[kontrak.nama_kontrak,id,{id}]',
            'nilai_kontrak'    => 'required',
            'scope_work'  => 'required',
            'tempo_pembayaran'  => 'required',
            'vendor_id'  => 'required',
        ])) {
            return redirect()->to('kontrak/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->KontrakModel->save([
            'nama_kontrak'    => $this->request->getVar('nama_kontrak'),
            'no_pks'   => $this->request->getVar('no_pks'),
            'nilai_kontrak' => $this->request->getVar('nilai_kontrak'),
            'scope_work' => $this->request->getVar('scope_work'),
            'tempo_pembayaran' => $this->request->getVar('tempo_pembayaran'),
            'vendor_id' => $this->request->getVar('vendor_id'),
        ]);

        session()->setFlashdata('pesan', 'Data kontrak baru berhasil ditambahkan');

        return redirect()->to('kontrak');
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

            $nama_kontrak = $row[0];
            $no_pks = $row[1];
            $nilai_kontrak = $row[2];
            $scope_work = $row[3];
            $tempo_pembayaran = $row[4];
            $vendor_id = $row[5];

            $db = \Config\Database::connect();

            $cek_pks = $db->table('kontrak')->getWhere(['no_pks' => $no_pks])->getResult();

            if (count($cek_pks) > 0) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, nomor pks/spk sudah ada</b>');
            // }
            // if (($nama_kontrak == null) || ($no_pks == null) || ($nilai_kontrak == null) || ($scope_work == null) || ($tempo_pembayaran == null) || ($vendor_id == null)) {
            //     session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, kolom pada file import excel tidak boleh kosong</b>');
            } else {

                $this->KontrakModel->save([
                    'nama_kontrak' => $nama_kontrak,
                    'no_pks' => $no_pks,
                    'nilai_kontrak' => $nilai_kontrak,
                    'scope_work' => $scope_work,
                    'tempo_pembayaran' => $tempo_pembayaran,
                    'vendor_id' => $vendor_id,
                ]);
                session()->setFlashdata('message', 'Berhasil import excel data kontrak');
            }
        }

        return redirect()->to('/kontrak');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Vendor',
            'menu' => 'kontrak',
            'validation' => \Config\Services::validation(),
            'kontrak' => $this->KontrakModel->getOneKontrak($id),
            'vendor' => $this->VendorModel->getVendor()
        ];

        return view('kontrak/edit', $data);
    }

    public function update($id)
    {
        //Validation
        if (!$this->validate([
            'nama_kontrak'     => 'required',
            'no_pks'     => 'required|is_unique[kontrak.nama_kontrak,id,{id}]',
            'nilai_kontrak'    => 'required',
            'scope_work'  => 'required',
            'tempo_pembayaran'  => 'required',
            'vendor_id'  => 'required',
        ])) {
            return redirect()->to('kontrak/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->KontrakModel->save([
            'id' => $id,
            'nama_kontrak'    => $this->request->getVar('nama_kontrak'),
            'no_pks'   => $this->request->getVar('no_pks'),
            'nilai_kontrak' => $this->request->getVar('nilai_kontrak'),
            'scope_work' => $this->request->getVar('scope_work'),
            'tempo_pembayaran' => $this->request->getVar('tempo_pembayaran'),
            'vendor_id' => $this->request->getVar('vendor_id'),
        ]);

        session()->setFlashdata('pesan', 'Data kontrak berhasil diedit');

        return redirect()->to('kontrak');
    }

    public function delete($id)
    {
        $this->KontrakModel->delete($id);
        session()->setFlashdata('pesan', 'Data kontrak berhasil dihapus');
        return redirect()->to('kontrak');
    }
}
