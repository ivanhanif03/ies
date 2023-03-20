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
            'cluster' => $this->ClusterModel->getCluster()
        ];

        return view('cluster/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Operating System',
            'menu' => 'cluster',
            'validation' => \Config\Services::validation(),
            'cluster' => $this->ClusterModel->getCluster()
        ];

        return view('cluster/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'data_center'     => 'required',
            'nama_cluster'     => 'required|is_unique[cluster.nama_cluster,id,{id}]',
        ])) {
            return redirect()->to('/cluster/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->ClusterModel->save([
            'data_center'    => $this->request->getVar('data_center'),
            'nama_cluster'    => $this->request->getVar('nama_cluster'),
        ]);

        session()->setFlashdata('pesan', 'Data cluster baru berhasil ditambahkan');

        return redirect()->to('/cluster');
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

            $data_center = $row[0];
            $nama_cluster = $row[1];

            $db = \Config\Database::connect();

            $cek_cluster = $db->table('cluster')->getWhere(['nama_cluster' => $nama_cluster])->getResult();

            if (count($cek_cluster) > 0) {
                session()->setFlashdata('message', '<b class="text-danger">Data gagal diimport, cluster sudah terdaftar</b>');
            } else {

                $this->ClusterModel->save([
                    'data_center' => $data_center,
                    'nama_cluster' => $nama_cluster
                ]);
                session()->setFlashdata('message', 'Berhasil import excel data cluster');
            }
        }

        return redirect()->to('/cluster');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Cluster',
            'menu' => 'cluster',
            'validation' => \Config\Services::validation(),
            'cluster' => $this->ClusterModel->getCluster($id)
        ];

        return view('cluster/edit', $data);
    }

    public function update($id)
    {
        //Validation
        if (!$this->validate([
            'data_center'     => 'required',
            'nama_cluster'     => 'required',
        ])) {
            return redirect()->to('cluster/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->ClusterModel->save([
            'id' => $id,
            'data_center'    => $this->request->getVar('data_center'),
            'nama_cluster'    => $this->request->getVar('nama_cluster'),
        ]);

        session()->setFlashdata('pesan', 'Data cluster berhasil diedit');

        return redirect()->to('cluster');
    }

    public function delete($id)
    {
        $this->ClusterModel->delete($id);
        session()->setFlashdata('pesan', 'Data cluster berhasil dihapus');
        return redirect()->to('/cluster');
    }
}
