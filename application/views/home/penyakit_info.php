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
        .info-header {
            background: linear-gradient(135deg, #FFF6E5 0%, #FFFDF8 100%);
            padding: 50px 0;
            border-bottom: 1px solid var(--ds-border);
            text-align: center;
        }
        .list-group-item.active {
            background-color: var(--ds-primary) !important;
            border-color: var(--ds-primary) !important;
            color: #fff !important;
        }
        .list-group-item.active .badge {
            background-color: #ffffff !important;
            color: var(--ds-primary) !important;
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
                    <li class="nav-item"><a class="nav-link fw-semibold" href="<?= base_url('home/tentang') ?>">Tentang Sistem</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold active text-dark" href="<?= base_url('home/penyakit_info') ?>">Informasi Penyakit</a></li>
                    <li class="nav-item"><a class="btn btn-outline-dark py-2 px-3 fw-medium" href="<?= base_url('admin') ?>" style="border-radius:12px;"><i class="bi bi-box-arrow-in-right me-1"></i> Admin Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Info Header -->
    <header class="info-header mb-5">
        <div class="container">
            <h1 class="fw-bold" style="font-size:2.2rem; color:var(--ds-text);">Informasi Penyakit Kucing</h1>
            <p class="text-muted small">Daftar penyakit kucing, definisi medis, faktor penyebab, solusi medis awal, dan langkah pencegahan.</p>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mb-5">
        <div class="row g-4">
            <!-- Sidebar Navigation of Diseases -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-3" style="border-radius: 20px; background:#fff;">
                    <h5 class="fw-bold mb-3 px-2" style="font-size:1.05rem;"><i class="bi bi-list-task text-primary me-2"></i> Daftar Penyakit</h5>
                    <div class="list-group list-group-flush" id="list-tab" role="tablist">
                        <?php $active = true; foreach ($penyakit as $p): ?>
                        <a class="list-group-item list-group-item-action py-3 px-3 d-flex align-items-center gap-2 <?= $active ? 'active' : '' ?>" 
                           id="list-<?= $p->kode_penyakit ?>-list" data-bs-toggle="list" href="#list-<?= $p->kode_penyakit ?>" role="tab" style="border-radius:12px; font-size:0.875rem; border:none; margin-bottom:4px;">
                            <span class="badge bg-warning text-dark px-2.5 py-1.5" style="border-radius:6px;"><?= $p->kode_penyakit ?></span>
                            <span class="fw-semibold text-truncate"><?= htmlspecialchars($p->nama_penyakit) ?></span>
                        </a>
                        <?php $active = false; endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Disease Details Display -->
            <div class="col-lg-8">
                <div class="tab-content" id="nav-tabContent">
                    <?php $active = true; foreach ($penyakit as $p): ?>
                    <div class="tab-pane fade show <?= $active ? 'active' : '' ?>" id="list-<?= $p->kode_penyakit ?>" role="tabpanel">
                        <div class="card border-0 shadow-sm p-4" style="border-radius: 20px; background:#fff;">
                            <div class="d-flex align-items-center gap-3 mb-4 flex-wrap">
                                <span class="h3 mb-0 px-3 py-2 text-dark rounded-3 fw-bold bg-warning" style="font-size:1.5rem; border-radius:12px !important;"><?= $p->kode_penyakit ?></span>
                                <div>
                                    <h2 class="fw-bold mb-1" style="font-size:1.6rem; color:var(--ds-text);"><?= htmlspecialchars($p->nama_penyakit) ?></h2>
                                    <span class="text-muted small"><i class="bi bi-shield-check text-success me-1"></i> Terverifikasi Literatur Kedokteran Hewan</span>
                                </div>
                            </div>

                            <hr class="mb-4" style="border-color:var(--ds-border);">

                            <div class="mb-4">
                                <h5 class="fw-bold mb-2 text-primary" style="font-size:1rem;"><i class="bi bi-journal-text me-1"></i> Definisi Medis</h5>
                                <p class="small text-muted" style="line-height:1.7; text-align:justify;"><?= htmlspecialchars($p->definisi) ?></p>
                            </div>

                            <div class="mb-4">
                                <h5 class="fw-bold mb-2 text-primary" style="font-size:1rem;"><i class="bi bi-bug me-1"></i> Faktor Penyebab</h5>
                                <p class="small text-muted" style="line-height:1.7; text-align:justify;"><?= htmlspecialchars($p->penyebab) ?></p>
                            </div>

                            <div class="mb-4">
                                <h5 class="fw-bold mb-2 text-success" style="font-size:1rem;"><i class="bi bi-activity me-1"></i> Solusi Penanganan Medis Awal</h5>
                                <div class="p-3 bg-light rounded-3" style="border-left: 4px solid var(--ds-accent); border-radius:12px !important;">
                                    <p class="mb-0 small text-dark fw-medium" style="line-height:1.7;"><?= htmlspecialchars($p->solusi ?: 'Hubungi dokter hewan terdekat.') ?></p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h5 class="fw-bold mb-2 text-danger" style="font-size:1rem;"><i class="bi bi-shield-plus me-1"></i> Langkah Pencegahan</h5>
                                <p class="small text-muted" style="line-height:1.7; text-align:justify;"><?= htmlspecialchars($p->pencegahan) ?></p>
                            </div>

                            <div class="pt-3 border-top text-muted" style="font-size:0.75rem; border-color:var(--ds-border) !important;">
                                <i class="bi bi-bookmark-fill me-1"></i> <strong>Referensi Ilmiah:</strong> Merck Veterinary Manual, Cornell Feline Health Center, International Cat Care (iCatCare).
                            </div>
                        </div>
                    </div>
                    <?php $active = false; endforeach; ?>
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
                    <a href="<?= base_url('home/tentang') ?>" class="text-light text-decoration-none" style="opacity:0.7;">Tentang</a>
                    <a href="<?= base_url('konsultasi') ?>" class="text-light text-decoration-none" style="opacity:0.7;">Konsultasi</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
