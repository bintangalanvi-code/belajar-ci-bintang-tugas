<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\LayananModel;

class Pesanan extends BaseController
{
    protected $pesananModel;
    protected $layananModel;

    public function __construct()
    {
        $this->pesananModel = new PesananModel();
        $this->layananModel = new LayananModel();
    }

    // Tampil Data (READ)
    public function index()
    {
        $data = [
            'title'   => 'Daftar Pesanan | Space Laundry',
            'pesanan' => $this->pesananModel->getPesanan()
        ];
        return view('pesanan/v_index', $data);
    }

    // Form Tambah / Order (CREATE)
    public function tambah()
    {
        session();
        $data = [
            'title'      => 'Buat Pesanan Baru | Space Laundry',
            'layanan'    => $this->layananModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('pesanan/v_tambah', $data);
    }

    // Proses Simpan
    public function simpan()
    {
        $rules = [
            'nama_pelanggan' => 'required',
            'no_hp'          => 'required|numeric', // Validasi nomor HP
            'layanan_id'     => 'required',
            'berat'          => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('pesanan/tambah'))->withInput();
        }

        // Kalkulasi Total Harga (Harga x Berat)
        $layanan_id = $this->request->getPost('layanan_id');
        $berat = $this->request->getPost('berat');
        $data_layanan = $this->layananModel->find($layanan_id);
        $total_harga = $data_layanan['harga'] * $berat;

        $this->pesananModel->save([
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'no_hp'          => $this->request->getPost('no_hp'), // Simpan nomor HP
            'layanan_id'     => $layanan_id,
            'berat'          => $berat,
            'total_harga'    => $total_harga,
            'status'         => 'Menunggu'
        ]);

        session()->setFlashdata('pesan', 'Pesanan berhasil dibuat!');
        return redirect()->to(base_url('pesanan/sukses'));
    }

    // Halaman Notifikasi Sukses
    public function sukses()
    {
        $data = [
            'title' => 'Pesanan Berhasil | Space Laundry'
        ];
        return view('pesanan/v_sukses', $data);
    }

    // Form Ubah (UPDATE)
    public function ubah($id)
    {
        $data = [
            'title'      => 'Ubah Pesanan | Space Laundry',
            'layanan'    => $this->layananModel->findAll(),
            'pesanan'    => $this->pesananModel->getPesanan($id),
            'validation' => \Config\Services::validation()
        ];
        return view('pesanan/v_ubah', $data);
    }

    // Proses Update
    public function update($id)
    {
        // Kalkulasi ulang total harga
        $layanan_id = $this->request->getPost('layanan_id');
        $berat = $this->request->getPost('berat');
        $data_layanan = $this->layananModel->find($layanan_id);
        $total_harga = $data_layanan['harga'] * $berat;

        $this->pesananModel->update($id, [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'no_hp'          => $this->request->getPost('no_hp'), // Update nomor HP
            'layanan_id'     => $layanan_id,
            'berat'          => $berat,
            'total_harga'    => $total_harga,
            'status'         => $this->request->getPost('status')
        ]);

        session()->setFlashdata('pesan', 'Data pesanan berhasil diperbarui.');
        return redirect()->to(base_url('pesanan'));
    }

    // Hapus (DELETE)
    public function hapus($id)
    {
        $this->pesananModel->delete($id);
        session()->setFlashdata('pesan', 'Pesanan berhasil dibatalkan/dihapus.');
        return redirect()->to(base_url('pesanan'));
    }
}