<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KantorCabangModel;
use App\Models\KantorCabangPembantuModel;
use App\Models\KontrakModel;
use App\Models\OsModel;
use App\Models\ServerBranchModel;

use function PHPUnit\Framework\throwException;

class ServerBranch extends BaseController
{
    protected $ServerBranchModel, $KontrakModel, $OsModel, $KantorCabangModel, $KantorCabangPembantuModel;

    public function __construct()
    {
        $this->ServerBranchModel = new ServerBranchModel();
        $this->KontrakModel = new KontrakModel();
        $this->OsModel = new OsModel();
        $this->KantorCabangModel = new KantorCabangModel();
        $this->KantorCabangPembantuModel = new KantorCabangPembantuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Server Kantor Cabang',
            'menu' => 'branch',
            'validation' => \Config\Services::validation(),
            'branch' => $this->ServerBranchModel->getAll()
        ];

        return view('ruang_server/server/index', $data);
    }


    public function detail($id)
    {
        $data = [
            'title' => 'Detail Server Branch',
            'menu' => 'branch',
            'branch' => $this->ServerBranchModel->getOneServerBranch($id),
        ];

        return view('ruang_server/server/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Server Branch',
            'menu' => 'branch',
            'validation' => \Config\Services::validation(),
            'branch' => $this->ServerBranchModel->getServerBranch(),
            'kontrak' => $this->KontrakModel->getKontrak(),
            'kc' => $this->KantorCabangModel->getKantorCabang(),
            'kcp' => $this->KantorCabangPembantuModel->getKantorCabangPembantu(),
            'os' => $this->OsModel->getOs()
        ];

        // dd($data);

        return view('ruang_server/server/create', $data);
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
            'kode_aset'     => 'required|is_unique[server_branch.kode_aset]',
            'serial_number'     => 'required',
            'ip_address_data'     => 'required',
            'ip_address_management'     => 'required',
            'hostname'     => 'required',
            'kontrak_id'     => 'required',
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
            return redirect()->to('serverbranch/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->ServerBranchModel->save([
            'kode_aset'    => $this->request->getVar('kode_aset'),
            'serial_number'    => $this->request->getVar('serial_number'),
            'ip_address_data'    => $this->request->getVar('ip_address_data'),
            'ip_address_management'    => $this->request->getVar('ip_address_management'),
            'hostname'    => $this->request->getVar('hostname'),
            'merek'    => $this->request->getVar('merek'),
            'tipe'    => $this->request->getVar('tipe'),
            'os_id'    => $this->request->getVar('os_id'),
            'processor'    => $this->request->getVar('processor'),
            'disk'    => $this->request->getVar('disk'),
            'tipe_disk'    => $this->request->getVar('tipe_disk'),
            'memory'    => $this->request->getVar('memory'),
            'tipe_memory'    => $this->request->getVar('tipe_memory'),
            'kontrak_id'    => $this->request->getVar('kontrak_id'),
            'kc_id'    => $this->request->getVar('kc_id'),
            'kcp_id'    => $this->request->getVar('kcp_id'),
            'user_log'    => $this->request->getVar('user_log'),
        ]);

        session()->setFlashdata('pesan', 'Data server outlet bary berhasil ditambahkan');

        return redirect()->to('serverbranch');
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
            $ip_address_data = $row[4];
            $ip_address_management = $row[5];
            $hostname = $row[6];
            $merek = $row[7];
            $tipe = $row[8];
            $os_id = $row[9];
            $processor = $row[10];
            $disk = $row[11];
            $tipe_disk = $row[12];
            $memory = $row[13];
            $tipe_memory = $row[14];
            $kontrak_id = $row[15];

            $db = \Config\Database::connect();

            $cek_kode_aset = $db->table('server_branch')->getWhere(['kode_aset' => $kode_aset])->getResult();

            if (count($cek_kode_aset) > 0) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, kode aset sudah ada</b>');
            }
            if (($kc_id == null) || ($kode_aset == null) || ($serial_number == null) || ($ip_address_data == null) || ($ip_address_management == null) || ($hostname == null) || ($merek == null) || ($tipe == null) || ($os_id == null) || ($processor == null) || ($disk == null) || ($tipe_disk == null) || ($memory == null) || ($tipe_memory == null) || ($kontrak_id == null)) {
                session()->setFlashdata('message', '<b class="text-danger bg-white p-2 rounded-lg">Data gagal diimport, kolom pada file import excel tidak boleh kosong</b>');
            } else {
                $this->ServerBranchModel->save([
                    'kc_id' => $kc_id,
                    'kcp_id' => $kcp_id,
                    'kode_aset' => $kode_aset,
                    'serial_number' => $serial_number,
                    'ip_address_data' => $ip_address_data,
                    'ip_address_management' => $ip_address_management,
                    'hostname' => $hostname,
                    'merek' => $merek,
                    'tipe' => $tipe,
                    'os_id' => $os_id,
                    'disk' => $disk,
                    'tipe_disk' => $tipe_disk,
                    'memory' => $memory,
                    'tipe_memory' => $tipe_memory,
                    'processor' => $processor,
                    'kontrak_id' => $kontrak_id,
                    'user_log' => $this->request->getVar('user_log'),
                ]);
                session()->setFlashdata('message', 'Berhasil import excel data server cabang');
            }
        }

        return redirect()->to('/serverbranch');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Server Branch',
            'menu' => 'branch',
            'validation' => \Config\Services::validation(),
            'branch' => $this->ServerBranchModel->getServerBranch($id),
            'kontrak' => $this->KontrakModel->getKontrak(),
            'kc' => $this->KantorCabangModel->getKantorCabang(),
            'kcp' => $this->KantorCabangPembantuModel->getKantorCabangPembantu(),
            'os' => $this->OsModel->getOs()
        ];

        return view('ruang_server/server/edit', $data);
    }

    public function update($id)
    {
        //Validation
        $kodeAsetLama = $this->ServerBranchModel->getServerBranch($id);
        if ($kodeAsetLama['kode_aset'] == $this->request->getVar('kode_aset')) {
            $rule_unique_aset = 'required';
        } else {
            $rule_unique_aset = 'required|is_unique[server_branch.kode_aset]';
        }

        if (!$this->validate([
            'kode_aset'     => $rule_unique_aset,
            'serial_number'     => 'required',
            'ip_address_data'     => 'required',
            'ip_address_management'     => 'required',
            'hostname'     => 'required',
            'kontrak_id'     => 'required',
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
            return redirect()->to('serverbranch/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->ServerBranchModel->save([
            'id' => $id,
            'kode_aset'    => $this->request->getVar('kode_aset'),
            'serial_number'    => $this->request->getVar('serial_number'),
            'ip_address_data'    => $this->request->getVar('ip_address_data'),
            'ip_address_management'    => $this->request->getVar('ip_address_management'),
            'hostname'    => $this->request->getVar('hostname'),
            'merek'    => $this->request->getVar('merek'),
            'tipe'    => $this->request->getVar('tipe'),
            'os_id'    => $this->request->getVar('os_id'),
            'processor'    => $this->request->getVar('processor'),
            'disk'    => $this->request->getVar('disk'),
            'tipe_disk'    => $this->request->getVar('tipe_disk'),
            'memory'    => $this->request->getVar('memory'),
            'tipe_memory'    => $this->request->getVar('tipe_memory'),
            'kontrak_id'    => $this->request->getVar('kontrak_id'),
            'kc_id'    => $this->request->getVar('kc_id'),
            'kcp_id'    => $this->request->getVar('kcp_id'),
            'user_log'    => $this->request->getVar('user_log'),
        ]);

        session()->setFlashdata('pesan', 'Data server branch berhasil diedit');

        return redirect()->to('serverbranch');
    }

    public function delete($id)
    {
        $this->ServerBranchModel->delete($id);
        session()->setFlashdata('pesan', 'Data server branch berhasil dihapus');
        return redirect()->to('serverbranch');
    }
}
