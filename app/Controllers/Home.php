<?php

namespace App\Controllers;

use App\Models\LayananModel; // Panggil model layanan di sini

class Home extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Space Laundry | Home'];
        return view('v_home', $data);
    }

    public function layanan()
    {
        // Jika Anda ingin membuat halaman publik untuk layanan, kodenya bisa ditaruh di sini nanti
        $data = ['title' => 'Layanan Kami | Space Laundry'];
        return view('v_layanan', $data);
    }

    public function harga()
    {
        // 1. Inisialisasi model
        $layananModel = new LayananModel();

        // 2. Ambil semua data dari tabel layanan
        $data = [
            'title'        => 'Daftar Harga | Space Laundry',
            'daftar_harga' => $layananModel->findAll()
        ];

        // 3. Kirim data ke view v_harga
        return view('v_harga', $data);
    }
}