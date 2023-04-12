<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServerBranchModel;

class ServerBranch extends BaseController
{
    protected $ServerBranchModel;

    public function __construct()
    {
        $this->ServerBranchModel = new ServerBranchModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List Server Cabang',
            'menu' => 'server_cabang',
            'validation' => \Config\Services::validation(),
            'os' => $this->ServerBranchModel->getOs()
        ];

        return view('ruang_server/server/index', $data);
    }
}
