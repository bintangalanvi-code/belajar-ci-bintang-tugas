<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        // Jika sudah login, lempar langsung ke halaman admin/pesanan
        if (session()->get('isLoggedIn')) {
            return redirect()->to(base_url('pesanan'));
        }

        $data = ['title' => 'Login Admin | Space Laundry'];
        return view('v_login', $data);
    }

    public function proses()
    {
        $userModel = new UserModel();
        $username  = $this->request->getPost('username');
        $password  = md5($this->request->getPost('password')); // Enkripsi MD5 cocokkan dengan database

        $cekAdmin = $userModel->where('username', $username)->where('password', $password)->first();

        if ($cekAdmin) {
            // Jika benar, buat sesi (session)
            session()->set([
                'isLoggedIn'   => true,
                'username'     => $cekAdmin['username'],
                'nama_lengkap' => $cekAdmin['nama_lengkap']
            ]);
            return redirect()->to(base_url('pesanan'));
        } else {
            // Jika salah, kembalikan ke halaman login
            session()->setFlashdata('error', 'Username atau Password salah!');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}