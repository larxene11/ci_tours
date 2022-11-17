<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table = 'paket';
    protected $primaryKey = 'id_paket';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_kategori', 'nama_paket', 'detail_paket', 'harga_paket', 'inclusion', 'itienary', 'gambar'];

    function getAll()
    {
        $builder = $this->db->table('paket');
        $builder->join('kategori', 'kategori.id_kategori = paket.id_kategori');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
