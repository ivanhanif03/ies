<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KantorCabangModel;
use App\Models\KantorCabangPembantuModel;
use App\Models\OsModel;
use App\Models\PcBranchModel;

class PcBranch extends BaseController
{
    protected $PcBranchModel, $OsModel, $KantorCabangModel, $KantorCabangPembantuModel;

    public function __construct()
    {
        $this->PcBranchModel = new PcBranchModel();
        $this->OsModel = new OsModel();
        $this->KantorCabangModel = new KantorCabangModel();
        $this->KantorCabangPembantuModel = new KantorCabangPembantuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar PC Cabang',
            'menu' => 'PC Branch',
            'validation' => \Config\Services::validation(),
            'pc_branch' => $this->PcBranchModel->getAll()
        ];

        return view('pc_branch/index', $data);
    }


    public function detail($id)
    {
        $data = [
            'title' => 'Detail PC Cabang',
            'menu' => 'PC Branch',
            'pc_branch' => $this->PcBranchModel->getOnePcBranch($id),
        ];

        return view('pc_branch/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah PC Cabang',
            'menu' => 'PC Branch',
            'validation' => \Config\Services::validation(),
            'pc_branch' => $this->PcBranchModel->getPcBranch(),
            'kc' => $this->KantorCabangModel->getKantorCabang(),
            'kcp' => $this->KantorCabangPembantuModel->getKantorCabangPembantu(),
            'os' => $this->OsModel->getOs()
        ];

        // dd($data);

        return view('pc_branch/create', $data);
    }

    public function action()
    {
        if ($this->request->getVar('action')) {
            $action = $this->request->getVar('action');

            if ($action == 'get_kcp') {
                $kcpModel = new KantorCabangPembantuModel();

                $data_kcp = $kcpModel->where('kantor_cabang_id', $this->request->getVar('kc_id'))->findAll();

                echo json_encode($data_kcp);
            }
        }
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'kode_aset'     => 'required|is_unique[pc_branch.kode_aset]',
            'serial_number'     => 'required',
            'ip_address'     => 'required',
            'hostname'     => 'required',
            'merek'     => 'required',
            'tipe'     => 'required',
            'os_id'     => 'required',
            'processor'     => 'required',
            'disk'     => 'required',
            'tipe_disk'     => 'required',
            'memory'     => 'required',
            'tipe_memory'     => 'required',
            'kc_id'     => 'required',
            // 'kcp_id'     => 'required',
        ])) {
            return redirect()->to('pcbranch/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->PcBranchModel->save([
            'kode_aset'    => $this->request->getVar('kode_aset'),
            'serial_number'    => $this->request->getVar('serial_number'),
            'ip_address'    => $this->request->getVar('ip_address'),
            'hostname'    => $this->request->getVar('hostname'),
            'merek'    => $this->request->getVar('merek'),
            'tipe'    => $this->request->getVar('tipe'),
            'os_id'    => $this->request->getVar('os_id'),
            'processor'    => $this->request->getVar('processor'),
            'disk'    => $this->request->getVar('disk'),
            'tipe_disk'    => $this->request->getVar('tipe_disk'),
            'memory'    => $this->request->getVar('memory'),
            'tipe_memory'    => $this->request->getVar('tipe_memory'),
            'kc_id'    => $this->request->getVar('kc_id'),
            'kcp_id'    => $this->request->getVar('kcp_id'),
            'user_log'    => $this->request->getVar('user_log'),
        ]);

        session()->setFlashdata('pesan', 'Data pc outlet baru berhasil ditambahkan');

        return redirect()->to('pcbranch');
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

            $kc_id = $row[0];
            $kcp_id = $row[1];
            $kode_aset = $row[2];
            $serial_number = $row[3];
            $ip_address = $row[4];
            $hostname = $row[5];
            $merek = $row[6];
            $tipe = $row[7];
            $os_id = $row[8];
            $processor = $row[9];
            $disk = $row[10];
            $tipe_disk = $row[11];
            $memory = $row[12];
            $tipe_memory = $row[13];

            $db = \Config\Database::connect();

            $cek_kode_aset = $db->table('pc_branch')->getWhere(['kode_aset' => $kode_aset])->getResult();

            if (count($cek_kode_aset) > 0) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, kode aset sudah ada</b>');
            }
            if (($kc_id == null) || ($kode_aset == null) || ($serial_number == null) || ($ip_address == null) || ($hostname == null) || ($merek == null) || ($tipe == null) || ($os_id == null) || ($processor == null) || ($disk == null) || ($tipe_disk == null) || ($memory == null) || ($tipe_memory == null)) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, kolom pada file import excel tidak boleh kosong</b>');
            } else {
                $this->PcBranchModel->save([
                    'kc_id' => $kc_id,
                    'kcp_id' => $kcp_id,
                    'kode_aset' => $kode_aset,
                    'serial_number' => $serial_number,
                    'ip_address' => $ip_address,
                    'hostname' => $hostname,
                    'merek' => $merek,
                    'tipe' => $tipe,
                    'os_id' => $os_id,
                    'disk' => $disk,
                    'tipe_disk' => $tipe_disk,
                    'memory' => $memory,
                    'tipe_memory' => $tipe_memory,
                    'processor' => $processor,
                    'user_log' => $this->request->getVar('user_log'),
                ]);
                session()->setFlashdata('message', 'Berhasil import excel data pc cabang');
            }
        }

        return redirect()->to('/pcbranch');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit PC Cabang',
            'menu' => 'PC Branch',
            'validation' => \Config\Services::validation(),
            'pc_branch' => $this->PcBranchModel->getPcBranch($id),
            'kc' => $this->KantorCabangModel->getKantorCabang(),
            'kcp' => $this->KantorCabangPembantuModel->getKantorCabangPembantu(),
            'os' => $this->OsModel->getOs()
        ];

        return view('pc_branch/edit', $data);
    }

    public function update($id)
    {
        //Validation
        $kodeAsetLama = $this->PcBranchModel->getPcBranch($id);
        if ($kodeAsetLama['kode_aset'] == $this->request->getVar('kode_aset')) {
            $rule_unique_aset = 'required';
        } else {
            $rule_unique_aset = 'required|is_unique[pc_branch.kode_aset]';
        }

        if (!$this->validate([
            'kode_aset'     => $rule_unique_aset,
            'serial_number'     => 'required',
            'ip_address'     => 'required',
            'hostname'     => 'required',
            'merek'     => 'required',
            'tipe'     => 'required',
            'os_id'     => 'required',
            'processor'     => 'required',
            'disk'     => 'required',
            'tipe_disk'     => 'required',
            'memory'     => 'required',
            'tipe_memory'     => 'required',
            'kc_id'     => 'required',
        ])) {
            return redirect()->to('pcbranch/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->PcBranchModel->save([
            'id' => $id,
            'kode_aset'    => $this->request->getVar('kode_aset'),
            'serial_number'    => $this->request->getVar('serial_number'),
            'ip_address'    => $this->request->getVar('ip_address'),
            'hostname'    => $this->request->getVar('hostname'),
            'merek'    => $this->request->getVar('merek'),
            'tipe'    => $this->request->getVar('tipe'),
            'os_id'    => $this->request->getVar('os_id'),
            'processor'    => $this->request->getVar('processor'),
            'disk'    => $this->request->getVar('disk'),
            'tipe_disk'    => $this->request->getVar('tipe_disk'),
            'memory'    => $this->request->getVar('memory'),
            'tipe_memory'    => $this->request->getVar('tipe_memory'),
            'kc_id'    => $this->request->getVar('kc_id'),
            'kcp_id'    => $this->request->getVar('kcp_id'),
            'user_log'    => $this->request->getVar('user_log'),
        ]);

        session()->setFlashdata('pesan', 'Data PC Cabang berhasil diedit');

        return redirect()->to('pcbranch');
    }

    public function delete($id)
    {
        $this->PcBranchModel->delete($id);
        session()->setFlashdata('pesan', 'Data PC Cabang berhasil dihapus');
        return redirect()->to('pcbranch');
    }
}
