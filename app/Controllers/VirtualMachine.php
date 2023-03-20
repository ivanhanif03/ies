<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClusterModel;
use App\Models\OsModel;
use App\Models\VirtualMachineModel;

class VirtualMachine extends BaseController
{
    protected $VirtualMachineModel, $ClusterModel, $OsModel;

    public function __construct()
    {
        $this->VirtualMachineModel = new VirtualMachineModel();
        $this->ClusterModel = new ClusterModel();
        $this->OsModel = new OsModel();
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
            'os' => $this->OsModel->getOs()
        ];

        return view('server/vm/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'cluster_id'  => 'required',
            'os_id'  => 'required',
            'nama_vm'  => 'required|is_unique[virtualmachine.nama_vm,id,{id}]',
            'host'  => 'required',
            'ip_address'  => 'required',
            'hostname'  => 'required',
            'disk'  => 'required',
            'memory'  => 'required',
            'processor'  => 'required',
            'jenis_server'  => 'required',
            'lisence'  => 'required',
        ])) {
            return redirect()->to('virtualmachine/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->VirtualMachineModel->save([
            'cluster_id'    => $this->request->getVar('cluster_id'),
            'os_id'   => $this->request->getVar('os_id'),
            'nama_vm' => $this->request->getVar('nama_vm'),
            'host' => $this->request->getVar('host'),
            'ip_address' => $this->request->getVar('ip_address'),
            'hostname' => $this->request->getVar('hostname'),
            'disk' => $this->request->getVar('disk'),
            'memory' => $this->request->getVar('memory'),
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
            $host = $row[3];
            $ip_address = $row[4];
            $hostname = $row[5];
            $disk = $row[6];
            $memory = $row[7];
            $processor = $row[8];
            $jenis_server = $row[9];
            $lisence = $row[10];

            $db = \Config\Database::connect();

            $cek_kode_aset = $db->table('virtualmachine')->getWhere(['nama_vm' => $nama_vm])->getResult();

            if (count($cek_kode_aset) > 0) {
                session()->setFlashdata('message', '<b class="text-danger">Data gagal diimport, vm sudah ada</b>');
            }
            if (($cluster_id == null) || ($os_id == null) || ($nama_vm == null) || ($host == null) || ($ip_address == null) || ($hostname == null) || ($disk == null) || ($memory == null) ||  ($processor == null) || ($jenis_server == null) || ($lisence == null)) {
                session()->setFlashdata('message', '<b class="text-danger">Data gagal diimport, kolom pada file import excel tidak boleh kosong</b>');
            } else {
                $this->VirtualMachineModel->save([
                    'cluster_id' => $cluster_id,
                    'os_id' => $os_id,
                    'nama_vm' => $nama_vm,
                    'host' => $host,
                    'ip_address' => $ip_address,
                    'hostname' => $hostname,
                    'disk' => $disk,
                    'memory' => $memory,
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
            'os' => $this->OsModel->getOs()
        ];

        return view('server/vm/edit', $data);
    }

    public function update($id)
    {
        //Validation
        if (!$this->validate([
            'cluster_id'  => 'required',
            'os_id'  => 'required',
            'nama_vm'  => 'required',
            'host'  => 'required',
            'ip_address'  => 'required',
            'hostname'  => 'required',
            'disk'  => 'required',
            'memory'  => 'required',
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
            'nama_vm' => $this->request->getVar('nama_vm'),
            'host' => $this->request->getVar('host'),
            'ip_address' => $this->request->getVar('ip_address'),
            'hostname' => $this->request->getVar('hostname'),
            'disk' => $this->request->getVar('disk'),
            'memory' => $this->request->getVar('memory'),
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
