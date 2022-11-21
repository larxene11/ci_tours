<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\KategoriModel;
use App\Models\PesananModel;

class Home extends BaseController
{

    public function __construct()
    {
        $this->paket = new PaketModel();
        $this->kategori = new KategoriModel();
        $this->pesanan = new PesananModel();
    }

    public function index()
    {
        $data['judul'] = 'Bali Tours';
        $data['paket'] = $this->paket->getAll();
        $data['kategori'] = $this->kategori->findAll();
        // return dd($data['paket']);
        // return dd([$data['kategori'][1]['id_kategori'] == $data['paket'][2]['id_kategori']]);
        return view('user/paket', $data);

    }

    public function detail($id)
    {
        $dataPaket = $this->paket->find($id);
        $data['judul'] = 'Bali Tours | ' .  $dataPaket['nama_paket'];
        if (empty($dataPaket)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Paket Tidak ditemukan !');
        }
        $data['paket'] = $dataPaket;
        $data['kategori'] = $this->kategori->findAll();
        $data['paket2'] = $this->paket->getAll();
        return view('user/paket_detail', $data);
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
        return redirect()->to('/');
    }


    public function kategori($id)
    {
        $dataKategori = $this->kategori->find($id);
        $data['judul'] = 'Bali Tours | ' . $dataKategori['nama_kategori'];
        if (empty($dataKategori)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Paket Tidak ditemukan !');
        }
        $data['kategori2'] = $dataKategori;
        $data['paket'] = $this->paket->getAll();
        $data['kategori'] = $this->kategori->findAll();
        return view('user/kategori_detail', $data);
    }

    public function about()
    {
        $data['judul'] = 'Bali Tours | About Us';
        $data['paket'] = $this->paket->getAll();
        $data['kategori'] = $this->kategori->findAll();
        return view('user/about', $data);
    }
    public function contact()
    {
        $data['judul'] = 'Bali Tours | Contact Us';
        $data['paket'] = $this->paket->getAll();
        $data['kategori'] = $this->kategori->findAll();
        return view('user/contact', $data);
    }
    public function testimony()
    {
        $data['judul'] = 'Bali Tours | Testimony';
        $data['paket'] = $this->paket->getAll();
        $data['kategori'] = $this->kategori->findAll();
        return view('user/testimony', $data);
    }

    public function sitemap()
    {
        $data['judul'] = 'Bali Tours | Sitemap';
        $data['paket'] = $this->paket->getAll();
        $data['kategori'] = $this->kategori->findAll();
        return view('user/sitemap', $data);
    }

    public function terms()
    {
        $data['judul'] = 'Bali Tours | Terms and Conditions';
        $data['paket'] = $this->paket->getAll();
        $data['kategori'] = $this->kategori->findAll();
        return view('user/terms', $data);
    }
}
