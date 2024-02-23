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

    public function indexx()
    {
        $os = $this->UsersModel->getTotalUserOs();
        $array_os = json_decode(json_encode($os), false);
        $app = $this->UsersModel->getTotalUserApp();
        $array_app = json_decode(json_encode($app), false);

        // dd($array_os);
        $sum_os = array_column($array_os, 'total_log', 'user_log');
        $sum_app = array_column($array_app, 'total_log', 'user_log');

        foreach ([$sum_os, $sum_app] as $a) {
            foreach ($a as $key => $value) {
                $merged[$key] = $value + (isset($merged[$key]) ? $merged[$key] : 0);
            }
        }

        $rank = array($merged);

        $data = [
            'title' => 'User List',
            'menu' => 'users',
            'validation' => \Config\Services::validation(),
            'users' => $this->UsersModel->getUser(),
            'sum_os' => $this->UsersModel->getTotalUserOs(),
            'sum_app' => $this->UsersModel->getTotalUserApp(),
            'merged' => $rank
        ];

        // dd($data);
        return view('user/index', $data);
    }

    public function index()
    {
        $data = [
            'title' => 'User List',
            'menu' => 'users',
            'validation' => \Config\Services::validation(),
        ];

        return view('user/index', $data);
    }

    public function listdata()
    {
        $request = \Config\Services::request();
        $list_data = $this->UsersModel;
        $where = ['id !=' => 0];
        //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
        //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
        $column_order = array(NULL, 'users.email', 'users.username', 'users.name', 'users.phone');
        $column_search = array('users.email', 'users.username', 'users.name', 'users.phone');
        $order = array('users.email' => 'asc');
        $list = $list_data->get_datatables('users', $column_order, $column_search, $order, $where);
        $data = array();
        $no = $request->getPost("start");
        foreach ($list as $lists) {
            $no++;
            $row    = array();
            $row[] = $no;
            $row[] = $lists->email;
            $row[] = $lists->username;
            $row[] = $lists->name;
            $row[] = $lists->phone;
            $data[] = $row;
        }
        $output = array(
            "draw" => $request->getPost("draw"),
            "recordsTotal" => $list_data->count_all('users', $where),
            "recordsFiltered" => $list_data->count_filtered('users', $column_order, $column_search, $order, $where),
            "data" => $data,
        );

        return json_encode($output);
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

        // dd($data);

        return view('user/role', $data);
    }

    public function updateRole($id)
    {
        $this->RolesModel->save([
            'user_id' => $id,
            'group_id' => $this->request->getVar('role'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diupdate');

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
            return redirect()->to('/user/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->UsersModel->save([
            'id' => $id,
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'name' => $this->request->getVar('name'),
            'phone' => $this->request->getVar('phone'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diupdate');

        return redirect()->to('/user');
    }

    public function delete($id)
    {
        $this->UsersModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('user/index');
    }

    public function aktif($id)
    {
        $active = 1;

        $this->UsersModel->save([
            'id' => $id,
            'active' => $active
        ]);

        session()->setFlashdata('pesan', 'User berhasil diaktifkan');

        return redirect()->to('/user');
    }

    public function nonaktif($id)
    {
        $nonactive = 0;

        $this->UsersModel->save([
            'id' => $id,
            'active' => $nonactive
        ]);

        session()->setFlashdata('pesan', 'User berhasil dinonaktifkan');

        return redirect()->to('/user');
    }
}
