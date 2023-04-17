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
            'gambar_rak' => [
                'rules' => 'mime_in[gambar_rak,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_rak,1000]',
                'errors' => [
                    // 'uploaded' => 'Harus ada Gambar Rak yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 1 MB'
                ]

            ]
        ])) {
            return redirect()->to('rak/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $gambarRak = $this->request->getFile('gambar_rak');

        //if not upload gambar rak
        if ($gambarRak->getError() == 4) {
            $gambarRakName =  'default_gambar_rak.jpg';
        } else {
            $gambarRakName = $gambarRak->getRandomName();
            $gambarRak->move('img/gambar_rak', $gambarRakName);
        }
        $this->RakModel->save([
            'nama_rak'    => $this->request->getVar('nama_rak'),
            'lokasi'   => $this->request->getVar('lokasi'),
            'gambar_rak'   => $gambarRakName,
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
            $gambar_rak = $row[2];

            $db = \Config\Database::connect();

            $cek_rak = $db->table('raks')->getWhere(['nama_rak' => $nama_rak])->getResult();

            if (count($cek_rak) > 0) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, nama rak sudah ada</b>');
            } else {

                $this->RakModel->save([
                    'nama_rak' => $nama_rak,
                    'lokasi' => $lokasi,
                    'gambar_rak' => $gambar_rak,
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
            'gambar_rak' => [
                'rules' => 'mime_in[gambar_rak,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_rak,1000]',
                'errors' => [
                    // 'uploaded' => 'Harus ada Gambar Rak yang diupload',
                    'mime_in' => 'File extention harus berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran gambar maksimal 1 MB'
                ]

            ]
        ])) {
            return redirect()->to('rak/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $gambarRak = $this->request->getFile('gambar_rak');

        //if not upload gambar rak
        if ($gambarRak->getError() == 4) {
            $gambarRakName =  $this->request->getVar('gambar_rak_lama');
        } else {
            //generate nama file random
            $gambarRakName = $gambarRak->getRandomName();
            //move to folder gambar rak
            $gambarRak->move('img/gambar_rak', $gambarRakName);
            //delete old file gambar rak
            if ($this->request->getVar('gambar_rak_lama') != 'default_gambar_rak.jpg') {
                unlink('img/gambar_rak/' . $this->request->getVar('gambar_rak_lama'));
            }
        }

        $this->RakModel->save([
            'id' => $id,
            'nama_rak'    => $this->request->getVar('nama_rak'),
            'lokasi'   => $this->request->getVar('lokasi'),
            'gambar_rak'   => $gambarRakName,
        ]);

        session()->setFlashdata('pesan', 'Data rak berhasil diedit');

        return redirect()->to('rak');
    }

    public function delete($id)
    {
        //Cari gambar rak berdasarkan id
        $rak = $this->RakModel->find($id);

        //Cek jika gambar default
        if ($rak['gambar_rak'] != 'default_gambar_rak.jpg') {
            //Delete gambar rak
            unlink('img/gambar_rak/' . $rak['gambar_rak']);
        }


        $this->RakModel->delete($id);
        session()->setFlashdata('pesan', 'Data rak berhasil dihapus');
        return redirect()->to('rak');
    }
}
