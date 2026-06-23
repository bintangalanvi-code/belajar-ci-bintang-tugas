<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5" style="max-width: 600px;">
        <div class="card shadow border-0">
            <div class="card-header bg-warning py-3">
                <h4 class="mb-0 fw-bold">Ubah Data Pesanan</h4>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url('pesanan/update/' . $pesanan['id']); ?>" method="post">
                    <?= csrf_field(); ?>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama_pelanggan" value="<?= esc($pesanan['nama_pelanggan']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nomor HP / WhatsApp</label>
                        <input type="number" class="form-control" name="no_hp" value="<?= esc($pesanan['no_hp']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Layanan</label>
                        <select class="form-select" name="layanan_id" required>
                            <?php foreach ($layanan as $l) : ?>
                                <option value="<?= $l['id']; ?>" <?= ($pesanan['layanan_id'] == $l['id']) ? 'selected' : ''; ?>>
                                    <?= esc($l['nama_layanan']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Berat Pakaian (Kg)</label>
                        <input type="number" step="0.1" class="form-control" name="berat" value="<?= esc($pesanan['berat']); ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Status Pesanan</label>
                        <select class="form-select" name="status">
                            <option value="Menunggu" <?= ($pesanan['status'] == 'Menunggu') ? 'selected' : ''; ?>>Menunggu</option>
                            <option value="Proses Cuci" <?= ($pesanan['status'] == 'Proses Cuci') ? 'selected' : ''; ?>>Proses Cuci</option>
                            <option value="Selesai" <?= ($pesanan['status'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('pesanan'); ?>" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-warning fw-bold">Perbarui Pesanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>