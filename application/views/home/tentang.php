<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> — DiagnosaKu</title>
    <!-- Favicon SVG Kucing -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath d='M50 75c-4 0-8-6-8-14s4-14 8-14 8 6 8 14-4 14-8 14zm-16-22c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm32 0c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm-20-18c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8zm12 0c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8z' fill='%23F4A261'/%3E%3C/svg%3E">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>files/dist/css/design-system.css" rel="stylesheet">
    
    <style>
        body {
            background-color: var(--ds-bg-body);
            color: var(--ds-text);
            font-family: 'Poppins', sans-serif;
        }
        .navbar-brand {
            font-weight: 700;
            color: var(--ds-text);
            font-size: 1.25rem;
        }
        .about-header {
            background: linear-gradient(135deg, #FFF6E5 0%, #FFFDF8 100%);
            padding: 50px 0;
            border-bottom: 1px solid var(--ds-border);
            text-align: center;
        }
        .footer {
            background-color: var(--ds-dark);
            color: rgba(255, 255, 255, 0.8);
            padding: 60px 0 30px;
        }
    </style>
</head>
<body>
    <div class="ds-paw-bg"></div>

    <!-- Navigation Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="<?= base_url() ?>">
                <svg width="30" height="30" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M50 75c-4 0-8-6-8-14s4-14 8-14 8 6 8 14-4 14-8 14zm-16-22c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm32 0c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm-20-18c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8zm12 0c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8z" fill="var(--ds-primary)"/>
                </svg>
                <span>DiagnosaKu</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item"><a class="nav-link fw-semibold" href="<?= base_url() ?>">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold active text-dark" href="<?= base_url('home/tentang') ?>">Tentang Sistem</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold" href="<?= base_url('home/penyakit_info') ?>">Informasi Penyakit</a></li>
                    <li class="nav-item"><a class="btn btn-outline-dark py-2 px-3 fw-medium" href="<?= base_url('admin') ?>" style="border-radius:12px;"><i class="bi bi-box-arrow-in-right me-1"></i> Admin Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="about-header mb-5">
        <div class="container">
            <h1 class="fw-bold" style="font-size:2.2rem; color:var(--ds-text);">Tentang DiagnosaKu</h1>
            <p class="text-muted small">Mengenal sistem pakar Certainty Factor untuk diagnosa dini penyakit kucing.</p>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mb-5">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-9">
                <!-- Latar Belakang -->
                <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background:#fff;">
                    <h3 class="fw-bold mb-3 h5" style="color:var(--ds-primary);"><i class="bi bi-info-circle-fill me-2"></i> Latar Belakang</h3>
                    <p class="small text-muted" style="line-height:1.7; text-align:justify;">
                        Kucing adalah salah satu hewan peliharaan terpopuler. Pemilik kucing sering kali kesulitan mengenali gejala sakit sejak dini karena keterbatasan informasi atau jarak ke klinik hewan yang cukup jauh. keterlambatan penanganan medis berpotensi membahayakan nyawa kucing.
                    </p>
                    <p class="small text-muted" style="line-height:1.7; text-align:justify;">
                        <strong>DiagnosaKu</strong> dikembangkan sebagai sistem pakar berbasis website untuk membantu pemilik kucing melakukan skrining awal tanda-tanda klinis penyakit. Melalui pengamatan gejala fisik, sistem dapat memberikan indikasi kemungkinan penyakit beserta persentase kepastian awal untuk memudahkan pemilik mengambil tindakan penanganan medis segera.
                    </p>
                </div>

                <!-- Certainty Factor -->
                <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 20px; background:#fff;">
                    <h3 class="fw-bold mb-3 h5" style="color:var(--ds-primary);"><i class="bi bi-cpu-fill me-2"></i> Metode Certainty Factor (CF)</h3>
                    <p class="small text-muted" style="line-height:1.7; text-align:justify;">
                        Metode Certainty Factor (CF) diperkenalkan oleh Shortliffe dan Buchanan pada tahun 1975 untuk menangani ketidakpastian dalam pengambilan keputusan klinis. Formula dasar Certainty Factor adalah:
                    </p>
                    <div class="p-3 text-center my-3 rounded fw-bold" style="font-family:monospace; font-size:1rem; border-left:4px solid var(--ds-primary); background-color:var(--ds-bg-body); color:var(--ds-text);">
                        CF(H, E) = MB(H, E) - MD(H, E)
                    </div>
                    <p class="small text-muted" style="line-height:1.7;">
                        Keterangan:
                    </p>
                    <ul class="small text-muted" style="line-height:1.7;">
                        <li><strong>CF(H,E)</strong>: Faktor kepastian dari hipotesis H berdasarkan bukti E.</li>
                        <li><strong>MB(H,E)</strong>: Measure of Belief (tingkat keyakinan) terhadap H berdasarkan E.</li>
                        <li><strong>MD(H,E)</strong>: Measure of Disbelief (tingkat ketidakyakinan) terhadap H berdasarkan E.</li>
                    </ul>
                    <p class="small text-muted" style="line-height:1.7; text-align:justify;">
                        Kalkulasi Certainty Factor dalam sistem ini menggabungkan tingkat keyakinan yang ditentukan oleh **pakar/dokter hewan** dengan tingkat keyakinan yang dipilih oleh **pemilik kucing (CF User)** saat mencentang gejala:
                    </p>
                    <div class="p-3 text-center my-3 rounded fw-bold" style="font-family:monospace; font-size:1rem; border-left:4px solid var(--ds-primary); background-color:var(--ds-bg-body); color:var(--ds-text);">
                        CF Gejala = CF Pakar &times; CF User
                    </div>
                    <p class="small text-muted" style="line-height:1.7; text-align:justify;">
                        Bila terdapat lebih dari satu gejala yang dialami, hasil kalkulasi digabungkan menggunakan rumus **CF Combine**:
                    </p>
                    <div class="p-3 text-center my-3 rounded fw-bold" style="font-family:monospace; font-size:1rem; border-left:4px solid var(--ds-primary); background-color:var(--ds-bg-body); color:var(--ds-text);">
                        CF Combine(CF1, CF2) = CF1 + CF2 &times; (1 - CF1)
                    </div>
                </div>

                <!-- Disclaimer -->
                <div class="card border-0 shadow-sm p-4" style="border-radius: 20px; background:#fff;">
                    <h3 class="fw-bold mb-3 h5" style="color:var(--ds-primary);"><i class="bi bi-journal-bookmark-fill me-2"></i> Disclaimer</h3>
                    <div class="alert alert-warning mb-0 border-0 p-3 small" role="alert" style="border-radius:12px; background-color:#FFF6E5; color:#c17d0a;">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Perhatian:</strong> Sistem pakar ini dikembangkan untuk tujuan edukasi dan deteksi awal (skrining mandiri). Hasil diagnosa sistem **tidak dapat menggantikan diagnosa klinis langsung oleh Dokter Hewan**. Hubungi klinik hewan terdekat jika kucing Anda menunjukkan kondisi darurat medis.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <div class="mb-4">
                <svg width="40" height="40" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto">
                    <path d="M50 75c-4 0-8-6-8-14s4-14 8-14 8 6 8 14-4 14-8 14zm-16-22c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm32 0c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm-20-18c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8zm12 0c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8z" fill="var(--ds-primary)"/>
                </svg>
                <h4 class="mt-2 mb-1 fw-bold text-white">DiagnosaKu</h4>
                <small class="text-light" style="opacity:0.6;">Sistem Pakar Diagnosa Penyakit Kucing dengan Certainty Factor</small>
            </div>
            <hr style="border-color: rgba(255,255,255,0.1);">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-4" style="font-size:0.85rem;">
                <small class="text-light" style="opacity:0.5;">&copy; <?= date('Y') ?> DiagnosaKu. All Rights Reserved.</small>
                <div class="d-flex gap-3">
                    <a href="<?= base_url() ?>" class="text-light text-decoration-none" style="opacity:0.7;">Beranda</a>
                    <a href="<?= base_url('home/penyakit_info') ?>" class="text-light text-decoration-none" style="opacity:0.7;">Info Penyakit</a>
                    <a href="<?= base_url('konsultasi') ?>" class="text-light text-decoration-none" style="opacity:0.7;">Konsultasi</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
