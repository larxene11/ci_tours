<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_kategori', 'detail_kategori', 'gambar_kategori'];
}
