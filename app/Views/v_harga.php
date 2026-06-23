<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .header-bg {
            background-color: #0f2027;
            color: white;
            padding: 60px 0;
        }
        .price-card {
            transition: transform 0.3s;
        }
        .price-card:hover {
            transform: translateY(-10px);
        }
    </style>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

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
                        <a class="nav-link" href="<?= base_url('/'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('layanan'); ?>">Kelola Layanan (Admin)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('harga'); ?>">Daftar Harga</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="header-bg text-center">
        <div class="container">
            <h1 class="fw-bold">Daftar Harga Transparan</h1>
            <p class="lead mb-0">Pilih layanan yang paling sesuai dengan kebutuhan Anda. Tanpa biaya tersembunyi.</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                
                <?php if (empty($daftar_harga)) : ?>
                    <div class="col-12 text-center">
                        <div class="alert alert-warning" role="alert">
                            <i class="bi bi-info-circle"></i> Daftar harga belum tersedia saat ini.
                        </div>
                    </div>
                <?php else : ?>
                    <?php foreach ($daftar_harga as $harga) : ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm border-0 price-card">
                                <div class="card-header bg-primary text-white text-center py-3">
                                    <h5 class="mb-0 fw-bold"><?= esc($harga['nama_layanan']); ?></h5>
                                </div>
                                <div class="card-body text-center py-4">
                                    <h2 class="fw-bold text-dark mb-3">
                                        Rp <?= number_format($harga['harga'], 0, ',', '.'); ?>
                                    </h2>
                                    <p class="text-muted mb-4"><?= esc($harga['deskripsi']); ?></p>
                                    
                                    <ul class="list-unstyled text-start mx-auto" style="max-width: 200px;">
                                        <li class="mb-2"><i class="bi bi-clock-history text-warning me-2"></i> Estimasi: <strong><?= esc($harga['estimasi_waktu']); ?></strong></li>
                                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Cuci Bersih</li>
                                        <li class="mb-2"><i class="bi bi-check2-circle text-success me-2"></i> Setrika Rapi</li>
                                        <li><i class="bi bi-check2-circle text-success me-2"></i> Parfum Premium</li>
                                    </ul>
                                </div>
                                <div class="card-footer bg-white border-0 text-center pb-4">
                                    <a href="https://wa.me/6281234567890?text=Halo%20Space%20Laundry,%20saya%20ingin%20memesan%20layanan%20<?= urlencode($harga['nama_layanan']); ?>" class="btn btn-outline-primary w-75 fw-bold" target="_blank">
                                        <i class="bi bi-whatsapp"></i> Pesan Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; <?= date('Y'); ?> Space Laundry. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>