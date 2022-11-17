<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table = 'paket';
    protected $primaryKey = 'id_paket';
    protected $useTimestamps = false;
    protected $allowedFields = ['kategori', 'nama_paket', 'detail_paket', 'harga_paket', 'inclusion', 'itienary', 'gambar'];
}
