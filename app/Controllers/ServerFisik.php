<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AppModel;
use App\Models\OsModel;
use App\Models\RakModel;
use App\Models\ServerFisikModel;
use App\Models\KontrakModel;

class ServerFisik extends BaseController
{
    protected $ServerFisikModel, $KontrakModel, $AppModel, $RakModel, $OsModel;

    public function __construct()
    {
        $this->ServerFisikModel = new ServerFisikModel();
        $this->KontrakModel = new KontrakModel();
        $this->RakModel = new RakModel();
        $this->AppModel = new AppModel();
        $this->OsModel = new OsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Server Fisik',
            'menu' => 'fisik',
            'validation' => \Config\Services::validation(),
            'fisik' => $this->ServerFisikModel->getAll(),
        ];

        return view('server/fisik/index', $data);
    }

    public function dismantle()
    {
        $data = [
            'title' => 'Daftar Server Fisik Dismantle',
            'menu' => 'fisik_dismantle',
            'validation' => \Config\Services::validation(),
            'fisik_dismantle' => $this->ServerFisikModel->getAllDismantle()
        ];

        return view('server/fisik/dismantle', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Server Fisik',
            'menu' => 'fisik',
            'fisik' => $this->ServerFisikModel->getOneServerFisik($id),
        ];

        return view('server/fisik/detail', $data);
    }

    public function detailDismantle($id)
    {
        $data = [
            'title' => 'Detail Server Fisik Dismantle',
            'menu' => 'fisik_dismantle',
            'fisik' => $this->ServerFisikModel->getOneServerFisik($id),
        ];

        return view('server/fisik/detail_dismantle', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Server Fisik',
            'menu' => 'fisik',
            'validation' => \Config\Services::validation(),
            'fisik' => $this->ServerFisikModel->getServerFisik(),
            'kontrak' => $this->KontrakModel->getKontrak(),
            'app' => $this->AppModel->getApp(),
            'rak' => $this->RakModel->getRak(),
            'os' => $this->OsModel->getOs()
        ];

        return view('server/fisik/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            // 'kode_aset'     => 'required|is_unique[server_fisik.kode_aset,id,{id}]',
            // 'serial_number'   => 'required|is_unique[server_fisik.serial_number,id,{id}]',
            // 'ip_address_data'  => 'required|is_unique[server_fisik.ip_address_data,id,{id}]',
            // 'ip_address_management'  => 'required|is_unique[server_fisik.ip_address_management,id,{id}]',
            'kode_aset'     => 'required',
            'serial_number'   => 'required',
            'ip_address_data'  => 'required',
            'ip_address_management'  => 'required',
            'app_id'  => 'required',
            'jenis_app'  => 'required',
            'hostname'  => 'required',
            'jenis_appliance'  => 'required',
            'rak_id'  => 'required',
            'rak_unit'  => 'required',
            'vendor_software_id'  => 'required',
            'vendor_hardware_id'  => 'required',
            'merek'  => 'required',
            'tipe'  => 'required',
            'os_id'  => 'required',
            'disk'  => 'required',
            'tipe_disk'  => 'required',
            'memory'  => 'required',
            'tipe_memory'  => 'required',
            'jumlah_core'  => 'required',
            'processor'  => 'required',
            'logical_processor' => 'required',
            'gambar_server' => [
                'rules' => 'mime_in[gambar_server,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_server,10000]',
                'errors' => [
                    // 'uploaded' => 'Harus ada Gambar Rak yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]

            ]
        ])) {
            return redirect()->to('serverfisik/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $gambarServer = $this->request->getFile('gambar_server');
        // dd($gambarServer);
        //if not upload gambar server
        if ($gambarServer->getError() == 4) {
            $gambarServerName =  'default_gambar_server.jpg';
        } else {
            $gambarServerName = $gambarServer->getRandomName();
            $gambarServer->move('img/gambar_server', $gambarServerName);
        }

        $this->ServerFisikModel->save([
            'kode_aset'    => $this->request->getVar('kode_aset'),
            'serial_number'   => $this->request->getVar('serial_number'),
            'app_id' => $this->request->getVar('app_id'),
            'jenis_app' => $this->request->getVar('jenis_app'),
            'ip_address_data' => $this->request->getVar('ip_address_data'),
            'username_os' => $this->request->getVar('username_os'),
            'password_os' => $this->request->getVar('password_os'),
            'ip_address_management' => $this->request->getVar('ip_address_management'),
            'username_ilo' => $this->request->getVar('username_ilo'),
            'password_ilo' => $this->request->getVar('password_ilo'),
            'hostname' => $this->request->getVar('hostname'),
            'jenis_appliance' => $this->request->getVar('jenis_appliance'),
            'rak_id' => $this->request->getVar('rak_id'),
            'rak_unit' => $this->request->getVar('rak_unit'),
            'vendor_software_id' => $this->request->getVar('vendor_software_id'),
            'vendor_hardware_id' => $this->request->getVar('vendor_hardware_id'),
            'merek' => $this->request->getVar('merek'),
            'tipe' => $this->request->getVar('tipe'),
            'os_id' => $this->request->getVar('os_id'),
            'disk' => $this->request->getVar('disk'),
            'tipe_disk' => $this->request->getVar('tipe_disk'),
            'memory' => $this->request->getVar('memory'),
            'tipe_memory' => $this->request->getVar('tipe_memory'),
            'jumlah_core' => $this->request->getVar('jumlah_core'),
            'processor' => $this->request->getVar('processor'),
            'logical_processor' => $this->request->getVar('logical_processor'),
            'user_log' => $this->request->getVar('user_log'),
            'gambar_server'   => $gambarServerName,
        ]);

        session()->setFlashdata('pesan', 'Data server fisik baru berhasil ditambahkan');

        return redirect()->to('serverfisik');
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

            $kode_aset = $row[0];
            $serial_number = $row[1];
            $app_id = $row[2];
            $jenis_app = $row[3];
            $ip_address_data = $row[4];
            $username_os = $row[5];
            $password_os = $row[6];
            $ip_address_management = $row[7];
            $username_ilo = $row[8];
            $password_ilo = $row[9];
            $hostname = $row[10];
            $jenis_appliance = $row[11];
            $rak_id = $row[12];
            $rak_unit = $row[13];
            $vendor_software_id = $row[14];
            $vendor_hardware_id = $row[15];
            $merek = $row[16];
            $tipe = $row[17];
            $os_id = $row[18];
            $disk = $row[19];
            $tipe_disk = $row[20];
            $memory = $row[21];
            $tipe_memory = $row[22];
            $jumlah_core = $row[23];
            $processor = $row[24];
            $logical_processor = $row[25];
            $gambar_server = $row[26];

            $db = \Config\Database::connect();

            $cek_kode_aset = $db->table('server_fisik')->getWhere(['kode_aset' => $kode_aset])->getResult();

            if (count($cek_kode_aset) > 0) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, kode aset sudah ada</b>');
            }
            if (($kode_aset == null) || ($serial_number == null) || ($app_id == null) || ($jenis_app == null) || ($ip_address_data == null) || ($ip_address_management == null) || ($hostname == null) ||  ($jenis_appliance == null) || ($rak_id == null) || ($rak_unit == null) || ($vendor_software_id == null) || ($vendor_hardware_id == null) || ($merek == null) || ($tipe == null) || ($os_id == null) || ($disk == null) || ($tipe_disk == null) || ($memory == null) || ($tipe_memory == null) || ($jumlah_core == null) || ($processor == null) || ($logical_processor == null) || ($gambar_server == null)) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, kolom pada file import excel tidak boleh kosong</b>');
            } else {
                $this->ServerFisikModel->save([
                    'kode_aset' => $kode_aset,
                    'serial_number' => $serial_number,
                    'app_id' => $app_id,
                    'jenis_app' => $jenis_app,
                    'ip_address_data' => $ip_address_data,
                    'username_os' => $username_os,
                    'password_os' => $password_os,
                    'ip_address_management' => $ip_address_management,
                    'username_ilo' => $username_ilo,
                    'password_ilo' => $password_ilo,
                    'hostname' => $hostname,
                    'jenis_appliance' => $jenis_appliance,
                    'rak_id' => $rak_id,
                    'rak_unit' => $rak_unit,
                    'vendor_software_id' => $vendor_software_id,
                    'vendor_hardware_id' => $vendor_hardware_id,
                    'merek' => $merek,
                    'tipe' => $tipe,
                    'os_id' => $os_id,
                    'disk' => $disk,
                    'tipe_disk' => $tipe_disk,
                    'memory' => $memory,
                    'jumlah_core' => $jumlah_core,
                    'tipe_memory' => $tipe_memory,
                    'processor' => $processor,
                    'logical_processor' => $logical_processor,
                    'gambar_server' => $gambar_server,
                    'user_log' => $this->request->getVar('user_log'),
                ]);
                session()->setFlashdata('message', 'Berhasil import excel data server fisik');
            }
        }

        return redirect()->to('/serverfisik');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Server Fisik',
            'menu' => 'fisik',
            'validation' => \Config\Services::validation(),
            'fisik' => $this->ServerFisikModel->getServerFisik($id),
            'kontrak' => $this->KontrakModel->getKontrak(),
            'app' => $this->AppModel->getApp(),
            'rak' => $this->RakModel->getRak(),
            'os' => $this->OsModel->getOs()
        ];

        return view('server/fisik/edit', $data);
    }

    public function update($id)
    {
        //Validation
        $fisikLama = $this->ServerFisikModel->getServerFisik($id);
        if ($fisikLama['kode_aset'] == $this->request->getVar('kode_aset')) {
            $rule_unique_aset = 'required';
        } else {
            $rule_unique_aset = 'required|is_unique[server_fisik.kode_aset]';
        }

        if ($fisikLama['serial_number'] == $this->request->getVar('serial_number')) {
            $rule_unique_sn = 'required';
        } else {
            $rule_unique_sn = 'required|is_unique[server_fisik.serial_number]';
        }

        if ($fisikLama['ip_address_data'] == $this->request->getVar('ip_address_data')) {
            $rule_unique_data = 'required';
        } else {
            $rule_unique_data = 'required|is_unique[server_fisik.ip_address_data]';
        }

        if ($fisikLama['ip_address_management'] == $this->request->getVar('ip_address_management')) {
            $rule_unique_mngmt = 'required';
        } else {
            $rule_unique_mngmt = 'required|is_unique[server_fisik.ip_address_management]';
        }

        if (!$this->validate([
            // 'kode_aset'     => $rule_unique_aset,
            // 'serial_number'   => $rule_unique_sn,
            // 'ip_address_data'  => $rule_unique_data,
            // 'ip_address_management'  => $rule_unique_mngmt,
            'kode_aset'     => 'required',
            'serial_number'   => 'required',
            'ip_address_data'  => 'required',
            'ip_address_management'  => 'required',
            'app_id'  => 'required',
            'jenis_app'  => 'required',
            'hostname'  => 'required',
            'jenis_appliance'  => 'required',
            'rak_id'  => 'required',
            'rak_unit'  => 'required',
            'vendor_software_id'  => 'required',
            'vendor_hardware_id'  => 'required',
            'merek'  => 'required',
            'tipe'  => 'required',
            'os_id'  => 'required',
            'disk'  => 'required',
            'tipe_disk'  => 'required',
            'memory'  => 'required',
            'tipe_memory'  => 'required',
            'jumlah_core'  => 'required',
            'processor'  => 'required',
            'logical_processor'  => 'required',
            'gambar_server' => [
                'rules' => 'mime_in[gambar_server,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar_server,10000]',
                'errors' => [
                    // 'uploaded' => 'Harus ada Gambar Rak yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran File Maksimal 10 MB'
                ]

            ]
        ])) {
            return redirect()->to('serverfisik/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $gambarServer = $this->request->getFile('gambar_server');

        //if not upload gambar rak
        if ($gambarServer->getError() == 4) {
            $gambarServerName =  $this->request->getVar('gambar_server_lama');
        } else {
            //generate nama file random
            $gambarServerName = $gambarServer->getRandomName();
            //move to folder gambar rak
            $gambarServer->move('img/gambar_server', $gambarServerName);
            //delete old file gambar rak
            if ($this->request->getVar('gambar_server_lama') != 'default_gambar_server.jpg') {
                unlink('img/gambar_server/' . $this->request->getVar('gambar_server_lama'));
            }
        }

        $this->ServerFisikModel->save([
            'id' => $id,
            'kode_aset'    => $this->request->getVar('kode_aset'),
            'serial_number'   => $this->request->getVar('serial_number'),
            'app_id' => $this->request->getVar('app_id'),
            'jenis_app' => $this->request->getVar('jenis_app'),
            'ip_address_data' => $this->request->getVar('ip_address_data'),
            'username_os' => $this->request->getVar('username_os'),
            'password_os' => $this->request->getVar('password_os'),
            'ip_address_management' => $this->request->getVar('ip_address_management'),
            'username_ilo' => $this->request->getVar('username_ilo'),
            'password_ilo' => $this->request->getVar('password_ilo'),
            'hostname' => $this->request->getVar('hostname'),
            'jenis_appliance' => $this->request->getVar('jenis_appliance'),
            'rak_id' => $this->request->getVar('rak_id'),
            'rak_unit' => $this->request->getVar('rak_unit'),
            'vendor_software_id' => $this->request->getVar('vendor_software_id'),
            'vendor_hardware_id' => $this->request->getVar('vendor_hardware_id'),
            'merek' => $this->request->getVar('merek'),
            'tipe' => $this->request->getVar('tipe'),
            'os_id' => $this->request->getVar('os_id'),
            'disk' => $this->request->getVar('disk'),
            'tipe_disk' => $this->request->getVar('tipe_disk'),
            'memory' => $this->request->getVar('memory'),
            'tipe_memory' => $this->request->getVar('tipe_memory'),
            'jumlah_core' => $this->request->getVar('jumlah_core'),
            'processor' => $this->request->getVar('processor'),
            'logical_processor' => $this->request->getVar('logical_processor'),
            'user_log' => $this->request->getVar('user_log'),
            'gambar_server'   => $gambarServerName,
        ]);

        session()->setFlashdata('pesan', 'Data server fisik berhasil diedit');

        return redirect()->to('serverfisik');
    }

    public function delete($id)
    {
        //Cari gambar server berdasarkan id
        $rak = $this->ServerFisikModel->find($id);

        //Cek jika gambar default
        if ($rak['gambar_server'] != 'default_gambar_server.jpg') {
            //Delete gambar rak
            unlink('img/gambar_server/' . $rak['gambar_server']);
        }

        $this->ServerFisikModel->delete($id);
        session()->setFlashdata('pesan', 'Data server fisik berhasil dihapus');
        return redirect()->to('serverfisik');
    }

    public function dismantleBtn($id)
    {
        $date_now = date('y-m-d');

        // dd($date_now);
        $this->ServerFisikModel->save([
            'id' => $id,
            'dismantle' => $date_now
        ]);

        session()->setFlashdata('pesan', 'Server fisik berhasil di dismantle');

        return redirect()->to('serverfisik');
    }

    public function nonDismantleBtn($id)
    {
        $date_now = null;

        // dd($date_now);
        $this->ServerFisikModel->save([
            'id' => $id,
            'dismantle' => $date_now
        ]);

        session()->setFlashdata('pesan', 'Server fisik batal di dismantle');

        return redirect()->to('serverfisik/dismantle');
    }
}
