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
                <h4 class="mb-0 fw-bold">Buat Pesanan Laundry</h4>
            </div>
            <div class="card-body p-4">
                
                <?php $validation = \Config\Services::validation(); ?>
                <?php if ($validation->getErrors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Gagal Menyimpan!</strong> Periksa kembali isian Anda:
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('pesanan/simpan'); ?>" method="post">
                    <?= csrf_field(); ?>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama_pelanggan" value="<?= old('nama_pelanggan'); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nomor HP / WhatsApp</label>
                        <input type="number" class="form-control" name="no_hp" placeholder="Contoh: 081234567890 (Tanpa spasi)" value="<?= old('no_hp'); ?>" required>
                        <small class="text-muted">Pastikan hanya berisi angka.</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Pilih Jenis Layanan</label>
                        <select class="form-select" id="layanan_id" name="layanan_id" required>
                            <option value="">-- Pilih Layanan --</option>
                            <?php foreach ($layanan as $l) : ?>
                                <option value="<?= $l['id']; ?>" data-harga="<?= $l['harga']; ?>" <?= old('layanan_id') == $l['id'] ? 'selected' : ''; ?>>
                                    <?= esc($l['nama_layanan']); ?> (Rp <?= number_format($l['harga'], 0, ',', '.'); ?>/kg)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Berat Pakaian (Kg)</label>
                        <input type="number" step="0.1" class="form-control" id="berat" name="berat" placeholder="Contoh: 2.5 (Gunakan titik)" value="<?= old('berat'); ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-success">Estimasi Total Harga</label>
                        <input type="text" class="form-control form-control-lg bg-white fw-bold text-success" id="tampil_total" readonly placeholder="Rp 0">
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('pesanan'); ?>" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Proses Pesanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const layananSelect = document.getElementById('layanan_id');
        const beratInput = document.getElementById('berat');
        const tampilTotal = document.getElementById('tampil_total');

        function hitungTotal() {
            const harga = layananSelect.options[layananSelect.selectedIndex]?.getAttribute('data-harga') || 0;
            const berat = beratInput.value || 0;
            const total = parseFloat(harga) * parseFloat(berat);
            
            if (!isNaN(total)) {
                tampilTotal.value = 'Rp ' + total.toLocaleString('id-ID');
            } else {
                tampilTotal.value = 'Rp 0';
            }
        }

        layananSelect.addEventListener('change', hitungTotal);
        beratInput.addEventListener('input', hitungTotal);
        
        // Panggil fungsi saat halaman pertama dimuat (berguna jika form dikembalikan karena error)
        window.onload = hitungTotal;
    </script>
</body>
</html>