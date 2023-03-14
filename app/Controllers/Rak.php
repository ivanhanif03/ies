<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RakModel;

class Rak extends BaseController
{
    protected $RakModel;

    public function __construct()
    {
        $this->RakModel = new RakModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Rak',
            'menu' => 'rak',
            'validation' => \Config\Services::validation(),
            'rak' => $this->RakModel->getRak()
        ];

        return view('rak/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Rak',
            'menu' => 'rak',
            'rak' => $this->RakModel->getRak($id),
            'server_fisik' => $this->RakModel->getServerFisik($id),
            'fisik' => $this->RakModel->getOneServerFisik($id)
        ];
        // dd($data);

        return view('rak/detail', $data);
    }

    public function detail_server($id)
    {
        $data = [
            'title' => 'Detail Server',
            'menu' => 'rak',
            'fisik' => $this->RakModel->getOneServerFisik($id),
        ];

        // dd($data);

        return view('rak/detail_server', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Rak',
            'menu' => 'rak',
            'validation' => \Config\Services::validation(),
            'rak' => $this->RakModel->getRak()
        ];

        return view('rak/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'nama_rak'     => 'required|is_unique[raks.nama_rak,id,{id}]',
            'lokasi'    => 'required',
        ])) {
            return redirect()->to('rak/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->RakModel->save([
            'nama_rak'    => $this->request->getVar('nama_rak'),
            'lokasi'   => $this->request->getVar('lokasi'),
        ]);

        session()->setFlashdata('pesan', 'Data rak baru berhasil ditambahkan');

        return redirect()->to('rak');
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

            // $id = $row[0];
            $nama_rak = $row[0];
            $lokasi = $row[1];

            $db = \Config\Database::connect();

            $cek_rak = $db->table('raks')->getWhere(['nama_rak' => $nama_rak])->getResult();

            if (count($cek_rak) > 0) {
                session()->setFlashdata('message', '<b>Data gagal diimport, nama rak sudah ada</b>');
            } else {

                $this->RakModel->save([
                    'nama_rak' => $nama_rak,
                    'lokasi' => $lokasi,
                ]);
                session()->setFlashdata('message', 'Berhasil import excel data rak');
            }
        }

        return redirect()->to('/rak');
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Edit Rak',
            'menu' => 'rak',
            'validation' => \Config\Services::validation(),
            'rak' => $this->RakModel->getRak($id)
        ];

        return view('rak/edit', $data);
    }

    public function update($id)
    {
        //Validation
        if (!$this->validate([
            'nama_rak'     => 'required',
            'lokasi'    => 'required',
        ])) {
            return redirect()->to('rak/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->RakModel->save([
            'id' => $id,
            'nama_rak'    => $this->request->getVar('nama_rak'),
            'lokasi'   => $this->request->getVar('lokasi'),
        ]);

        session()->setFlashdata('pesan', 'Data rak berhasil diedit');

        return redirect()->to('rak');
    }

    public function delete($id)
    {
        $this->RakModel->delete($id);
        session()->setFlashdata('pesan', 'Data rak berhasil dihapus');
        return redirect()->to('rak');
    }
}
