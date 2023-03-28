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
        ];

        // dd($data);
        return view('home', $data);
    }
}
