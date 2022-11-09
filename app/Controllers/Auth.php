<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Auth extends BaseController
{
    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->admin = new AdminModel();

        //meload validation
        $this->validation = \Config\Services::validation();

        //meload session
        $this->session = \Config\Services::session();
    }

    public function index()
    {

        return redirect()->to(site_url('login'));
    }

    public function login()
    {

        return view('auth/login');
    }

    public function register()
    {
        //menampilkan halaman register
        return view('auth/register');
    }

    public function valid_register()
    {
        //tangkap data dari form 
        $data = $this->request->getPost();

        //jalankan validasi
        $this->validation->run($data, 'register');

        //cek errornya
        $errors = $this->validation->getErrors();

        //jika ada error kembalikan ke halaman register
        if ($errors) {
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('/register'));
        }

        //hash password digabung dengan salt
        $password = md5($data['password']);

        //masukan data ke database
        $this->admin->save([
            'username' => $data['username'],
            'password' => $password
        ]);

        //arahkan ke halaman login
        session()->setFlashdata('register', 'Anda berhasil mendaftar, silahkan login');
        return redirect()->to(base_url('/login'));
    }

    public function valid_login()
    {
        //ambil data dari form
        $data = $this->request->getPost();

        //ambil data user di database yang usernamenya sama 
        $admin = $this->admin->where('username', $data['username'])->first();

        //cek apakah username ditemukan
        if ($admin) {
            //cek password
            //jika salah arahkan lagi ke halaman login
            if ($admin['password'] != md5($data['password'])) {
                session()->setFlashdata('password', 'Password salah');
                return redirect()->to(site_url('/login'));
            } else {
                //jika benar, arahkan user masuk ke aplikasi 
                $sessLogin = [
                    'isLogin' => true,
                    'username' => $admin['username'],
                ];
                $this->session->set($sessLogin);
                return redirect()->to(base_url('/dashboard'));
            }
        } else {
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('username', 'Username tidak ditemukan');
            return redirect()->to(site_url('auth/login'));
        }
    }

    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        return redirect()->to(site_url('/login'));
    }
}
