<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KantorCabangModel;
use App\Models\KantorCabangPembantuModel;

class KantorCabangPembantu extends BaseController
{
    protected $KantorCabangPembantuModel, $KantorCabangModel;

    public function __construct()
    {
        $this->KantorCabangPembantuModel = new KantorCabangPembantuModel();
        $this->KantorCabangModel = new KantorCabangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Kantor Cabang Pembantu',
            'menu' => 'KCP',
            'validation' => \Config\Services::validation(),
            'kantor_cabang_pembantu' => $this->KantorCabangPembantuModel->getAll()
        ];

        return view('kantor_cabang_pembantu/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Kantor Cabang Pembantu',
            'menu' => 'KCP',
            'validation' => \Config\Services::validation(),
            'kantor_cabang_pembantu' => $this->KantorCabangPembantuModel->getKantorCabangPembantu(),
            'kantor_cabang' => $this->KantorCabangModel->getKantorCabang()
        ];

        return view('kantor_cabang_pembantu/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'kantor_cabang_id'     => 'required',
            'kode_kantor'     => 'required|is_unique[kantor_cabang.kode_kantor]',
            'nama_kantor'     => 'required',
            'jenis_kantor'     => 'required',
            'klasifikasi_kantor'     => 'required',
            'alamat'     => 'required',
            'no_telp'     => 'required',
        ])) {
            return redirect()->to('/kantor_cabang_pembantu/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->KantorCabangPembantuModel->save([
            'kantor_cabang_id'    => $this->request->getVar('kantor_cabang_id'),
            'kode_kantor'    => $this->request->getVar('kode_kantor'),
            'nama_kantor'    => $this->request->getVar('nama_kantor'),
            'jenis_kantor'    => $this->request->getVar('jenis_kantor'),
            'klasifikasi_kantor'    => $this->request->getVar('klasifikasi_kantor'),
            'alamat'    => $this->request->getVar('alamat'),
            'no_telp'    => $this->request->getVar('no_telp'),
            'user_log'    => $this->request->getVar('user_log'),
        ]);

        session()->setFlashdata('pesan', 'Data kantor cabang pembantu baru berhasil ditambahkan');

        return redirect()->to('/kantor_cabang_pembantu');
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

            $kantor_cabang_id = $row[0];
            $kode_kantor = $row[1];
            $nama_kantor = $row[2];
            $jenis_kantor = $row[3];
            $klasifikasi_kantor = $row[4];
            $alamat = $row[5];
            $no_telp = $row[6];

            $db = \Config\Database::connect();

            $cek_kode_kantor = $db->table('kantor_cabang_pembantu')->getWhere(['kode_kantor' => $kode_kantor])->getResult();

            if (count($cek_kode_kantor) > 0) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data duplikat gagal diimport, kode kantor sudah ada</b>');
            } elseif (($kantor_cabang_id == null) || ($kode_kantor == null) || ($nama_kantor == null) || ($jenis_kantor == null) || ($klasifikasi_kantor == null) || ($alamat == null) || ($no_telp == null)) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, kolom pada file import excel tidak boleh kosong</b>');
            } else {

                $this->KantorCabangPembantuModel->save([
                    'kantor_cabang_id' => $kantor_cabang_id,
                    'kode_kantor' => $kode_kantor,
                    'nama_kantor' => $nama_kantor,
                    'jenis_kantor' => $jenis_kantor,
                    'klasifikasi_kantor' => $klasifikasi_kantor,
                    'alamat' => $alamat,
                    'no_telp' => $no_telp,
                    'user_log'    => $this->request->getVar('user_log'),
                ]);
                session()->setFlashdata('message', 'Berhasil import excel data kantor cabang pembantu');
            }
        }

        return redirect()->to('/kantor_cabang_pembantu');
    }

    public function edit($kode_kantor)
    {
        $data = [
            'title' => 'Edit Kantor Cabang Pembantu',
            'menu' => 'KCP',
            'validation' => \Config\Services::validation(),
            'kantor_cabang_pembantu' => $this->KantorCabangPembantuModel->getOneKantorCabangPembantu($kode_kantor),
            'kantor_cabang' => $this->KantorCabangModel->getKantorCabang()

        ];

        return view('kantor_cabang_pembantu/edit', $data);
    }

    public function update($kode_kantor)
    {
        //Validation
        $kodeKantorLama = $this->KantorCabangPembantuModel->getKantorCabangPembantu($kode_kantor);
        if ($kodeKantorLama['kode_kantor'] == $this->request->getVar('kode_kantor')) {
            $rule_unique = 'required';
        } else {
            $rule_unique = 'required|is_unique[kantor_cabang_pembantu.kode_kantor]';
        }

        if (!$this->validate([
            'kantor_cabang_id'     => 'required',
            'kode_kantor'     => $rule_unique,
            'nama_kantor'     => 'required',
            'jenis_kantor'     => 'required',
            'klasifikasi_kantor'     => 'required',
            'alamat'     => 'required',
            'no_telp'     => 'required',
        ])) {
            return redirect()->to('kantor_cabang_pembantu/edit/' . $kode_kantor)->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->KantorCabangPembantuModel->save([
            'kode_kantor' => $kode_kantor,
            'kantor_cabang_id'    => $this->request->getVar('kantor_cabang_id'),
            'nama_kantor'    => $this->request->getVar('nama_kantor'),
            'jenis_kantor'    => $this->request->getVar('jenis_kantor'),
            'klasifikasi_kantor'    => $this->request->getVar('klasifikasi_kantor'),
            'alamat'    => $this->request->getVar('alamat'),
            'no_telp'    => $this->request->getVar('no_telp'),
            'user_log'    => $this->request->getVar('user_log'),
        ]);

        session()->setFlashdata('pesan', 'Data kantor cabang pembantu berhasil diedit');

        return redirect()->to('kantor_cabang_pembantu');
    }

    public function delete($kode_kantor)
    {
        $this->KantorCabangPembantuModel->delete($kode_kantor);
        session()->setFlashdata('pesan', 'Data kantor cabang pembantu berhasil dihapus');
        return redirect()->to('/kantor_cabang_pembantu');
    }
}
