<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KantorCabangModel;

class KantorCabang extends BaseController
{
    protected $KantorCabangModel;

    public function __construct()
    {
        $this->KantorCabangModel = new KantorCabangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Kantor Cabang',
            'menu' => 'KC',
            'validation' => \Config\Services::validation(),
            'kantor_cabang' => $this->KantorCabangModel->getKantorCabang()
        ];

        return view('kantor_cabang/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kantor Cabang',
            'menu' => 'KC',
            'validation' => \Config\Services::validation(),
            'kantor_cabang' => $this->KantorCabangModel->getKantorCabang()
        ];

        return view('kantor_cabang/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'regional'     => 'required',
            'kode_kantor'     => 'required|is_unique[kantor_cabang.kode_kantor]',
            'nama_kantor'     => 'required',
            'jenis_kantor'     => 'required',
            'alamat'     => 'required',
            'no_telp'     => 'required',
        ])) {
            return redirect()->to('/kantor_cabang/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->KantorCabangModel->save([
            'regional'    => $this->request->getVar('regional'),
            'kode_kantor'    => $this->request->getVar('kode_kantor'),
            'nama_kantor'    => $this->request->getVar('nama_kantor'),
            'jenis_kantor'    => $this->request->getVar('jenis_kantor'),
            'alamat'    => $this->request->getVar('alamat'),
            'no_telp'    => $this->request->getVar('no_telp'),
            'user_log'    => $this->request->getVar('user_log'),
        ]);

        session()->setFlashdata('pesan', 'Data kantor cabang baru berhasil ditambahkan');

        return redirect()->to('/kantor_cabang');
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

            $regional = $row[0];
            $kode_kantor = $row[1];
            $nama_kantor = $row[2];
            $jenis_kantor = $row[3];
            $alamat = $row[4];
            $no_telp = $row[5];

            $db = \Config\Database::connect();

            $cek_kode_kantor = $db->table('kantor_cabang')->getWhere(['kode_kantor' => $kode_kantor])->getResult();

            if (count($cek_kode_kantor) > 0) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data duplikat gagal diimport, kode kantor sudah ada</b>');
            } elseif (($regional == null) || ($kode_kantor == null) || ($nama_kantor == null) || ($jenis_kantor == null) || ($alamat == null) || ($no_telp == null)) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, kolom pada file import excel tidak boleh kosong</b>');
            } else {

                $this->KantorCabangModel->save([
                    'regional' => $regional,
                    'kode_kantor' => $kode_kantor,
                    'nama_kantor' => $nama_kantor,
                    'jenis_kantor' => $jenis_kantor,
                    'alamat' => $alamat,
                    'no_telp' => $no_telp,
                    'user_log'    => $this->request->getVar('user_log'),
                ]);
                session()->setFlashdata('message', 'Berhasil import excel data kantor cabang');
            }
        }

        return redirect()->to('/kantor_cabang');
    }

    public function edit($kode_kantor)
    {
        $data = [
            'title' => 'Edit Kantor Cabang',
            'menu' => 'KC',
            'validation' => \Config\Services::validation(),
            'kantor_cabang' => $this->KantorCabangModel->getKantorCabang($kode_kantor)
        ];

        return view('kantor_cabang/edit', $data);
    }

    public function update($kode_kantor)
    {
        //Validation
        $kodeKantorLama = $this->KantorCabangModel->getKantorCabang($kode_kantor);
        if ($kodeKantorLama['kode_kantor'] == $this->request->getVar('kode_kantor')) {
            $rule_unique = 'required';
        } else {
            $rule_unique = 'required|is_unique[kantor_cabang.kode_kantor]';
        }

        if (!$this->validate([
            'regional'     => 'required',
            'kode_kantor'     => $rule_unique,
            'nama_kantor'     => 'required',
            'jenis_kantor'     => 'required',
            'alamat'     => 'required',
            'no_telp'     => 'required',
        ])) {
            return redirect()->to('kantor_cabang/edit/' . $kode_kantor)->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->KantorCabangModel->save([
            'kode_kantor' => $kode_kantor,
            'regional'    => $this->request->getVar('regional'),
            'nama_kantor'    => $this->request->getVar('nama_kantor'),
            'jenis_kantor'    => $this->request->getVar('jenis_kantor'),
            'alamat'    => $this->request->getVar('alamat'),
            'no_telp'    => $this->request->getVar('no_telp'),
            'user_log'    => $this->request->getVar('user_log'),
        ]);

        session()->setFlashdata('pesan', 'Data kantor cabang berhasil diedit');

        return redirect()->to('kantor_cabang');
    }

    public function delete($kode_kantor)
    {
        $this->KantorCabangModel->delete($kode_kantor);
        session()->setFlashdata('pesan', 'Data kantor cabang berhasil dihapus');
        return redirect()->to('/kantor_cabang');
    }
}
