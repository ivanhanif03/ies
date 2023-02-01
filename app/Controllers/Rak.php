<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RakModel;

class Rak extends BaseController
{
    protected $RakModel;

    public function __construct()
    {
        $this->RakModel = new RakModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Rak',
            'menu' => 'rak',
            'validation' => \Config\Services::validation(),
            'rak' => $this->RakModel->getRak()
        ];

        return view('rak/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Rak',
            'menu' => 'rak',
            'rak' => $this->RakModel->getRak($id)
        ];

        return view('rak/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Rak',
            'menu' => 'rak',
            'validation' => \Config\Services::validation(),
            'rak' => $this->RakModel->getRak()
        ];

        return view('rak/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'nama_rak'     => 'required|is_unique[raks.nama_rak,id,{id}]',
            'lokasi'    => 'required',
        ])) {
            return redirect()->to('rak/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->RakModel->save([
            'nama_rak'    => $this->request->getVar('nama_rak'),
            'lokasi'   => $this->request->getVar('lokasi'),
        ]);

        session()->setFlashdata('pesan', 'Data rak baru berhasil ditambahkan');

        return redirect()->to('rak');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Rak',
            'menu' => 'rak',
            'validation' => \Config\Services::validation(),
            'rak' => $this->RakModel->getRak($id)
        ];

        return view('rak/edit', $data);
    }

    public function update($id)
    {
        //Validation
        if (!$this->validate([
            'nama_rak'     => 'required',
            'lokasi'    => 'required',
        ])) {
            return redirect()->to('rak/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->RakModel->save([
            'id' => $id,
            'nama_rak'    => $this->request->getVar('nama_rak'),
            'lokasi'   => $this->request->getVar('lokasi'),
        ]);

        session()->setFlashdata('pesan', 'Data rak berhasil diedit');

        return redirect()->to('rak');
    }

    public function delete($id)
    {
        $this->RakModel->delete($id);
        session()->setFlashdata('pesan', 'Data rak berhasil dihapus');
        return redirect()->to('rak');
    }
}
