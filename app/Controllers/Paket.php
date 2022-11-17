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
                'rules' => 'required|is_unique[paket.nama_paket]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_unique' => '{field} Nama Paket Sudah Terdaftar'
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
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/png,image/jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        //mengambil gambar
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4){
            $namaGambar = 'default.jpg';
        }else{
            $fileGambar -> move('img');
            $namaGambar = $fileGambar->getName();
        }
        

        $this->paket->insert([
            'kategori' => $this->request->getVar('kategori'),
            'nama_paket' => $this->request->getVar('nama_paket'),
            'harga_paket' => $this->request->getVar('harga_paket'),
            'detail_paket' => $this->request->getVar('detail_paket'),
            'inclusion' => $this->request->getVar('inclusion'),
            'itienary' => $this->request->getVar('itienary'),
            'gambar' => $namaGambar
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
        return view('vw_paket/edit', $data);
    }

    public function update($id)
    {
        $paketLama = $this->request->getVar('judulLama');
        if ($paketLama == $this->request->getVar('nama_paket')){
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[paket.nama_paket]';
        }
        if (!$this->validate([
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nama_paket' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_unique' => '{field} Nama Paket Sudah Terdaftar'
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

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4){
            $namaGambar = $this->request->getVar('gambarLama');
        }else{
            $namaGambar = $fileGambar->getName();
            $fileGambar -> move('img', $namaGambar);
            unlink('img/' . $this->request->getVar('gambarLama'));
        }

        $this->paket->update($id, [
            'kategori' => $this->request->getVar('kategori'),
            'nama_paket' => $this->request->getVar('nama_paket'),
            'harga_paket' => $this->request->getVar('harga_paket'),
            'detail_paket' => $this->request->getVar('detail_paket'),
            'inclusion' => $this->request->getVar('inclusion'),
            'itienary' => $this->request->getVar('itienary'),
            'gambar' => $namaGambar
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
        
        if ($dataPaket['gambar'] != 'default.jpg'){
            unlink('img/' . $dataPaket['gambar']);
        }
        
        $this->paket->delete($id);
        session()->setFlashdata('message', 'Delete Data Paket Berhasil');
        return redirect()->to('/data/paket');
    }
}
