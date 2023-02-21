<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AppModel;

class App extends BaseController
{
    protected $AppModel;

    public function __construct()
    {
        $this->AppModel = new AppModel();
    }

    public function index()
    {
        $data = [
            'title' => 'App List',
            'menu' => 'apps',
            'validation' => \Config\Services::validation(),
            'app' => $this->AppModel->getApp()
        ];

        return view('apps/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah App',
            'menu' => 'apps',
            'validation' => \Config\Services::validation(),
            'app' => $this->AppModel->getApp()
        ];

        return view('apps/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'nama_app'     => 'required',
            'pic'     => 'required',
            'no_hp_pic'    => 'required|min_length[9]|max_length[13]',
        ])) {
            return redirect()->to('/apps/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->AppModel->save([
            'nama_app'    => $this->request->getVar('nama_app'),
            'pic'   => $this->request->getVar('pic'),
            'no_hp_pic' => $this->request->getVar('no_hp_pic'),
        ]);

        session()->setFlashdata('pesan', 'Data app baru berhasil ditambahkan');

        return redirect()->to('/apps');
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
            $nama_app = $row[0];
            $pic = $row[1];
            $no_hp_pic = $row[2];

            $db = \Config\Database::connect();

            $cek_id = $db->table('apps')->getWhere(['nama_app' => $nama_app])->getResult();

            if (count($cek_id) > 0) {
                session()->setFlashdata('message', '<b>Data gagal diimport, aplikasi sudah terdaftar</b>');
            } else {

                $save_data = [
                    'nama_app' => $nama_app, 'pic' => $pic, 'no_hp_pic' => $no_hp_pic
                ];

                $db->table('apps')->insert($save_data);
                session()->setFlashdata('message', 'Berhasil import excel data aplikasi');
            }
        }

        return redirect()->to('/apps');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit App',
            'menu' => 'apps',
            'validation' => \Config\Services::validation(),
            'app' => $this->AppModel->getApp($id)
        ];

        return view('apps/edit', $data);
    }

    public function update($id)
    {
        //Validation
        if (!$this->validate([
            'nama_app'     => 'required',
            'pic'     => 'required',
            'no_hp_pic'    => 'required|min_length[9]|max_length[13]',
        ])) {
            return redirect()->to('apps/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->AppModel->save([
            'id' => $id,
            'nama_app'    => $this->request->getVar('nama_app'),
            'pic'   => $this->request->getVar('pic'),
            'no_hp_pic' => $this->request->getVar('no_hp_pic'),
        ]);

        session()->setFlashdata('pesan', 'Data app berhasil diedit');

        return redirect()->to('apps');
    }

    public function delete($id)
    {
        $this->AppModel->delete($id);
        session()->setFlashdata('pesan', 'Data app berhasil dihapus');
        return redirect()->to('/apps');
    }
}
