<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: white;
            padding: 140px 0;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= base_url('/'); ?>">
                <i class="bi bi-stars"></i> Space Laundry
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('/'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('harga'); ?>">Daftar Harga</a>
                    </li>
                    
                    <?php if(session()->get('isLoggedIn')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('layanan'); ?>">Kelola Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-warning" href="<?= base_url('pesanan'); ?>">Manajemen Pesanan</a>
                        </li>
                    <?php endif; ?>
                </ul>

                <?php if(session()->get('isLoggedIn')): ?>
                    <a href="<?= base_url('logout'); ?>" class="btn btn-outline-danger ms-lg-3 mt-2 mt-lg-0 fw-bold">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                <?php else: ?>
                    <a href="<?= base_url('login'); ?>" class="btn btn-outline-light ms-lg-3 mt-2 mt-lg-0 fw-bold">
                        <i class="bi bi-box-arrow-in-right"></i> Login Admin
                    </a>
                    <a href="<?= base_url('pesanan/tambah'); ?>" class="btn btn-primary ms-lg-2 mt-2 mt-lg-0 fw-bold">
                        <i class="bi bi-cart-plus"></i> Buat Pesanan
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">Pakaian Bersih Sekejap Kecepatan Cahaya!</h1>
            <p class="lead mb-4">Selamat datang di Space Laundry. Kami siap memproses cucian kotor Anda dengan teknologi modern, higienis, dan selesai tepat waktu.</p>
            <a href="<?= base_url('pesanan/tambah'); ?>" class="btn btn-primary btn-lg px-4 me-2">Order Sekarang</a>
            <a href="<?= base_url('harga'); ?>" class="btn btn-light btn-lg px-4">Cek Daftar Harga</a>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-5">Mudahnya Mencuci di Space Laundry</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="p-3 bg-white rounded-circle d-inline-block shadow-sm mb-3">
                        <h2 class="text-dark m-0"><i class="bi bi-phone"></i></h2>
                    </div>
                    <h5 class="fw-bold">1. Buat Pesanan</h5>
                    <p class="text-muted small">Input data diri dan berat cucian Anda melalui menu Order di website kami.</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="p-3 bg-white rounded-circle d-inline-block shadow-sm mb-3">
                        <h2 class="text-dark m-0"><i class="bi bi-droplet-half"></i></h2>
                    </div>
                    <h5 class="fw-bold">2. Proses Cuci</h5>
                    <p class="text-muted small">Pakaian Anda dipilah, dicuci bersih, dan disetrika dengan rapi.</p>
                </div>
                <div class="col-md-4">
                    <div class="p-3 bg-white rounded-circle d-inline-block shadow-sm mb-3">
                        <h2 class="text-dark m-0"><i class="bi bi-check-circle"></i></h2>
                    </div>
                    <h5 class="fw-bold">3. Selesai</h5>
                    <p class="text-muted small">Pakaian kembali dalam keadaan bersih, wangi, dan siap dipakai.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; <?= date('Y'); ?> Space Laundry. A11.2024.16087</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>