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
        $data['judul'] = 'Bali Tours | Kategori';
        $data['menu'] = [
            'dashboard' => '',
            'kategori' => 'active-nav-link',
            'paket' => '',
            'pesanan' => '',
            'kalender' => ''
        ];
        $data['admin'] = $this->admin->getAdmin(session()->get('username'));
        $data['kategori'] = $this->kategori->findAll();
        return view('vw_kategori/kategori', $data);
    }


    public function create()
    {
        $data['judul'] = 'Bali Tours | Tambah Data Kategori';
        $data['menu'] = [
            'dashboard' => '',
            'kategori' => 'active-nav-link',
            'paket' => '',
            'pesanan' => '',
            'kalender' => ''
        ];
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
            'detail_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            // 'gambar_kategori' => [
            //     'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/png,image/jpeg]',
            //     'errors' => [
            //         'max_size' => 'Ukuran gambar terlalu besar',
            //         'is_image' => 'Yang anda pilih bukan gambar',
            //         'mime_in' => 'Yang anda pilih bukan gambar'
            //     ]
            // ],
            
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        // //mengambil gambar
        // $fileGambar = $this->request->getFile('gambar_kategori');
        // if ($fileGambar->getError() == 4){
        //     $namaGambar = 'default.jpg';
        // }else{
        //     $fileGambar -> move('img');
        //     $namaGambar = $fileGambar->getName();
        // }
        $this->kategori->insert([
            'nama_kategori' => $this->request->getVar('nama_kategori'),
            'detail_kategori' => $this->request->getVar('detail_kategori'),
            // 'gambar_kategori' => $namaGambar
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
        $data['judul'] = 'Bali Tours | Edit Data Kategori';
        $data['menu'] = [
            'dashboard' => '',
            'kategori' => 'active-nav-link',
            'paket' => '',
            'pesanan' => '',
            'kalender' => ''
        ];
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
            ],
            'detail_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'gambar_kategori' => [
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }
        
        $fileGambar = $this->request->getFile('gambar_kategori');
        if ($fileGambar->getError() == 4){
            $namaGambar = $this->request->getVar('gambarLama');
        }else{
            $namaGambar = $fileGambar->getName();
            $fileGambar -> move('img', $namaGambar);
            unlink('img/' . $this->request->getVar('gambarLama'));
        }

        $this->kategori->update($id, [
            'nama_kategori' => $this->request->getVar('nama_kategori'),
            'detail_kategori' => $this->request->getVar('detail_kategori'),
            'gambar_kategori' => $namaGambar
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
