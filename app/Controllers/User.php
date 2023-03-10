<?php

namespace App\Controllers;

use App\Models\GroupsModel;
use App\Models\RoleModel;
use App\Models\UsersModel;

class User extends BaseController
{
    protected $UsersModel, $RolesModel, $GroupsModel;

    public function __construct()
    {
        $this->UsersModel = new UsersModel();
        $this->RolesModel = new RoleModel();
        $this->GroupsModel = new GroupsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'User List',
            'menu' => 'users',
            'validation' => \Config\Services::validation(),
            'users' => $this->UsersModel->getUser()
        ];

        return view('user/index', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'User Register',
            'menu' => 'users',
        ];

        return view('auth/register', $data);
    }

    public function role($id)
    {
        $data = [
            'title' => 'Role Edit',
            'menu' => 'role',
            'role' => $this->RolesModel->getRole($id),
            'group' => $this->GroupsModel->findAll()
        ];

        return view('user/role', $data);
    }

    public function updateRole($id)
    {
        $this->RolesModel->save([
            'user_id' => $id,
            'group_id' => $this->request->getVar('role'),
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/user');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'User Edit',
            'menu' => 'users',
            'validation' => \Config\Services::validation(),
            'user' => $this->UsersModel->getUser($id)
        ];

        return view('user/edit', $data);
    }

    public function update($id)
    {
        //Validation
        if (!$this->validate([
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]',
            'email'    => 'required|valid_email',
            'name'     => 'required',
            'phone'    => 'required|min_length[9]|max_length[13]',
        ])) {
            return redirect()->to('/user/edit')->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->UsersModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'name' => $this->request->getVar('name'),
            'phone' => $this->request->getVar('phone'),
        ]);

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('/user');
    }

    public function delete($id)
    {
        $this->UsersModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('user/index');
    }
}
