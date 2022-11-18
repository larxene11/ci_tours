<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\KategoriModel;

class Home extends BaseController
{

    public function __construct()
    {
        $this->paket = new PaketModel();
        $this->kategori = new KategoriModel();
    }

    public function index()
    {
        $data['paket'] = $this->paket->getAll();
        $data['kategori'] = $this->kategori->findAll();
        return dd($data['kategori']);
        return view('user/paket', $data);

    }

    public function detail($id)
    {
        $dataPaket = $this->paket->find($id);
        if (empty($dataPaket)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Paket Tidak ditemukan !');
        }
        $data['paket'] = $dataPaket;
        $data['kategori'] = $this->kategori->findAll();
        return view('user/paket_detail', $data);
    }

    public function about()
    {
        return view('user/about');
    }
    public function contact()
    {
        return view('user/contact');
    }
    public function testimony()
    {
        return view('user/testimony');
    }
}
