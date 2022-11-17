<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\AdminModel;


class Kategori extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->admin = new AdminModel();
        $this->kategori = new KategoriModel();
    }

    public function index()
    {
        $data['admin'] = $this->admin->getAdmin(session()->get('username'));
        $data['kategori'] = $this->kategori->findAll();
        return view('vw_kategori/kategori', $data);
    }


    public function create()
    {
        $data['admin'] = $this->admin->getAdmin(session()->get('username'));
        return view('vw_kategori/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->kategori->insert([
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);

        session()->setFlashdata('message', 'Tambah Data Kategori Berhasil');
        return redirect()->to('/data/kategori');
    }

    public function edit($id)
    {
        $dataKategori = $this->kategori->find($id);
        if (empty($dataKategori)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kategori Tidak ditemukan !');
        }
        $data['admin'] = $this->admin->getAdmin(session()->get('username'));
        $data['kategori'] = $dataKategori;;
        return view('vw_kategori/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $this->kategori->update($id, [
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);

        session()->setFlashdata('message', 'Update Data Kategori Berhasil');
        return redirect()->to('/data/kategori');
    }

    function delete($id)
    {
        $dataKategori = $this->kategori->find($id);
        if (empty($dataKategori)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Kategori Tidak ditemukan !');
        }

        $this->kategori->delete($id);
        session()->setFlashdata('message', 'Delete Data Kategori Berhasil');
        return redirect()->to('/data/kategori');
    }
}
