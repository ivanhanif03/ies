<?php

namespace App\Controllers;

use App\Models\CloudModel;
use App\Models\ServerFisikModel;
use App\Models\VirtualMachineModel;

class Home extends BaseController
{
    protected $ServerFisikModel, $VirtualMachineModel, $CloudModel;

    public function __construct()
    {
        $this->ServerFisikModel = new ServerFisikModel();
        $this->VirtualMachineModel = new VirtualMachineModel();
        $this->CloudModel = new CloudModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Kantor Cabang',
            'menu' => 'KC',
        ];

        return view('home/home', $data);
    }

    public function ies()
    {
        $data = [
            'title' => 'Home IES',
            'menu' => 'home_ies',
            'fisik_sentul' => $this->ServerFisikModel->getTotalServerFisikSentul(),
            'fisik_surabaya' => $this->ServerFisikModel->getTotalServerFisikSurabaya(),
            'fisik_oc' => $this->ServerFisikModel->getTotalServerFisikOc(),
            'vm_sentul' => $this->VirtualMachineModel->getTotalVmSentul(),
            'vm_surabaya' => $this->VirtualMachineModel->getTotalVmSurabaya(),
            'vm_oc' => $this->VirtualMachineModel->getTotalVmOc(),
            'total_app_fisik' => $this->ServerFisikModel->getTotalAppFisik(),
            'total_jenis_app' => $this->ServerFisikModel->getTotalJenisAppFisik(),
            'total_jenis_web' => $this->ServerFisikModel->getTotalJenisWebFisik(),
            'total_jenis_db' => $this->ServerFisikModel->getTotalJenisDbFisik(),
            'total_jenis_mngmt' => $this->ServerFisikModel->getTotalJenisMngmtFisik(),
            'total_jenis_dmz' => $this->ServerFisikModel->getTotalJenisDmzFisik(),
            'total_jenis_dev' => $this->ServerFisikModel->getTotalJenisDevFisik(),
            'total_jenis_app_vm' => $this->VirtualMachineModel->getTotalJenisAppVm(),
            'total_jenis_web_vm' => $this->VirtualMachineModel->getTotalJenisWebVm(),
            'total_jenis_db_vm' => $this->VirtualMachineModel->getTotalJenisDbVm(),
            'total_jenis_mngmt_vm' => $this->VirtualMachineModel->getTotalJenisMngmtVm(),
            'total_jenis_dmz_vm' => $this->VirtualMachineModel->getTotalJenisDmzVm(),
            'total_jenis_dev_vm' => $this->VirtualMachineModel->getTotalJenisDevVm(),
            'aplikasi_terbaru' => $this->ServerFisikModel->getAplikasiTerbaru(),
            'server_fisik_terbaru' => $this->ServerFisikModel->getServerFisikTerbaru(),
            'vm_terbaru' => $this->VirtualMachineModel->getVmTerbaru(),
            'total_cloud' => $this->CloudModel->getTotalCloud(),
            'cloud_terbaru' => $this->CloudModel->getCloudTerbaru(),
        ];

        // dd($data);
        return view('home/ies', $data);
    }

    public function nop()
    {
        $data = [
            'title' => 'Home NOP',
            'menu' => 'home_nop',
            'fisik_sentul' => $this->ServerFisikModel->getTotalServerFisikSentul(),
            'fisik_surabaya' => $this->ServerFisikModel->getTotalServerFisikSurabaya(),
            'fisik_oc' => $this->ServerFisikModel->getTotalServerFisikOc(),
            'vm_sentul' => $this->VirtualMachineModel->getTotalVmSentul(),
            'vm_surabaya' => $this->VirtualMachineModel->getTotalVmSurabaya(),
            'vm_oc' => $this->VirtualMachineModel->getTotalVmOc(),
            'total_app_fisik' => $this->ServerFisikModel->getTotalAppFisik(),
            'total_jenis_app' => $this->ServerFisikModel->getTotalJenisAppFisik(),
            'total_jenis_web' => $this->ServerFisikModel->getTotalJenisWebFisik(),
            'total_jenis_db' => $this->ServerFisikModel->getTotalJenisDbFisik(),
            'total_jenis_mngmt' => $this->ServerFisikModel->getTotalJenisMngmtFisik(),
            'total_jenis_dmz' => $this->ServerFisikModel->getTotalJenisDmzFisik(),
            'total_jenis_dev' => $this->ServerFisikModel->getTotalJenisDevFisik(),
            'total_jenis_app_vm' => $this->VirtualMachineModel->getTotalJenisAppVm(),
            'total_jenis_web_vm' => $this->VirtualMachineModel->getTotalJenisWebVm(),
            'total_jenis_db_vm' => $this->VirtualMachineModel->getTotalJenisDbVm(),
            'total_jenis_mngmt_vm' => $this->VirtualMachineModel->getTotalJenisMngmtVm(),
            'total_jenis_dmz_vm' => $this->VirtualMachineModel->getTotalJenisDmzVm(),
            'total_jenis_dev_vm' => $this->VirtualMachineModel->getTotalJenisDevVm(),
            'aplikasi_terbaru' => $this->ServerFisikModel->getAplikasiTerbaru(),
            'server_fisik_terbaru' => $this->ServerFisikModel->getServerFisikTerbaru(),
            'vm_terbaru' => $this->VirtualMachineModel->getVmTerbaru(),
            'total_cloud' => $this->CloudModel->getTotalCloud(),
            'cloud_terbaru' => $this->CloudModel->getCloudTerbaru(),
        ];

        // dd($data);
        return view('home/nop', $data);
    }
}
