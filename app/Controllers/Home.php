<?php

namespace App\Controllers;

use App\Models\ServerFisikModel;
use App\Models\VirtualMachineModel;

class Home extends BaseController
{
    protected $ServerFisikModel, $VirtualMachineModel;

    public function __construct()
    {
        $this->ServerFisikModel = new ServerFisikModel();
        $this->VirtualMachineModel = new VirtualMachineModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'menu' => 'home',
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

        ];

        // dd($data);
        return view('home', $data);
    }
}
