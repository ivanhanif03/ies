<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AppModel;
use App\Models\CloudModel;
use App\Models\OsModel;
use App\Models\ProviderModel;

class Cloud extends BaseController
{
    protected $CloudModel, $ProviderModel, $OsModel, $AppModel;

    public function __construct()
    {
        $this->CloudModel = new CloudModel();
        $this->ProviderModel = new ProviderModel();
        $this->OsModel = new OsModel();
        $this->AppModel = new AppModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Server Cloud',
            'menu' => 'cloud',
            'validation' => \Config\Services::validation(),
            'cloud' => $this->CloudModel->getAll()
        ];

        return view('server/cloud/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Server Cloud',
            'menu' => 'cloud',
            'cloud' => $this->CloudModel->getOneCloud($id),
            // 'nama_vendor' => $this->CloudModel->getNamaVendor($id),
            // 'vendor' => $this->VendorModel->getVendor()
        ];

        return view('server/cloud/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Server Cloud',
            'menu' => 'cloud',
            'validation' => \Config\Services::validation(),
            'cloud' => $this->CloudModel->getCloud(),
            'provider' => $this->ProviderModel->getProviders(),
            'os' => $this->OsModel->getOs(),
            'app' => $this->AppModel->getApp()
        ];

        return view('server/cloud/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'provider_id'  => 'required',
            'os_id'  => 'required',
            'app_id'  => 'required',
            // 'nama_cloud'  => 'required|is_unique[cloud.nama_cloud,id,{id}]',
            // 'ip_address'  => 'required|is_unique[cloud.ip_address,id,{id}]',
            'nama_cloud'  => 'required',
            'ip_address'  => 'required',
            'hostname'  => 'required',
            'disk'  => 'required',
            'memory'  => 'required',
            'jumlah_core'  => 'required',
            'processor'  => 'required',
            'jenis_server'  => 'required',
            'jenis_payment'  => 'required',
            'biaya' => 'required',
            'masa_aktif'  => 'required',
            'memo' => [
                'rules' => 'mime_in[memo,application/pdf]|max_size[memo,2048]',
                'errors' => [
                    'mime_in' => 'File extention harus berupa PDF',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ]
        ])) {
            return redirect()->to('cloud/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        // $fileMemo = $this->request->getFile('memo');
        // $memoName = $fileMemo->getName();
        // $fileMemo->move('uploads/memo_cloud', $memoName);

        $fileMemo = $this->request->getFile('memo');
        // dd($gambarServer);
        //if not upload gambar server
        if ($fileMemo->getError() == 4) {
            $memoName =  'kosong';
        } else {
            $memoName = $fileMemo->getName();
            $fileMemo->move('uploads/memo_cloud', $memoName);
        }

        $this->CloudModel->save([
            'provider_id'    => $this->request->getVar('provider_id'),
            'os_id'   => $this->request->getVar('os_id'),
            'app_id'   => $this->request->getVar('app_id'),
            'nama_cloud' => $this->request->getVar('nama_cloud'),
            'ip_address' => $this->request->getVar('ip_address'),
            'hostname' => $this->request->getVar('hostname'),
            'disk' => $this->request->getVar('disk'),
            'memory' => $this->request->getVar('memory'),
            'jumlah_core' => $this->request->getVar('jumlah_core'),
            'processor' => $this->request->getVar('processor'),
            'jenis_server' => $this->request->getVar('jenis_server'),
            'jenis_payment' => $this->request->getVar('jenis_payment'),
            'biaya' => $this->request->getVar('biaya'),
            'masa_aktif' => $this->request->getVar('masa_aktif'),
            'user_log' => $this->request->getVar('user_log'),
            'memo' => $memoName
        ]);

        session()->setFlashdata('pesan', 'Data server Cloud baru berhasil ditambahkan');

        return redirect()->to('cloud');
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

            $provider_id = $row[0];
            $os_id = $row[1];
            $nama_cloud = $row[2];
            $ip_address = $row[3];
            $hostname = $row[4];
            $disk = $row[5];
            $memory = $row[6];
            $jumlah_core = $row[7];
            $processor = $row[8];
            $jenis_server = $row[9];
            $jenis_payment = $row[10];
            $app_id = $row[11];
            $masa_aktif = $row[12];
            $biaya = $row[13];
            $memo = $row[14];

            $db = \Config\Database::connect();

            $cek_cloud = $db->table('cloud')->getWhere(['nama_cloud' => $nama_cloud])->getResult();
            $cek_ip = $db->table('cloud')->getWhere(['ip_address' => $ip_address])->getResult();

            if ((count($cek_cloud) > 0) || (count($cek_ip) > 0)) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, vm sudah ada</b>');
            }
            if (($provider_id == null) || ($os_id == null) || ($nama_cloud == null) || ($ip_address == null) || ($hostname == null) || ($disk == null) || ($memory == null) ||  ($jumlah_core == null) ||  ($processor == null) || ($jenis_server == null) || ($jenis_payment == null) || ($biaya == null) || ($app_id == null) || ($masa_aktif == null) || ($memo == null)) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, kolom pada file import excel tidak boleh kosong</b>');
            } else {
                $this->CloudModel->save([
                    'provider_id' => $provider_id,
                    'os_id' => $os_id,
                    'app_id' => $app_id,
                    'nama_cloud' => $nama_cloud,
                    'ip_address' => $ip_address,
                    'hostname' => $hostname,
                    'disk' => $disk,
                    'memory' => $memory,
                    'jumlah_core' => $jumlah_core,
                    'processor' => $processor,
                    'jenis_server' => $jenis_server,
                    'jenis_payment' => $jenis_payment,
                    'biaya' => $biaya,
                    'masa_aktif' => $masa_aktif,
                    'memo' => $memo,
                    'user_log' => $this->request->getVar('user_log'),

                ]);
                session()->setFlashdata('message', 'Berhasil import excel data server Cloud');
            }
        }

        return redirect()->to('/cloud');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Server Cloud',
            'menu' => 'cloud',
            'validation' => \Config\Services::validation(),
            'cloud' => $this->CloudModel->getCloud($id),
            'provider' => $this->ProviderModel->getProviders(),
            'os' => $this->OsModel->getOs(),
            'app' => $this->AppModel->getApp()
        ];

        return view('server/cloud/edit', $data);
    }

    public function update($id)
    {
        //Validation
        $cloudLama = $this->CloudModel->getCloud($id);
        if ($cloudLama['nama_cloud'] == $this->request->getVar('nama_cloud')) {
            $rule_unique = 'required';
        } else {
            $rule_unique = 'required|is_unique[cloud.nama_cloud]';
        }

        if ($cloudLama['ip_address'] == $this->request->getVar('ip_address')) {
            $rule_unique_ip = 'required';
        } else {
            $rule_unique_ip = 'required|is_unique[cloud.ip_address]';
        }

        if (!$this->validate([
            'provider_id'  => 'required',
            'os_id'  => 'required',
            'app_id'  => 'required',
            // 'nama_cloud'  => $rule_unique,
            // 'ip_address'  => $rule_unique_ip,
            'nama_cloud'  => 'required',
            'ip_address'  => 'required',
            'hostname'  => 'required',
            'disk'  => 'required',
            'memory'  => 'required',
            'jumlah_core'  => 'required',
            'processor'  => 'required',
            'jenis_server'  => 'required',
            'jenis_payment'  => 'required',
            'biaya' => 'required',
            'masa_aktif'  => 'required',
            'memo' => [
                'rules' => 'mime_in[memo,application/pdf]|max_size[memo,2048]',
                'errors' => [
                    'mime_in' => 'File extention harus berupa PDF',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ]
        ])) {
            return redirect()->to('cloud/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileMemo = $this->request->getFile('memo');

        //if not upload gambar rak
        if ($fileMemo->getError() == 4) {
            $memoName =  $this->request->getVar('memo_lama');
        } else {
            //generate nama file random
            $memoName = $fileMemo->getName();
            //move to folder gambar rak
            $fileMemo->move('uploads/memo_cloud', $memoName);
            //delete old file gambar rak
            if ($this->request->getVar('memo_lama') != 'kosong') {
                unlink('uploads/memo_cloud/' . $this->request->getVar('memo_lama'));
            }
        }

        $this->CloudModel->save([
            'id' => $id,
            'provider_id'    => $this->request->getVar('provider_id'),
            'os_id'   => $this->request->getVar('os_id'),
            'app_id'   => $this->request->getVar('app_id'),
            'nama_cloud' => $this->request->getVar('nama_cloud'),
            'ip_address' => $this->request->getVar('ip_address'),
            'hostname' => $this->request->getVar('hostname'),
            'disk' => $this->request->getVar('disk'),
            'memory' => $this->request->getVar('memory'),
            'jumlah_core' => $this->request->getVar('jumlah_core'),
            'processor' => $this->request->getVar('processor'),
            'jenis_server' => $this->request->getVar('jenis_server'),
            'jenis_payment' => $this->request->getVar('jenis_payment'),
            'biaya' => $this->request->getVar('biaya'),
            'masa_aktif' => $this->request->getVar('masa_aktif'),
            'user_log' => $this->request->getVar('user_log'),
            'memo'   => $memoName,
        ]);

        session()->setFlashdata('pesan', 'Data server Cloud berhasil diedit');

        return redirect()->to('cloud');
    }

    public function delete($id)
    {
        $this->CloudModel->delete($id);
        session()->setFlashdata('pesan', 'Data server Cloud berhasil dihapus');
        return redirect()->to('cloud');
    }
}
