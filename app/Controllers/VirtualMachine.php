<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClusterModel;
use App\Models\OsModel;
use App\Models\VirtualMachineModel;
use App\Models\AppModel;

class VirtualMachine extends BaseController
{
    protected $VirtualMachineModel, $ClusterModel, $OsModel, $AppModel;

    public function __construct()
    {
        $this->VirtualMachineModel = new VirtualMachineModel();
        $this->ClusterModel = new ClusterModel();
        $this->OsModel = new OsModel();
        $this->AppModel = new AppModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Server Virtual Machine',
            'menu' => 'vm',
            'validation' => \Config\Services::validation(),
            'virtualmachine' => $this->VirtualMachineModel->getAll()
        ];

        // dd($data);

        return view('server/vm/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Server Virtual Machine',
            'menu' => 'vm',
            'virtualmachine' => $this->VirtualMachineModel->getOneServerVirtualMachine($id),
            // 'nama_vendor' => $this->VirtualMachineModel->getNamaVendor($id),
            // 'vendor' => $this->VendorModel->getVendor()
        ];

        return view('server/vm/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Server Virtual Machine',
            'menu' => 'vm',
            'validation' => \Config\Services::validation(),
            'virtualmachine' => $this->VirtualMachineModel->getServerVirtualMachine(),
            'cluster' => $this->ClusterModel->getCluster(),
            'os' => $this->OsModel->getOs(),
            'app' => $this->AppModel->getApp()
        ];

        return view('server/vm/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'cluster_id'  => 'required',
            'os_id'  => 'required',
            'app_id'  => 'required',
            'nama_vm'  => 'required|is_unique[virtualmachine.nama_vm,id,{id}]',
            'ip_address'  => 'required|is_unique[virtualmachine.ip_address,id,{id}]',
            'hostname'  => 'required',
            'disk'  => 'required',
            'memory'  => 'required',
            'jumlah_core'  => 'required',
            'processor'  => 'required',
            'jenis_server'  => 'required',
        ])) {
            return redirect()->to('virtualmachine/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->VirtualMachineModel->save([
            'cluster_id'    => $this->request->getVar('cluster_id'),
            'os_id'   => $this->request->getVar('os_id'),
            'app_id'   => $this->request->getVar('app_id'),
            'nama_vm' => $this->request->getVar('nama_vm'),
            'ip_address' => $this->request->getVar('ip_address'),
            'hostname' => $this->request->getVar('hostname'),
            'disk' => $this->request->getVar('disk'),
            'memory' => $this->request->getVar('memory'),
            'jumlah_core' => $this->request->getVar('jumlah_core'),
            'processor' => $this->request->getVar('processor'),
            'jenis_server' => $this->request->getVar('jenis_server'),
            'lisence' => $this->request->getVar('lisence'),
        ]);

        session()->setFlashdata('pesan', 'Data server virtual machine baru berhasil ditambahkan');

        return redirect()->to('virtualmachine');
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

            $cluster_id = $row[0];
            $os_id = $row[1];
            $nama_vm = $row[2];
            $ip_address = $row[3];
            $hostname = $row[4];
            $disk = $row[5];
            $memory = $row[6];
            $jumlah_core = $row[7];
            $processor = $row[8];
            $jenis_server = $row[9];
            $lisence = $row[10];
            $app_id = $row[11];

            $db = \Config\Database::connect();

            $cek_kode_aset = $db->table('virtualmachine')->getWhere(['nama_vm' => $nama_vm])->getResult();
            $cek_ip = $db->table('virtualmachine')->getWhere(['ip_address' => $ip_address])->getResult();

            if ((count($cek_kode_aset) > 0) || (count($cek_ip) > 0)) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, vm sudah ada</b>');
            }
            if (($cluster_id == null) || ($os_id == null) || ($nama_vm == null) || ($ip_address == null) || ($hostname == null) || ($disk == null) || ($memory == null) ||  ($jumlah_core == null) ||  ($processor == null) || ($jenis_server == null) || ($lisence == null) || ($app_id == null)) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, kolom pada file import excel tidak boleh kosong</b>');
            } else {
                $this->VirtualMachineModel->save([
                    'cluster_id' => $cluster_id,
                    'os_id' => $os_id,
                    'app_id' => $app_id,
                    'nama_vm' => $nama_vm,
                    'ip_address' => $ip_address,
                    'hostname' => $hostname,
                    'disk' => $disk,
                    'memory' => $memory,
                    'jumlah_core' => $jumlah_core,
                    'processor' => $processor,
                    'jenis_server' => $jenis_server,
                    'lisence' => $lisence,
                ]);
                session()->setFlashdata('message', 'Berhasil import excel data server virtual machine');
            }
        }

        return redirect()->to('/virtualmachine');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Server Virtual Machine',
            'menu' => 'vm',
            'validation' => \Config\Services::validation(),
            'virtualmachine' => $this->VirtualMachineModel->getServerVirtualMachine($id),
            'cluster' => $this->ClusterModel->getCluster(),
            'os' => $this->OsModel->getOs(),
            'app' => $this->AppModel->getApp()
        ];

        return view('server/vm/edit', $data);
    }

    public function update($id)
    {
        //Validation
        $vmLama = $this->VirtualMachineModel->getServerVirtualMachine($id);
        if ($vmLama['nama_vm'] == $this->request->getVar('nama_vm')) {
            $rule_unique = 'required';
        } else {
            $rule_unique = 'required|is_unique[virtualmachine.nama_vm]';
        }

        if ($vmLama['ip_address'] == $this->request->getVar('ip_address')) {
            $rule_unique_ip = 'required';
        } else {
            $rule_unique_ip = 'required|is_unique[virtualmachine.ip_address]';
        }

        if (!$this->validate([
            'cluster_id'  => 'required',
            'os_id'  => 'required',
            'app_id'  => 'required',
            'nama_vm'  => $rule_unique,
            'ip_address'  => $rule_unique_ip,
            'hostname'  => 'required',
            'disk'  => 'required',
            'memory'  => 'required',
            'jumlah_core'  => 'required',
            'processor'  => 'required',
            'jenis_server'  => 'required',
            'lisence'  => 'required',
        ])) {
            return redirect()->to('virtualmachine/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->VirtualMachineModel->save([
            'id' => $id,
            'cluster_id'    => $this->request->getVar('cluster_id'),
            'os_id'   => $this->request->getVar('os_id'),
            'app_id'   => $this->request->getVar('app_id'),
            'nama_vm' => $this->request->getVar('nama_vm'),
            'ip_address' => $this->request->getVar('ip_address'),
            'hostname' => $this->request->getVar('hostname'),
            'disk' => $this->request->getVar('disk'),
            'memory' => $this->request->getVar('memory'),
            'jumlah_core' => $this->request->getVar('jumlah_core'),
            'processor' => $this->request->getVar('processor'),
            'jenis_server' => $this->request->getVar('jenis_server'),
            'lisence' => $this->request->getVar('lisence'),
        ]);

        session()->setFlashdata('pesan', 'Data server virtual machine berhasil diedit');

        return redirect()->to('virtualmachine');
    }

    public function delete($id)
    {
        $this->VirtualMachineModel->delete($id);
        session()->setFlashdata('pesan', 'Data server virtual machine berhasil dihapus');
        return redirect()->to('virtualmachine');
    }
}
