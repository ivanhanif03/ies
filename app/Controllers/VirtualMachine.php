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
            'virtual_machine' => $this->VirtualMachineModel->getAll()
        ];

        // dd($data);

        return view('server/vm/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Server Virtual Machine',
            'menu' => 'vm',
            'virtual_machine' => $this->VirtualMachineModel->getOneServerVm($id),
            // 'nama_vendor' => $this->ServerFisikModel->getNamaVendor($id),
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
            'virtual_machine' => $this->VirtualMachineModel->getVirtualMachine(),
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
            'host'  => 'required',
            'ip_address'  => 'required',
            'hostname'  => 'required|is_unique[virtual_machine.hostname,id,{id}]',
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
            'host' => $this->request->getVar('host'),
            'ip_address' => $this->request->getVar('ip_address'),
            'hostname' => $this->request->getVar('hostname'),
            'disk' => $this->request->getVar('disk'),
            'memory' => $this->request->getVar('memory'),
            'processor' => $this->request->getVar('processor'),
            'jenis_server' => $this->request->getVar('jenis_server'),
            'lisence' => $this->request->getVar('lisence'),
        ]);

        session()->setFlashdata('pesan', 'Data server fisik baru berhasil ditambahkan');

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
            $host = $row[2];
            $ip_address = $row[3];
            $hostname = $row[4];
            $disk = $row[5];
            $memory = $row[6];
            $processor = $row[7];
            $jenis_server = $row[8];
            $lisence = $row[9];

            $db = \Config\Database::connect();

            $cek_kode_hostname = $db->table('virtual_machine')->getWhere(['hostname' => $hostname])->getResult();

            if (count($cek_kode_hostname) > 0) {
                session()->setFlashdata('message', '<b>Data gagal diimport, terdapat hostname yang sudah terdaftar</b>');
            }
            if (($cluster_id == null) || ($os_id == null) || ($host == null) || ($ip_address == null) || ($hostname == null) || ($disk == null) || ($memory == null) ||  ($processor == null) || ($jenis_server == null) || ($lisence == null)) {
                session()->setFlashdata('message', '<b>Data gagal diimport, kolom pada file import excel tidak boleh kosong</b>');
            } else {
                $this->VirtualMachineModel->save([
                    'cluster_id' => $cluster_id,
                    'os_id' => $os_id,
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
            'virtual_machine' => $this->VirtualMachineModel->getVirtualMachine($id),
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
