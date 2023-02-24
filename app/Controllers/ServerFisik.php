<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AppModel;
use App\Models\RakModel;
use App\Models\ServerFisikModel;
use App\Models\VendorModel;

class ServerFisik extends BaseController
{
    protected $ServerFisikModel, $VendorModel, $AppModel, $RakModel;

    public function __construct()
    {
        $this->ServerFisikModel = new ServerFisikModel();
        $this->VendorModel = new VendorModel();
        $this->RakModel = new RakModel();
        $this->AppModel = new AppModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Server Fisik',
            'menu' => 'fisik',
            'validation' => \Config\Services::validation(),
            'fisik' => $this->ServerFisikModel->getAll()
        ];

        // dd($data);

        return view('server/fisik/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Server Fisik',
            'menu' => 'fisik',
            'fisik' => $this->ServerFisikModel->getOneServerFisik($id),
            // 'nama_vendor' => $this->ServerFisikModel->getNamaVendor($id),
            // 'vendor' => $this->VendorModel->getVendor()
        ];

        return view('server/fisik/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Server Fisik',
            'menu' => 'fisik',
            'validation' => \Config\Services::validation(),
            'fisik' => $this->ServerFisikModel->getServerFisik(),
            'vendor' => $this->VendorModel->getVendor(),
            'app' => $this->AppModel->getApp(),
            'rak' => $this->RakModel->getRak()
        ];

