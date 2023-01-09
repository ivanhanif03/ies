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
            'orders' => $this->AppModel->getApp()
        ];

        return view('apps/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create New Order',
            'menu' => 'orders',
            'validation' => \Config\Services::validation(),
            'user' => $this->AppModel->getOrder()
        ];

        return view('order/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'name'     => 'required',
            'phone'    => 'required|min_length[9]|max_length[13]',
            'address'  => 'required',
        ])) {
            return redirect()->to('/user/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->AppModel->save([
            'name'    => $this->request->getVar('name'),
            'phone'   => $this->request->getVar('phone'),
            'address' => $this->request->getVar('username'),
            'package' => $this->request->getVar('email'),
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/order');
    }

    public function delete($id)
    {
        $this->AppModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('order/index');
    }
}
