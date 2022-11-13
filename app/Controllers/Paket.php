<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\AdminModel;

class Paket extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->admin = new AdminModel();
        $this->paket = new PaketModel();
    }

    public function index()
    {
        $data['admin'] = $this->admin->getAdmin(session()->get('username'));
        $data['paket'] = $this->paket->findAll();
        return view('vw_paket/paket', $data);
    }

    public function cetak()
    {

        $data['paket'] = $this->paket->findAll();
        return view('vw_paket/cetak', $data);
    }

    public function create()
    {
        $data['admin'] = $this->admin->getAdmin(session()->get('username'));
        return view('vw_paket/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nama_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'harga_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'detail_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'inclusion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'itienary' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->paket->insert([
            'kategori' => $this->request->getVar('kategori'),
            'nama_paket' => $this->request->getVar('nama_paket'),
            'harga_paket' => $this->request->getVar('harga_paket'),
            'detail_paket' => $this->request->getVar('detail_paket'),
            'inclusion' => $this->request->getVar('inclusion'),
            'itienary' => $this->request->getVar('itienary'),
            'gambar' => $this->request->getVar('gambar'),
        ]);

        session()->setFlashdata('message', 'Tambah Data Paket Berhasil');
        return redirect()->to('/data/paket');
    }

    public function edit($id)
    {
        $dataPaket = $this->paket->find($id);
        if (empty($dataPaket)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Paket Tidak ditemukan !');
        }
        $data['admin'] = $this->admin->getAdmin(session()->get('username'));
        $data['paket'] = $dataPaket;
        return view('/paket/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nama_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'harga_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'detail_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'inclusion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'itienary' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'gambar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $this->paket->update($id, [
            'kategori' => $this->request->getVar('kategori'),
            'nama_paket' => $this->request->getVar('nama_paket'),
            'harga_paket' => $this->request->getVar('harga_paket'),
            'detail_paket' => $this->request->getVar('detail_paket'),
            'inclusion' => $this->request->getVar('inclusion'),
            'itienary' => $this->request->getVar('itienary'),
            'gambar' => $this->request->getVar('gambar'),
        ]);

        session()->setFlashdata('message', 'Update Data Paket Berhasil');
        return redirect()->to('/data/paket');
    }

    function delete($id)
    {
        $dataPaket = $this->paket->find($id);
        if (empty($dataPaket)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data paket tidak ditemukan !');
        }

        $this->paket->delete($id);
        session()->setFlashdata('message', 'Delete Data Paket Berhasil');
        return redirect()->to('/data/paket');
    }
}