        return view('server/fisik/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'kode_aset'     => 'required|is_unique[server_fisik.kode_aset,id,{id}]',
            'serial_number'   => 'required|is_unique[server_fisik.serial_number,id,{id}]',
            'app_id'  => 'required',
            'jenis_app'  => 'required',
            'ip_address_data'  => 'required',
            'ip_address_management'  => 'required',
            'hostname'  => 'required',
            'jenis_appliance'  => 'required',
            'rak_id'  => 'required',
            'rak_unit'  => 'required',
            'vendor_software_id'  => 'required',
            'vendor_hardware_id'  => 'required',
            'merek'  => 'required',
            'tipe'  => 'required',
            'os'  => 'required',
            'disk'  => 'required',
            'tipe_disk'  => 'required',
            'memory'  => 'required',
            'tipe_memory'  => 'required',
            'processor'  => 'required',
            'sos'  => 'required',
            'eos'  => 'required',
            'no_pks'  => 'required',
        ])) {
            return redirect()->to('serverfisik/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->ServerFisikModel->save([
            'kode_aset'    => $this->request->getVar('kode_aset'),
            'serial_number'   => $this->request->getVar('serial_number'),
            'app_id' => $this->request->getVar('app_id'),
            'jenis_app' => $this->request->getVar('jenis_app'),
            'ip_address_data' => $this->request->getVar('ip_address_data'),
            'ip_address_management' => $this->request->getVar('ip_address_management'),
            'hostname' => $this->request->getVar('hostname'),
            'jenis_appliance' => $this->request->getVar('jenis_appliance'),
            'rak_id' => $this->request->getVar('rak_id'),
            'rak_unit' => $this->request->getVar('rak_unit'),
            'vendor_software_id' => $this->request->getVar('vendor_software_id'),
            'vendor_hardware_id' => $this->request->getVar('vendor_hardware_id'),
            'merek' => $this->request->getVar('merek'),
            'tipe' => $this->request->getVar('tipe'),
            'os' => $this->request->getVar('os'),
            'disk' => $this->request->getVar('disk'),
            'tipe_disk' => $this->request->getVar('tipe_disk'),
            'memory' => $this->request->getVar('memory'),
            'tipe_memory' => $this->request->getVar('tipe_memory'),
            'processor' => $this->request->getVar('processor'),
            'sos' => $this->request->getVar('sos'),
            'eos' => $this->request->getVar('eos'),
            'no_pks' => $this->request->getVar('no_pks'),
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
            $ip_address_management = $row[5];
            $hostname = $row[6];
            $jenis_appliance = $row[7];
            $rak_id = $row[8];
            $rak_unit = $row[9];
            $vendor_software_id = $row[10];
            $vendor_hardware_id = $row[11];
            $merek = $row[12];
            $tipe = $row[13];
            $os = $row[14];
            $disk = $row[15];
            $tipe_disk = $row[16];
            $memory = $row[17];
            $tipe_memory = $row[18];
            $processor = $row[19];
            $sos = $row[20];
            $eos = $row[21];
            $no_pks = $row[22];

            $db = \Config\Database::connect();

            $cek_kode_aset = $db->table('server_fisik')->getWhere(['kode_aset' => $kode_aset])->getResult();

            if (count($cek_kode_aset) > 0) {
                session()->setFlashdata('message', '<b>Data gagal diimport, kode aset sudah ada</b>');
            } else {

                $this->ServerFisikModel->save([
                    'kode_aset' => $kode_aset,
                    'serial_number' => $serial_number,
                    'app_id' => $app_id,
                    'jenis_app' => $jenis_app,
                    'ip_address_data' => $ip_address_data,
                    'ip_address_management' => $ip_address_management,
                    'hostname' => $hostname,
                    'jenis_appliance' => $jenis_appliance,
                    'rak_id' => $rak_id,
                    'rak_unit' => $rak_unit,
                    'vendor_software_id' => $vendor_software_id,
                    'vendor_hardware_id' => $vendor_hardware_id,
                    'merek' => $merek,
                    'tipe' => $tipe,
                    'os' => $os,
                    'disk' => $disk,
                    'tipe_disk' => $tipe_disk,
                    'memory' => $memory,
                    'tipe_memory' => $tipe_memory,
                    'processor' => $processor,
                    'sos' => $sos,
                    'eos' => $eos,
                    'no_pks' => $no_pks,
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
            'vendor' => $this->VendorModel->getVendor(),
            'app' => $this->AppModel->getApp(),
            'rak' => $this->RakModel->getRak()
        ];

        return view('server/fisik/edit', $data);
    }

    public function update($id)
    {
        //Validation
        if (!$this->validate([
            'kode_aset'     => 'required',
            'serial_number'   => 'required',
            'app_id'  => 'required',
            'jenis_app'  => 'required',
            'ip_address_data'  => 'required',
            'ip_address_management'  => 'required',
            'hostname'  => 'required',
            'jenis_appliance'  => 'required',
            'rak_id'  => 'required',
            'rak_unit'  => 'required',
            'vendor_software_id'  => 'required',
            'vendor_hardware_id'  => 'required',
            'merek'  => 'required',
            'tipe'  => 'required',
            'os'  => 'required',
            'disk'  => 'required',
            'tipe_disk'  => 'required',
            'memory'  => 'required',
            'tipe_memory'  => 'required',
            'processor'  => 'required',
            'sos'  => 'required',
            'eos'  => 'required',
            'no_pks'  => 'required',
        ])) {
            return redirect()->to('serverfisik/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->ServerFisikModel->save([
            'id' => $id,
            'kode_aset'    => $this->request->getVar('kode_aset'),
            'serial_number'   => $this->request->getVar('serial_number'),
            'app_id' => $this->request->getVar('app_id'),
            'jenis_app' => $this->request->getVar('jenis_app'),
            'ip_address_data' => $this->request->getVar('ip_address_data'),
            'ip_address_management' => $this->request->getVar('ip_address_management'),
            'hostname' => $this->request->getVar('hostname'),
            'jenis_appliance' => $this->request->getVar('jenis_appliance'),
            'rak_id' => $this->request->getVar('rak_id'),
            'rak_unit' => $this->request->getVar('rak_unit'),
            'vendor_software_id' => $this->request->getVar('vendor_software_id'),
            'vendor_hardware_id' => $this->request->getVar('vendor_hardware_id'),
            'merek' => $this->request->getVar('merek'),
            'tipe' => $this->request->getVar('tipe'),
            'os' => $this->request->getVar('os'),
            'disk' => $this->request->getVar('disk'),
            'tipe_disk' => $this->request->getVar('tipe_disk'),
            'memory' => $this->request->getVar('memory'),
            'tipe_memory' => $this->request->getVar('tipe_memory'),
            'processor' => $this->request->getVar('processor'),
            'sos' => $this->request->getVar('sos'),
            'eos' => $this->request->getVar('eos'),
            'no_pks' => $this->request->getVar('no_pks'),
        ]);

        session()->setFlashdata('pesan', 'Data server fisik berhasil diedit');

        return redirect()->to('serverfisik');
    }

    public function delete($id)
    {
        $this->ServerFisikModel->delete($id);
        session()->setFlashdata('pesan', 'Data server fisik berhasil dihapus');
        return redirect()->to('serverfisik');
    }
}
