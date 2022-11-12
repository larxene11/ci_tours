<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table = 'tempat';
    protected $primaryKey = 'id_tempat';
    protected $returnType = 'object';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_tempat', 'detail_tempat', 'gambar'];
}
