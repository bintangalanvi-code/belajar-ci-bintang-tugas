<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
    protected $table            = 'layanan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_layanan', 'harga', 'estimasi_waktu', 'deskripsi'];
    
    // Aktifkan pencatatan waktu otomatis
    protected $useTimestamps    = true;
}