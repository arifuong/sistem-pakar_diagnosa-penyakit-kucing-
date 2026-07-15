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
        .hero-section {
            background: linear-gradient(135deg, #FFF6E5 0%, #FFFDF8 100%);
            padding: 80px 0;
            border-bottom: 1px solid var(--ds-border);
            position: relative;
            overflow: hidden;
        }
        .hero-title {
            font-weight: 700;
            color: var(--ds-text);
            font-size: 2.75rem;
            line-height: 1.2;
        }
        .navbar-brand {
            font-weight: 700;
            color: var(--ds-text);
            font-size: 1.25rem;
        }
        .btn-custom-primary {
            background-color: var(--ds-primary);
            color: #fff;
            font-weight: 600;
            border-radius: var(--ds-radius-pill);
            padding: 12px 32px;
            border: none;
            transition: var(--ds-transition);
        }
        .btn-custom-primary:hover {
            background-color: #e09251;
            color: #fff;
            transform: scale(1.02);
            box-shadow: var(--ds-shadow-primary);
        }
        .btn-custom-secondary {
            background-color: transparent;
            color: var(--ds-text);
            font-weight: 600;
            border: 2px solid var(--ds-text);
            border-radius: var(--ds-radius-pill);
            padding: 10px 30px;
            transition: var(--ds-transition);
        }
        .btn-custom-secondary:hover {
            background-color: var(--ds-text);
            color: #fff;
        }
        .footer {
            background-color: var(--ds-dark);
            color: rgba(255, 255, 255, 0.8);
            padding: 60px 0 30px;
        }
        .work-step {
            text-align: center;
        }
        .work-step-num {
            width: 48px;
            height: 48px;
            line-height: 48px;
            border-radius: 50%;
            background-color: var(--ds-primary);
            color: white;
            font-size: 1.2rem;
            font-weight: 700;
            margin: 0 auto 16px;
            display: block;
            box-shadow: 0 4px 10px rgba(244,162,97,0.25);
        }
    </style>
</head>
<body>
    <div class="ds-paw-bg"></div>

    <!-- Navigation Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="<?= base_url() ?>">
                <!-- Cat brand icon -->
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
                    <li class="nav-item"><a class="nav-link fw-semibold active text-dark" href="<?= base_url() ?>">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold" href="<?= base_url('home/tentang') ?>">Tentang Sistem</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold" href="<?= base_url('home/penyakit_info') ?>">Informasi Penyakit</a></li>
                    <li class="nav-item"><a class="btn btn-outline-dark py-2 px-3 fw-medium" href="<?= base_url('admin') ?>" style="border-radius:12px;"><i class="bi bi-box-arrow-in-right me-1"></i> Admin Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill fw-semibold"><i class="bi bi-paw-fill me-1"></i> Veterinary Care System</div>
                    <h1 class="hero-title mb-4">Sistem Pakar Diagnosa Penyakit Kucing</h1>
                    <p class="lead mb-4 text-secondary" style="font-size:1.05rem; line-height:1.7;">
                        Identifikasi dini kesehatan kucing kesayangan Anda secara cepat dan mudah. 
                        Sistem ini menggunakan metode <strong>Certainty Factor (CF)</strong> untuk mengukur tingkat keyakinan klinis dari gejala-gejala yang terlihat pada kucing.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="<?= base_url('konsultasi') ?>" class="btn btn-custom-primary btn-lg"><i class="bi bi-heart-pulse-fill me-1"></i> Mulai Konsultasi</a>
                        <a href="<?= base_url('home/penyakit_info') ?>" class="btn btn-custom-secondary btn-lg">Pelajari Penyakit</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <!-- Vet Hugging Cat SVG Illustration -->
                    <svg width="380" height="380" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg" class="img-fluid mx-auto d-block" style="filter: drop-shadow(0 12px 24px rgba(38,70,83,0.1));">
                        <!-- Background circle -->
                        <circle cx="100" cy="100" r="85" fill="#FFF6E5" />
                        <circle cx="100" cy="100" r="70" fill="#F4A261" opacity="0.1" />

                        <!-- Vet Body -->
                        <path d="M50 160 C50 120, 110 120, 110 160 Z" fill="#2A9D8F" />
                        <!-- Vet Head -->
                        <circle cx="80" cy="105" r="16" fill="#F4A261" />
                        <!-- Vet Hair -->
                        <path d="M64 105 C64 90, 96 90, 96 105 Z" fill="#264653" />
                        <path d="M64 102 L70 94 L80 94 L86 102 Z" fill="#264653" />
                        <!-- Vet Eyes & Smile -->
                        <circle cx="75" cy="105" r="1.5" fill="#264653" />
                        <circle cx="85" cy="105" r="1.5" fill="#264653" />
                        <path d="M78 112 Q80 114 82 112" stroke="#264653" stroke-width="1" stroke-linecap="round" />

                        <!-- Cat Body -->
                        <path d="M90 145 C90 125, 130 125, 130 145 Z" fill="#E9C46A" />
                        <!-- Cat Head -->
                        <circle cx="110" cy="120" r="15" fill="#F4A261" />
                        <!-- Cat Ears -->
                        <path d="M98 112 L104 98 L108 110 Z" fill="#F4A261" />
                        <path d="M122 112 L116 98 L112 110 Z" fill="#F4A261" />
                        <!-- Cat Eyes -->
                        <circle cx="105" cy="118" r="1.5" fill="#264653" />
                        <circle cx="115" cy="118" r="1.5" fill="#264653" />
                        <!-- Cat Nose -->
                        <path d="M110 122 L109 124 H111 Z" fill="#E76F51" />

                        <!-- Vet's Arm hugging the cat -->
                        <path d="M55 140 Q85 130 100 135" stroke="#2A9D8F" stroke-width="12" stroke-linecap="round" />
                        <circle cx="100" cy="135" r="8" fill="#F4A261" />

                        <!-- Heart floating -->
                        <path d="M140 75 C137 70, 130 70, 130 78 C130 85, 140 92, 140 92 C140 92, 150 85, 150 78 C150 70, 143 70, 140 75 Z" fill="#E76F51" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Keunggulan Section -->
    <section class="py-5">
        <div class="container py-4">
            <div class="text-center mb-5 max-width-600 mx-auto">
                <h2 class="fw-bold" style="font-size:1.85rem;">Mengapa Menggunakan Sistem Ini?</h2>
                <p class="text-muted">Metode andal Certainty Factor untuk membantu identifikasi awal tanda klinis kucing.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4 h-100 ds-card-hover" style="border-radius:20px; background:#fff;">
                        <div class="fs-1 mb-3 text-primary"><i class="bi bi-shield-heart"></i></div>
                        <h4 class="fw-bold h5 mb-2">Pengetahuan Terverifikasi</h4>
                        <p class="text-muted small mb-0" style="line-height:1.6;">Aturan kepakaran merujuk pada literatur kedokteran hewan tepercaya untuk memastikan akurasi data awal.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4 h-100 ds-card-hover" style="border-radius:20px; background:#fff;">
                        <div class="fs-1 mb-3 text-primary"><i class="bi bi-cpu"></i></div>
                        <h4 class="fw-bold h5 mb-2">Certainty Factor</h4>
                        <p class="text-muted small mb-0" style="line-height:1.6;">Menggunakan metode kalkulasi kepastian klinis (CF) untuk mengukur seberapa yakin Anda melihat gejala kucing.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4 h-100 ds-card-hover" style="border-radius:20px; background:#fff;">
                        <div class="fs-1 mb-3 text-primary"><i class="bi bi-lightning-charge"></i></div>
                        <h4 class="fw-bold h5 mb-2">Cepat & Responsif</h4>
                        <p class="text-muted small mb-0" style="line-height:1.6;">Hasil analisis beserta penanganan medis awal, pencegahan, dan alternatif penyakit dapat diketahui secara instan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Penyakit Umum Section -->
    <section class="py-5 bg-white border-top border-bottom" style="border-color:#F2ECE4 !important;">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="font-size:1.85rem;">Penyakit Kucing yang Umum Diidentifikasi</h2>
                <p class="text-muted">Sistem pakar dapat mengenali tanda klinis dari beberapa penyakit kucing umum berikut.</p>
            </div>
            <div class="row g-4">
                <?php $limit = 0; foreach ($penyakit as $p): if ($limit++ >= 3) break; ?>
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm ds-card-hover" style="border-radius:20px; background: var(--ds-bg-body);">
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge bg-danger align-self-start mb-3" style="font-size:0.75rem; font-weight:600; padding:6px 12px; border-radius:8px;"><?= $p->kode_penyakit ?></span>
                            <h4 class="fw-bold h5 mb-2"><?= htmlspecialchars($p->nama_penyakit) ?></h4>
                            <p class="text-muted flex-grow-1 small" style="line-height:1.6;"><?= mb_strimwidth(htmlspecialchars($p->definisi), 0, 130, '...') ?></p>
                            <a href="<?= base_url('home/penyakit_info') ?>" class="fw-semibold mt-3 d-inline-flex align-items-center gap-1 text-decoration-none" style="color:var(--ds-primary); font-size:0.875rem;">Detail Selengkapnya <i class="bi bi-chevron-right" style="font-size:0.75rem;"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="text-center mt-5">
                <a href="<?= base_url('home/penyakit_info') ?>" class="btn btn-custom-secondary">Lihat Semua Daftar Penyakit</a>
            </div>
        </div>
    </section>

    <!-- Cara Kerja Section -->
    <section class="py-5">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold" style="font-size:1.85rem;">Cara Kerja Diagnosa</h2>
                <p class="text-muted">Langkah mudah mendiagnosa kondisi kesehatan kucing Anda.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="work-step">
                        <div class="work-step-num">1</div>
                        <h5 class="fw-bold h6">Profil Pemilik & Kucing</h5>
                        <p class="text-muted small" style="line-height:1.5;">Masukkan identitas kucing dan data diri Anda selaku pemilik.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="work-step">
                        <div class="work-step-num">2</div>
                        <h5 class="fw-bold h6">Pilih Gejala Klinis</h5>
                        <p class="text-muted small" style="line-height:1.5;">Centang tanda-tanda sakit yang terlihat secara fisik pada kucing.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="work-step">
                        <div class="work-step-num">3</div>
                        <h5 class="fw-bold h6">Keyakinan Pemilik</h5>
                        <p class="text-muted small" style="line-height:1.5;">Pilih tingkat keyakinan (CF User) Anda terhadap setiap gejala tersebut.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="work-step">
                        <div class="work-step-num">4</div>
                        <h5 class="fw-bold h6">Hasil & Solusi Medis</h5>
                        <p class="text-muted small" style="line-height:1.5;">Sistem menghitung persentase CF dan menyajikan solusi serta pencegahannya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                    <a href="<?= base_url('home/tentang') ?>" class="text-light text-decoration-none" style="opacity:0.7;">Tentang</a>
                    <a href="<?= base_url('home/penyakit_info') ?>" class="text-light text-decoration-none" style="opacity:0.7;">Info Penyakit</a>
                    <a href="<?= base_url('konsultasi') ?>" class="text-light text-decoration-none" style="opacity:0.7;">Konsultasi</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
