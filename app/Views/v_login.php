<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-dark d-flex align-items-center justify-content-center vh-100">

    <div class="card shadow-lg border-0" style="width: 100%; max-width: 400px;">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <i class="bi bi-stars text-primary" style="font-size: 3rem;"></i>
                <h3 class="fw-bold mt-2">Space Laundry</h3>
                <p class="text-muted">Login Administrator</p>
            </div>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('login/proses'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label fw-bold">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 fw-bold">Masuk Sistem</button>
                <a href="<?= base_url('/'); ?>" class="btn btn-link w-100 mt-2 text-decoration-none text-muted">Kembali ke Beranda</a>
            </form>
        </div>
    </div>

</body>
</html>