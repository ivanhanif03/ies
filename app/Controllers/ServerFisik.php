<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AppModel;
use App\Models\RakModel;
use App\Models\ServerFisikModel;
use App\Models\VendorModel;

class ServerFisik extends BaseController
{
    protected $ServerFisikModel, $VendorModel, $AppModel, $RakModel;

    public function __construct()
    {
        $this->ServerFisikModel = new ServerFisikModel();
        $this->VendorModel = new VendorModel();
        $this->RakModel = new RakModel();
        $this->AppModel = new AppModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Server Fisik',
            'menu' => 'fisik',
            'validation' => \Config\Services::validation(),
            'fisik' => $this->ServerFisikModel->getAll()
        ];

        return view('server/fisik/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Server Fisik',
            'menu' => 'fisik',
            'fisik' => $this->ServerFisikModel->getOneServerFisik($id),
            // 'nama_vendor' => $this->ServerFisikModel->getNamaVendor($id),
            // 'vendor' => $this->VendorModel->getVendor()
        ];

        // dd($data);

        return view('server/fisik/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Server Fisik',
            'menu' => 'fisik',
            'validation' => \Config\Services::validation(),
            'fisik' => $this->ServerFisikModel->getServerFisik(),
            'vendor' => $this->VendorModel->getVendor()
        ];

        return view('server/fisik/create', $data);
    }

    public function save()
    {
        //Validation
        if (!$this->validate([
            'nama_server'     => 'required',
            'lisensi'    => 'required',
            'merk'  => 'required',
            'tipe'  => 'required',
            'os'  => 'required',
            'disk'  => 'required',
            'memory'  => 'required',
            'processor'  => 'required',
            'lokasi'  => 'required',
            'vendor'  => 'required',
            'sos'  => 'required',
            'eos'  => 'required',
        ])) {
            return redirect()->to('serverfisik/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->ServerFisikModel->save([
            'nama_server'    => $this->request->getVar('nama_server'),
            'lisensi'   => $this->request->getVar('lisensi'),
            'merk' => $this->request->getVar('merk'),
            'tipe' => $this->request->getVar('tipe'),
            'os' => $this->request->getVar('os'),
            'disk' => $this->request->getVar('disk'),
            'memory' => $this->request->getVar('memory'),
            'processor' => $this->request->getVar('processor'),
            'lokasi' => $this->request->getVar('lokasi'),
            'vendor_id' => $this->request->getVar('vendor'),
            'sos' => $this->request->getVar('sos'),
            'eos' => $this->request->getVar('eos'),
        ]);

        session()->setFlashdata('pesan', 'Data server fisik baru berhasil ditambahkan');

        return redirect()->to('serverfisik');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Server Fisik',
            'menu' => 'fisik',
            'validation' => \Config\Services::validation(),
            'fisik' => $this->ServerFisikModel->getServerFisik($id),
            'vendor' => $this->VendorModel->getVendor()
        ];

        return view('server/fisik/edit', $data);
    }

    public function update($id)
    {
        //Validation
        if (!$this->validate([
            'nama_server'     => 'required',
            'lisensi'    => 'required',
            'merk'  => 'required',
            'tipe'  => 'required',
            'os'  => 'required',
            'disk'  => 'required',
            'memory'  => 'required',
            'processor'  => 'required',
            'lokasi'  => 'required',
            'vendor'  => 'required',
            'sos'  => 'required',
            'eos'  => 'required',
        ])) {
            return redirect()->to('serverfisik/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->ServerFisikModel->save([
            'id' => $id,
            'nama_server'    => $this->request->getVar('nama_server'),
            'lisensi'   => $this->request->getVar('lisensi'),
            'merk' => $this->request->getVar('merk'),
            'tipe' => $this->request->getVar('tipe'),
            'os' => $this->request->getVar('os'),
            'disk' => $this->request->getVar('disk'),
            'memory' => $this->request->getVar('memory'),
            'processor' => $this->request->getVar('processor'),
            'lokasi' => $this->request->getVar('lokasi'),
            'vendor_id' => $this->request->getVar('vendor'),
            'sos' => $this->request->getVar('sos'),
            'eos' => $this->request->getVar('eos'),
        ]);

        session()->setFlashdata('pesan', 'Data server fisik berhasil diedit');

        return redirect()->to('serverfisik');
    }

    public function delete($id)
    {
        $this->ServerFisikModel->delete($id);
        session()->setFlashdata('pesan', 'Data server fisik berhasil dihapus');
        return redirect()->to('serverfisik');
    }
}
