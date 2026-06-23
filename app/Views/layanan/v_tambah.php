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
            <div class="card-header bg-primary text-white py-3">
                <h4 class="mb-0 fw-bold">Form Tambah Layanan</h4>
            </div>
            <div class="card-body p-4">
                <?php $validation = \Config\Services::validation(); ?>
                
                <form action="<?= base_url('layanan/simpan'); ?>" method="post">
                    <?= csrf_field(); ?>
                    
                    <div class="mb-3">
                        <label for="nama_layanan" class="form-label fw-bold">Nama Layanan</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_layanan')) ? 'is-invalid' : ''; ?>" id="nama_layanan" name="nama_layanan" value="<?= old('nama_layanan'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('nama_layanan'); ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nomor HP / WhatsApp</label>
                        <input type="number" class="form-control" name="no_hp" placeholder="Contoh: 081234567890" required>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label fw-bold">Harga (Rp)</label>
                        <input type="number" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= old('harga'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('harga'); ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="estimasi_waktu" class="form-label fw-bold">Estimasi Waktu</label>
                        <input type="text" class="form-control <?= ($validation->hasError('estimasi_waktu')) ? 'is-invalid' : ''; ?>" id="estimasi_waktu" name="estimasi_waktu" placeholder="Misal: 2 Hari, 3 Jam" value="<?= old('estimasi_waktu'); ?>">
                        <div class="invalid-feedback"><?= $validation->getError('estimasi_waktu'); ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-bold">Deskripsi (Opsional)</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= old('deskripsi'); ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between pt-3">
                        <a href="<?= base_url('layanan'); ?>" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Layanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>