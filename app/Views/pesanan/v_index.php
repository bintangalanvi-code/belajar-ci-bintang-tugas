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
            <a class="navbar-brand fw-bold" href="<?= base_url('/'); ?>"><i class="bi bi-stars"></i> Space Laundry</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('layanan'); ?>">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link active" href="<?= base_url('pesanan'); ?>">Pesanan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Manajemen Pesanan</h2>
            <a href="<?= base_url('pesanan/tambah'); ?>" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Buat Order Baru</a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Tgl Order</th>
                            <th>Pelanggan</th>
                            <th>Layanan</th>
                            <th>Berat</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pesanan as $p) : ?>
                        <tr>
                            <td><?= date('d M Y', strtotime($p['created_at'])); ?></td>
                            <td class="fw-bold"><?= esc($p['nama_pelanggan']); ?></td>
                            <td><?= esc($p['nama_layanan']); ?></td>
                            <td><?= esc($p['berat']); ?> Kg</td>
                            <td class="text-success fw-bold">Rp <?= number_format($p['total_harga'], 0, ',', '.'); ?></td>
                            <td><span class="badge bg-secondary"><?= esc($p['status']); ?></span></td>
                            <td>
                                <a href="<?= base_url('pesanan/ubah/' . $p['id']); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                <a href="<?= base_url('pesanan/hapus/' . $p['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus pesanan ini?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>