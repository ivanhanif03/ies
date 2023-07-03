<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BranchModel;

class Branch extends BaseController
{
    protected $BranchModel;

    public function __construct()
    {
        $this->BranchModel = new BranchModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List Kantor Cabang',
            'menu' => 'branch',
            'validation' => \Config\Services::validation(),
            'branch' => $this->BranchModel->getBranch()
        ];

        return view('branch/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kantor Cabang',
            'menu' => 'branch',
            'validation' => \Config\Services::validation(),
            'branch' => $this->BranchModel->getBranch()
        ];

        return view('branch/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'kode_kantor'    => 'required|is_unique[branch.kode_kantor]',
            'nama_branch' => 'required',
            'regional'    => 'required',

        ])) {
            return redirect()->to('branch/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->BranchModel->save([
            'kode_kantor'    => $this->request->getVar('kode_kantor'),
            'nama_branch'    => $this->request->getVar('nama_branch'),
            'regional'    => $this->request->getVar('regional'),
        ]);

        session()->setFlashdata('pesan', 'Data kantor cabang baru berhasil ditambahkan');

        return redirect()->to('/branch');
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
            $kode_kantor = $row[0];
            $nama_branch = $row[1];
            $regional = $row[2];

            $db = \Config\Database::connect();

            $cek_kode_kantor = $db->table('os')->getWhere(['kode_kantor' => $kode_kantor])->getResult();

            if (count($cek_kode_kantor) > 0) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, kode kantor cabang sudah terdaftar</b>');
            } else {

                $this->BranchModel->save([
                    'kode_kantor' => $kode_kantor,
                    'nama_branch' => $nama_branch,
                    'regional'    => $regional,
                ]);
                session()->setFlashdata('message', 'Berhasil import excel data kantor cabang');
            }
        }

        return redirect()->to('/branch');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Kantor Cabang',
            'menu' => 'branch',
            'validation' => \Config\Services::validation(),
            'branch' => $this->BranchModel->getBranch($id)
        ];

        return view('branch/edit', $data);
    }

    public function update($id)
    {
        //Validation
        $kodeKantorLama = $this->BranchModel->getBranch($id);
        if ($kodeKantorLama['kode_kantor'] == $this->request->getVar('kode_kantor')) {
            $rule_unique = 'required';
        } else {
            $rule_unique = 'required|is_unique[branch.kode_kantor]';
        }

        if (!$this->validate([
            'kode_kantor'   => $rule_unique,
            'nama_branch'   => 'required',
            'regional'      => 'required',
        ])) {
            return redirect()->to('branch/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->BranchModel->save([
            'id'            => $id,
            'kode_kantor'    => $this->request->getVar('kode_kantor'),
            'nama_branch'    => $this->request->getVar('nama_branch'),
            'regional'    => $this->request->getVar('regional'),
        ]);

        session()->setFlashdata('pesan', 'Data kantor cabang berhasil diedit');

        return redirect()->to('branch');
    }

    public function delete($id)
    {
        $this->BranchModel->delete($id);
        session()->setFlashdata('pesan', 'Data kantor cabang berhasil dihapus');
        return redirect()->to('/branch');
    }
}
