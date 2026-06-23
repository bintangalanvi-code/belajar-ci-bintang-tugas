<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .success-icon {
            font-size: 6rem;
            color: #198754; /* Warna hijau sukses Bootstrap */
            animation: popIn 0.5s ease-out forwards;
        }
        @keyframes popIn {
            0% { transform: scale(0); opacity: 0; }
            80% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

    <div class="container text-center" style="max-width: 600px;">
        <div class="card shadow-lg border-0 py-5 px-4 rounded-4">
            <div class="card-body">
                <i class="bi bi-check-circle-fill success-icon mb-3 d-block"></i>
                <h2 class="fw-bold text-dark mb-3">Pesanan Berhasil Dibuat!</h2>
                
                <p class="lead text-secondary mb-4">
                    Terima kasih telah mempercayakan cucian Anda kepada Space Laundry. Data pesanan Anda telah masuk ke sistem kami.
                </p>
                <div class="alert alert-primary mb-4" role="alert">
                    <i class="bi bi-whatsapp fw-bold me-2"></i> Tim kami akan segera memproses dan menghubungi Anda melalui <strong>WhatsApp</strong> untuk konfirmasi lebih lanjut.
                </div>

                <a href="<?= base_url('/'); ?>" class="btn btn-outline-primary btn-lg rounded-pill px-5 fw-bold">
                    <i class="bi bi-house-door me-2"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

</body>
</html>