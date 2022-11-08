<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $returnType = 'object';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'email', 'id_paket', 'nama_hotel', 'pesan'];

    function getAll()
    {
        $builder = $this->db->table('pesanan');
        $builder->join('paket', 'paket.id_paket = pesanan.id_paket');
        $query = $builder->get();
        return $query->getResult();
    }
}
