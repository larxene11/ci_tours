<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\PesananModel;
use App\Models\PaketModel;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->session = session();
        $this->paket = new PaketModel();
        $this->pesanan = new PesananModel();
        $this->admin = new AdminModel();
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

        //cek role dari session
        if ($this->session->get('role') != 1) {
            return redirect()->to('/pegawai');
        }
        $data['customer'] = $this->customer->asObject()->findAll();
        $data['pesanan'] = $this->pesanan->asObject()->getAll();
        $data['obat'] = $this->obat->asObject()->findAll();
        $data['pegawai'] = $this->pegawai->asObject()->findAll();
        $data['user'] = $this->userModel->getAdmin(session()->get('username'));
        return view('admin/dashboard', $data);
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }
}
