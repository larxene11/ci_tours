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
        $data['paket'] = $this->paket->asObject()->findAll();
        $data['pesanan'] = $this->pesanan->asObject()->getAll();
        $data['admin'] = $this->admin->getAdmin(session()->get('username'));
        return view('admin/dashboard', $data);
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }
}
