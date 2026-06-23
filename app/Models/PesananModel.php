<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table            = 'pesanan';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_pelanggan', 'no_hp', 'layanan_id', 'berat', 'total_harga', 'status'];
    protected $useTimestamps    = true;

    // Fungsi untuk mengambil data pesanan beserta nama layanannya
    public function getPesanan($id = false)
    {
        if ($id === false) {
            return $this->select('pesanan.*, layanan.nama_layanan, layanan.harga')
                        ->join('layanan', 'layanan.id = pesanan.layanan_id')
                        ->orderBy('pesanan.id', 'DESC')
                        ->findAll();
        }

        return $this->select('pesanan.*, layanan.nama_layanan, layanan.harga')
                    ->join('layanan', 'layanan.id = pesanan.layanan_id')
                    ->where('pesanan.id', $id)
                    ->first();
    }
}