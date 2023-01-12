<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServerFisikModel;
use App\Models\VendorModel;

class ServerFisik extends BaseController
{
    protected $ServerFisikModel, $VendorModel;

    public function __construct()
    {
        $this->ServerFisikModel = new ServerFisikModel();
        $this->VendorModel = new VendorModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Server Fisik List',
            'menu' => 'fisik',
            'validation' => \Config\Services::validation(),
            'fisik' => $this->ServerFisikModel->getAll()
        ];

        return view('server/fisik/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add New Server',
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

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('serverfisik');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Server Edit',
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

        session()->setFlashdata('pesan', 'Data updated successfully');

        return redirect()->to('serverfisik');
    }

    public function delete($id)
    {
        $this->ServerFisikModel->delete($id);
        session()->setFlashdata('pesan', 'Data deleted successfully');
        return redirect()->to('serverfisik');
    }
}
