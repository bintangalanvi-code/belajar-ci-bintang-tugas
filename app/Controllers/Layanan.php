<?php

namespace App\Controllers;

use App\Models\LayananModel;

class Layanan extends BaseController
{
    protected $layananModel;

    public function __construct()
    {
        // Memuat model layanan
        $this->layananModel = new LayananModel();
    }

    // READ: Menampilkan semua data layanan
    public function index()
    {
        $data = [
            'title'   => 'Kelola Layanan | Space Laundry',
            'layanan' => $this->layananModel->findAll()
        ];
        return view('layanan/v_index', $data);
    }

    // CREATE: Menampilkan form tambah data
    public function tambah()
    {
        session(); // Mematikan error session jika belum aktif
        $data = [
            'title'      => 'Tambah Layanan | Space Laundry',
            'validation' => \Config\Services::validation()
        ];
        return view('layanan/v_tambah', $data);
    }

    // CREATE: Proses simpan data ke database + Validasi
    public function simpan()
    {
        // Aturan validasi input
        $rules = [
            'nama_layanan'   => 'required|min_length[3]',
            'harga'          => 'required|numeric',
            'estimasi_waktu' => 'required'
        ];

        if (!$this->validate($rules)) {
            // Jika validasi gagal, kembalikan ke form beserta errornya
            return redirect()->to(base_url('layanan/tambah'))->withInput();
        }

        // Jika lolos validasi, simpan data
        $this->layananModel->save([
            'nama_layanan'   => $this->request->getPost('nama_layanan'),
            'harga'          => $this->request->getPost('harga'),
            'estimasi_waktu' => $this->request->getPost('estimasi_waktu'),
            'deskripsi'      => $this->request->getPost('deskripsi')
        ]);

        session()->setFlashdata('pesan', 'Data layanan berhasil ditambahkan.');
        return redirect()->to(base_url('layanan'));
    }

    // UPDATE: Menampilkan form ubah data berdasarkan ID
    public function ubah($id)
    {
        $data = [
            'title'      => 'Ubah Layanan | Space Laundry',
            'validation' => \Config\Services::validation(),
            'layanan'    => $this->layananModel->find($id)
        ];

        if (empty($data['layanan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data layanan tidak ditemukan.');
        }

        return view('layanan/v_ubah', $data);
    }

    // UPDATE: Proses perbarui data di database + Validasi
    public function update($id)
    {
        $rules = [
            'nama_layanan'   => 'required|min_length[3]',
            'harga'          => 'required|numeric',
            'estimasi_waktu' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('layanan/ubah/' . $id))->withInput();
        }

        $this->layananModel->update($id, [
            'nama_layanan'   => $this->request->getPost('nama_layanan'),
            'harga'          => $this->request->getPost('harga'),
            'estimasi_waktu' => $this->request->getPost('estimasi_waktu'),
            'deskripsi'      => $this->request->getPost('deskripsi')
        ]);

        session()->setFlashdata('pesan', 'Data layanan berhasil diperbarui.');
        return redirect()->to(base_url('layanan'));
    }

    // DELETE: Menghapus data layanan
    public function hapus($id)
    {
        $this->layananModel->delete($id);
        session()->setFlashdata('pesan', 'Data layanan berhasil dihapus.');
        return redirect()->to(base_url('layanan'));
    }
}