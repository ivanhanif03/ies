<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProviderModel;

class Provider extends BaseController
{
    protected $ProviderModel;

    public function __construct()
    {
        $this->ProviderModel = new ProviderModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Provider List',
            'menu' => 'provider',
            'validation' => \Config\Services::validation(),
            'provider' => $this->ProviderModel->getProviders()
        ];

        return view('provider/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Provider Cloud',
            'menu' => 'provider',
            'validation' => \Config\Services::validation(),
            'provider' => $this->ProviderModel->getProviders()
        ];

        return view('provider/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'nama_provider'     => 'required',
            'nama_kontak'     => 'required',
            'no_hp_kontak'     => 'required',
        ])) {
            return redirect()->to('/provider/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->ProviderModel->save([
            'nama_provider'    => $this->request->getVar('nama_provider'),
            'nama_kontak'    => $this->request->getVar('nama_kontak'),
            'no_hp_kontak'    => $this->request->getVar('no_hp_kontak'),
            'user_log'    => $this->request->getVar('user_log'),
        ]);

        session()->setFlashdata('pesan', 'Data provider baru berhasil ditambahkan');

        return redirect()->to('/provider');
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

            $nama_provider = $row[0];
            $nama_kontak = $row[1];
            $no_hp_kontak = $row[2];

            // $db = \Config\Database::connect();

            // $cek_provider = $db->table('provider')->getWhere(['nama_provider' => $nama_provider])->getResult();

            // if (count($cek_provider) > 0) {
            //     session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport untuk provider cloud sudah terdaftar</b>');
            // } else {
            if (($nama_provider == null) || ($nama_kontak == null) || ($no_hp_kontak == null)) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, kolom pada file import excel tidak boleh kosong</b>');
            } else {
                $this->ProviderModel->save([
                    'nama_provider' => $nama_provider,
                    'nama_kontak' => $nama_kontak,
                    'no_hp_kontak' => $no_hp_kontak,
                    'user_log'    => $this->request->getVar('user_log'),
                ]);
                session()->setFlashdata('message', 'Berhasil import excel data provider cloud');
            }
        }

        return redirect()->to('/provider');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Provider',
            'menu' => 'provider',
            'validation' => \Config\Services::validation(),
            'provider' => $this->ProviderModel->getProviders($id)
        ];

        return view('provider/edit', $data);
    }

    public function update($id)
    {
        //Validation
        $providerLama = $this->ProviderModel->getProviders($id);
        if ($providerLama['nama_provider'] == $this->request->getVar('nama_provider')) {
            $rule_unique = 'required';
        } else {
            $rule_unique = 'required|is_unique[cluster.nama_cluster]';
        }

        if (!$this->validate([
            // 'nama_provider'     => $rule_unique,
            'nama_provider'     => 'required',
            'nama_kontak'     => 'required',
            'no_hp_kontak'     => 'required',
        ])) {
            return redirect()->to('provider/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->ProviderModel->save([
            'id' => $id,
            'nama_provider'    => $this->request->getVar('nama_provider'),
            'nama_kontak'    => $this->request->getVar('nama_kontak'),
            'no_hp_kontak'    => $this->request->getVar('no_hp_kontak'),
            'user_log'    => $this->request->getVar('user_log'),
        ]);

        session()->setFlashdata('pesan', 'Data provider berhasil diedit');

        return redirect()->to('provider');
    }

    public function delete($id)
    {
        $this->ProviderModel->delete($id);
        session()->setFlashdata('pesan', 'Data provider berhasil dihapus');
        return redirect()->to('/provider');
    }
}
