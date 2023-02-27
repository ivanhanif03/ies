<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClusterModel;

class Cluster extends BaseController
{
    protected $ClusterModel;

    public function __construct()
    {
        $this->ClusterModel = new ClusterModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Cluster List',
            'menu' => 'cluster',
            'validation' => \Config\Services::validation(),
            'os' => $this->ClusterModel->getCluster()
        ];

        return view('cluster/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Operating System',
            'menu' => 'os',
            'validation' => \Config\Services::validation(),
            'os' => $this->OsModel->getOs()
        ];

        return view('os/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'nama_os'     => 'required|is_unique[os.nama_os,id,{id}]',
        ])) {
            return redirect()->to('/os/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->OsModel->save([
            'nama_os'    => $this->request->getVar('nama_os'),
        ]);

        session()->setFlashdata('pesan', 'Data operating system baru berhasil ditambahkan');

        return redirect()->to('/os');
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
            $nama_os = $row[0];

            $db = \Config\Database::connect();

            $cek_os = $db->table('os')->getWhere(['nama_os' => $nama_os])->getResult();

            if (count($cek_os) > 0) {
                session()->setFlashdata('message', '<b>Data gagal diimport, operating system sudah terdaftar</b>');
            } else {

                $this->OsModel->save([
                    'nama_os' => $nama_os
                ]);
                session()->setFlashdata('message', 'Berhasil import excel data operating system');
            }
        }

        return redirect()->to('/os');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Os',
            'menu' => 'os',
            'validation' => \Config\Services::validation(),
            'os' => $this->OsModel->getOs($id)
        ];

        return view('os/edit', $data);
    }

    public function update($id)
    {
        //Validation
        if (!$this->validate([
            'nama_os'     => 'required',
        ])) {
            return redirect()->to('os/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->OsModel->save([
            'id' => $id,
            'nama_os'    => $this->request->getVar('nama_os'),
        ]);

        session()->setFlashdata('pesan', 'Data operating system berhasil diedit');

        return redirect()->to('os');
    }

    public function delete($id)
    {
        $this->OsModel->delete($id);
        session()->setFlashdata('pesan', 'Data os berhasil dihapus');
        return redirect()->to('/os');
    }
}
