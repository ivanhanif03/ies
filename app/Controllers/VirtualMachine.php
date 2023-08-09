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
            // 'nama_vm'  => 'required|is_unique[virtualmachine.nama_vm,id,{id}]',
            // 'ip_address'  => 'required|is_unique[virtualmachine.ip_address,id,{id}]',
            'nama_vm'  => 'required',
            'ip_address'  => 'required',
            'hostname'  => 'required',
            'disk'  => 'required',
            'memory'  => 'required',
            'jumlah_core'  => 'required',
            'processor'  => 'required',
            'jenis_server'  => 'required',
            'lisence'  => 'required',
            'masa_aktif'  => 'required',
            'replikasi'  => 'required',
            'memo_vm' => [
                'rules' => 'mime_in[memo_vm,application/pdf]|max_size[memo_vm,2048]',
                'errors' => [
                    'mime_in' => 'File extention harus berupa PDF',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ]
        ])) {
            return redirect()->to('virtualmachine/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        // $fileMemoVm = $this->request->getFile('memo_vm');
        // $memoVmName = $fileMemoVm->getName();
        // $fileMemoVm->move('uploads/memo_vm', $memoVmName);

        $fileMemoVm = $this->request->getFile('memo_vm');
        // dd($gambarServer);
        //if not upload gambar server
        if ($fileMemoVm->getError() == 4) {
            $memoVmName =  'kosong';
        } else {
            $memoVmName = $fileMemoVm->getName();
            $fileMemoVm->move('uploads/memo_vm', $memoVmName);
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
            'masa_aktif' => $this->request->getVar('masa_aktif'),
            'replikasi' => $this->request->getVar('replikasi'),
            'user_log' => $this->request->getVar('user_log'),
            'memo_vm' => $memoVmName
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
            $masa_aktif = $row[12];
            $memo_vm = $row[13];
            $replikasi = $row[14];

            $db = \Config\Database::connect();

            // $cek_kode_aset = $db->table('virtualmachine')->getWhere(['nama_vm' => $nama_vm])->getResult();
            // $cek_ip = $db->table('virtualmachine')->getWhere(['ip_address' => $ip_address])->getResult();

            // if ((count($cek_kode_aset) > 0) || (count($cek_ip) > 0)) {
            //     session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, vm sudah ada</b>');
            // }
            if (($cluster_id == null) || ($os_id == null) || ($nama_vm == null) || ($ip_address == null) || ($hostname == null) || ($disk == null) || ($memory == null) ||  ($jumlah_core == null) ||  ($processor == null) || ($jenis_server == null) || ($lisence == null) || ($app_id == null) || ($masa_aktif == null) || ($memo_vm == null) || ($replikasi == null)) {
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
                    'masa_aktif' => $masa_aktif,
                    'memo_vm' => $memo_vm,
                    'replikasi' => $replikasi,
                    'user_log' => $this->request->getVar('user_log'),

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
            // 'nama_vm'  => $rule_unique,
            // 'ip_address'  => $rule_unique_ip,
            'nama_vm'  => 'required',
            'ip_address'  => 'required',
            'hostname'  => 'required',
            'disk'  => 'required',
            'memory'  => 'required',
            'jumlah_core'  => 'required',
            'processor'  => 'required',
            'jenis_server'  => 'required',
            'lisence'  => 'required',
            'masa_aktif'  => 'required',
            'replikasi'  => 'required',
            'memo_vm' => [
                'rules' => 'mime_in[memo_vm,application/pdf]|max_size[memo_vm,2048]',
                'errors' => [
                    'mime_in' => 'File extention harus berupa PDF',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ]
        ])) {
            return redirect()->to('virtualmachine/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileMemoVm = $this->request->getFile('memo_vm');

        //if not upload gambar rak
        if ($fileMemoVm->getError() == 4) {
            $memoVmName =  $this->request->getVar('memo_vm_lama');
        } else {
            //generate nama file random
            $memoVmName = $fileMemoVm->getName();
            //move to folder gambar rak
            $fileMemoVm->move('uploads/memo_vm', $memoVmName);
            //delete old file gambar rak
            if ($this->request->getVar('memo_vm_lama') != 'kosong') {
                unlink('uploads/memo_vm/' . $this->request->getVar('memo_vm_lama'));
            }
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
            'masa_aktif' => $this->request->getVar('masa_aktif'),
            'replikasi' => $this->request->getVar('replikasi'),
            'user_log' => $this->request->getVar('user_log'),
            'memo_vm'   => $memoVmName,
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
