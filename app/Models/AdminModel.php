<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $returnType = 'object';
    protected $allowedFields = ["username", "password"];
    protected $useTimestamps = false;

    public function getAdmin($username)
    {
        return $this->where(['username' => $username])->asObject()->first();
    }
}
