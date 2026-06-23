<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">

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
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/'); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('harga'); ?>">Daftar Harga</a></li>
                    <li class="nav-item"><a class="nav-link active" href="<?= base_url('layanan'); ?>">Kelola Layanan</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-warning" href="<?= base_url('pesanan'); ?>">Pesanan</a></li>
                </ul>
                <a href="<?= base_url('logout'); ?>" class="btn btn-outline-danger ms-lg-3 mt-2 mt-lg-0 fw-bold">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Daftar Jasa & Layanan</h2>
            <a href="<?= base_url('layanan/tambah'); ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Layanan</a>
        </div>

        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama Layanan</th>
                                <th>Harga</th>
                                <th>Estimasi Waktu</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($layanan)) : ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">Belum ada data layanan.</td>
                                </tr>
                            <?php else : ?>
                                <?php $i = 1; foreach ($layanan as $l) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td class="fw-bold"><?= esc($l['nama_layanan']); ?></td>
                                    <td>Rp <?= number_format($l['harga'], 0, ',', '.'); ?></td>
                                    <td><span class="badge bg-info text-dark"><?= esc($l['estimasi_waktu']); ?></span></td>
                                    <td><?= esc($l['deskripsi']); ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('layanan/ubah/' . $l['id']); ?>" class="btn btn-sm btn-warning me-1"><i class="bi bi-pencil-square"></i></a>
                                        <a href="<?= base_url('layanan/hapus/' . $l['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')"><i class="bi bi-trash-fill"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>