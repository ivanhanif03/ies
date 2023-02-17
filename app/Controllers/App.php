<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AppModel;

class App extends BaseController
{
    protected $AppModel;

    public function __construct()
    {
        $this->AppModel = new AppModel();
    }

    public function index()
    {
        $data = [
            'title' => 'App List',
            'menu' => 'apps',
            'validation' => \Config\Services::validation(),
            'app' => $this->AppModel->getApp()
        ];

        return view('apps/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah App',
            'menu' => 'apps',
            'validation' => \Config\Services::validation(),
            'app' => $this->AppModel->getApp()
        ];

        return view('apps/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'nama_app'     => 'required',
            'pic'     => 'required',
            'no_hp_pic'    => 'required|min_length[9]|max_length[13]',
        ])) {
            return redirect()->to('/apps/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->AppModel->save([
            'nama_app'    => $this->request->getVar('nama_app'),
            'pic'   => $this->request->getVar('pic'),
            'no_hp_pic' => $this->request->getVar('no_hp_pic'),
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/apps');
    }

    public function delete($id)
    {
        $this->AppModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('/apps');
    }
}
