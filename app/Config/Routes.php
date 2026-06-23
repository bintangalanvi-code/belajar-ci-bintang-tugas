<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ========================================================
// 1. RUTE PUBLIK (Bisa diakses siapa saja tanpa login)
// ========================================================
$routes->get('/', 'Home::index');
$routes->get('harga', 'Home::harga');

// Rute Ekstra (Bawaan project Anda)
$routes->get('/produk', 'ProdukController::index');
$routes->get('/keranjang', 'TransaksiController::index');

// Rute Pelanggan Bikin Pesanan (Publik)
$routes->get('pesanan/tambah', 'Pesanan::tambah');
$routes->post('pesanan/simpan', 'Pesanan::simpan');
$routes->get('pesanan/sukses', 'Pesanan::sukses');

// Rute Autentikasi / Login
$routes->get('login', 'Auth::index');
$routes->post('login/proses', 'Auth::proses');
$routes->get('logout', 'Auth::logout');


// ========================================================
// 2. RUTE ADMIN (Wajib Login - Dilindungi Filter 'auth')
// ========================================================
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    
    // Fitur Kelola Layanan
    $routes->get('layanan', 'Layanan::index');
    $routes->get('layanan/tambah', 'Layanan::tambah');
    $routes->post('layanan/simpan', 'Layanan::simpan');
    $routes->get('layanan/ubah/(:num)', 'Layanan::ubah/$1');
    $routes->post('layanan/update/(:num)', 'Layanan::update/$1');
    $routes->get('layanan/hapus/(:num)', 'Layanan::hapus/$1');

    // Fitur Manajemen Data Pesanan (Tabel Admin)
    $routes->get('pesanan', 'Pesanan::index');
    $routes->get('pesanan/ubah/(:num)', 'Pesanan::ubah/$1');
    $routes->post('pesanan/update/(:num)', 'Pesanan::update/$1');
    $routes->get('pesanan/hapus/(:num)', 'Pesanan::hapus/$1');
    
});