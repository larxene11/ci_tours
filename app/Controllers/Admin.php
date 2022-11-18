<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\PesananModel;
use App\Models\PaketModel;
use App\Models\KategoriModel;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->session = session();
        $this->paket = new PaketModel();
        $this->pesanan = new PesananModel();
        $this->admin = new AdminModel();
        $this->kategori = new KategoriModel();
    }

    public function profil()
    {
        return view('admin/profil');
    }

    public function index()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/auth/login');
        }
        $data['judul'] = 'Bali Tours | Dashboard';
        $data['menu'] = [
            'dashboard' => 'active-nav-link',
            'kategori' => '',
            'paket' => '',
            'pesanan' => '',
            'kalender' => ''
        ];
        $data['paket'] = $this->paket->asObject()->getAll();
        $data['pesanan'] = $this->pesanan->asObject()->getAll();
        $data['kategori'] = $this->kategori->asObject()->findAll();
        $data['admin'] = $this->admin->getAdmin(session()->get('username'));
        return view('admin/dashboard', $data);
    }
    
    public function kalender()
    {
        $data['judul'] = 'Bali Tours | Kalender';
        $data['menu'] = [
            'dashboard' => '',
            'kategori' => '',
            'paket' => '',
            'pesanan' => '',
            'kalender' => 'active-nav-link'
        ];
        $data['admin'] = $this->admin->getAdmin(session()->get('username'));
        return view('admin/kalender', $data);
    }
}
