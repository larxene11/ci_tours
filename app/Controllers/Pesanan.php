<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\AdminModel;
use App\Models\PaketModel;


class Pesanan extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        $this->admin = new AdminModel();
        $this->paket = new PaketModel();
        $this->pesanan = new PesananModel();
    }

    public function index()
    {
        $data['admin'] = $this->admin->getAdmin(session()->get('username'));
        $data['pesanan'] = $this->pesanan->getAll();
        return view('vw_pesanan/pesanan', $data);
    }

    public function cetak()
    {

        $data['pesanan'] = $this->pesanan->getAll();
        return view('vw_pesanan/cetak', $data);
    }


    public function create()
    {
        $data['admin'] = $this->admin->getAdmin(session()->get('username'));
        $data['paket'] = $this->paket->findAll();
        return view('tb_pesanan/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'id_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nama_hotel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'pesan' => [],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $this->pesanan->insert([
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'id_paket' => $this->request->getVar('id_paket'),
            'nama_hotel' => $this->request->getVar('nama_hotel'),
            'pesan' => $this->request->getVar('pesan'),
        ]);

        session()->setFlashdata('message', 'Tambah Data Pesanan Berhasil');
        return redirect()->to('/pesanan');
    }

    public function edit($id)
    {
        $dataPesanan = $this->pesanan->find($id);
        if (empty($dataPesanan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Obat Tidak ditemukan !');
        }
        $data['admin'] = $this->admin->getAdmin(session()->get('username'));
        $data['pesanan'] = $dataPesanan;
        $data['paket'] = $this->obat->findAll();
        return view('tb_pesanan/edit', $data);
    }

    public function update($id = null)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'id_paket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nama_hotel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'pesan' => [],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $this->pesanan->update($id, [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'id_paket' => $this->request->getVar('id_paket'),
            'nama_hotel' => $this->request->getVar('nama_hotel'),
            'pesan' => $this->request->getVar('pesan'),
        ]);

        session()->setFlashdata('message', 'Update Data Pesanan Berhasil');
        return redirect()->to('/pesanan');
    }

    function delete($id)
    {
        $dataPesanan = $this->pesanan->find($id);
        if (empty($dataPesanan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Pesanan Tidak ditemukan !');
        }

        $this->pesanan->delete($id);
        session()->setFlashdata('message', 'Delete Data Pesanan Berhasil');
        return redirect()->to('/pesanan');
    }
}
