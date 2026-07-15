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
            min-height: 100vh;
        }
        @media print {
            .btn-print-hide, .navbar, .ds-modern-stepper {
                display: none !important;
            }
            body {
                background: white !important;
                padding: 0 !important;
            }
            .card {
                border: 1px solid #ddd !important;
                box-shadow: none !important;
            }
        }
    </style>
</head>
<body class="py-4">
    <div class="ds-paw-bg"></div>

    <div class="container" style="max-width: 900px;">
        <div class="card border-0 shadow-sm p-4 p-md-5 mb-5" style="border-radius: 24px; background: #fff;">
            
            <!-- Stepper Modern -->
            <div class="ds-modern-stepper btn-print-hide">
                <div class="ds-modern-stepper-line" style="width: 100%"></div>
                <div class="ds-modern-step completed">
                    <div class="ds-modern-step-circle"><i class="bi bi-check-lg"></i></div>
                    <div class="ds-modern-step-label">Identitas</div>
                </div>
                <div class="ds-modern-step completed">
                    <div class="ds-modern-step-circle"><i class="bi bi-check-lg"></i></div>
                    <div class="ds-modern-step-label">Pilih Gejala</div>
                </div>
                <div class="ds-modern-step active">
                    <div class="ds-modern-step-circle">3</div>
                    <div class="ds-modern-step-label">Hasil Diagnosa</div>
                </div>
            </div>

            <!-- Header Title -->
            <div class="text-center mb-5">
                <svg width="50" height="50" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-2">
                    <path d="M50 75c-4 0-8-6-8-14s4-14 8-14 8 6 8 14-4 14-8 14zm-16-22c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm32 0c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm-20-18c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8zm12 0c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8z" fill="var(--ds-primary)"/>
                </svg>
                <h3 class="fw-bold text-dark mb-1" style="font-size: 1.65rem;">Laporan Hasil Diagnosa Kucing</h3>
                <p class="text-muted small">Hasil kalkulasi Certainty Factor berdasarkan keluhan tanda klinis kucing Anda</p>
            </div>

            <!-- Profil Pemilik & Kucing -->
            <div class="p-3 mb-4 rounded-4" style="background-color: #FFF6E5; border: 1.5px solid rgba(244,162,97,0.15);">
                <div class="row g-3 text-center text-sm-start" style="font-size:0.875rem;">
                    <div class="col-sm-6">
                        <div class="text-muted"><i class="bi bi-person-fill text-primary me-1"></i> Pemilik Kucing:</div>
                        <div class="fw-bold text-dark"><?= htmlspecialchars($konsultasi->nama_pemilik) ?> (<?= htmlspecialchars($konsultasi->email) ?>)</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-muted"><i class="bi bi-cat text-primary me-1"></i> Identitas Kucing:</div>
                        <div class="fw-bold text-dark"><?= htmlspecialchars($konsultasi->nama_kucing) ?> — Breed: <?= htmlspecialchars($konsultasi->jenis_kucing) ?></div>
                    </div>
                    <div class="col-12 mt-2 pt-2 border-top border-warning border-opacity-25 text-muted small text-center text-sm-start">
                        <i class="bi bi-calendar3 me-1"></i> Waktu Diagnosa: <?= date('d M Y, H:i', strtotime($konsultasi->tanggal)) ?>
                    </div>
                </div>
            </div>

            <!-- Hasil Diagnosa Logic -->
            <?php if (empty($diagnosa)): ?>
                <div class="alert alert-warning text-center p-5" style="border-radius: 16px;">
                    <i class="bi bi-exclamation-triangle-fill display-4 text-warning mb-3"></i>
                    <h4 class="fw-bold text-dark">Tidak dapat menentukan diagnosis</h4>
                    <p class="mb-0 text-muted small">Gejala yang Anda pilih tidak memiliki korelasi yang cukup kuat dengan basis aturan penyakit kami. Silakan segera periksakan kucing Anda ke klinik hewan terdekat jika keluhan berlanjut.</p>
                </div>
            <?php else: $primary = $diagnosa[0]; ?>
                
                <!-- Hasil Utama Card -->
                <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius:20px; background:#fff; border-top: 4px solid var(--ds-primary) !important;">
                    <div class="text-center mb-4">
                        <span class="badge bg-danger mb-2 px-3 py-1.5" style="font-size:0.8125rem; font-weight:600; border-radius:8px;"><?= $primary->kode_penyakit ?></span>
                        <h2 class="fw-bold text-dark mb-3" style="font-size:1.85rem;"><?= htmlspecialchars($primary->nama_penyakit) ?></h2>
                        
                        <!-- Circular Progress Gauge -->
                        <div class="ds-progress-circle-container mb-3">
                            <svg class="ds-circle-svg" viewBox="0 0 140 140">
                                <circle class="ds-circle-bg" cx="70" cy="70" r="60"></circle>
                                <?php 
                                $pct = floatval($primary->cf_persentase);
                                $dashoffset = 377 - (377 * $pct / 100);
                                ?>
                                <circle class="ds-circle-progress-bar" cx="70" cy="70" r="60" 
                                        stroke-dasharray="377" 
                                        stroke-dashoffset="<?= $dashoffset ?>"></circle>
                            </svg>
                            <div class="ds-progress-circle-inner">
                                <span class="h2 fw-bold text-success m-0" style="font-size:1.85rem;"><?= $primary->cf_persentase ?>%</span>
                                <span class="text-muted small fw-semibold" style="font-size:0.6875rem;">Certainty Factor</span>
                            </div>
                        </div>

                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-1.5" style="border-radius:20px; font-weight:600; font-size:0.8125rem;">
                            <i class="bi bi-shield-check me-1"></i> Tingkat Keyakinan
                        </span>
                    </div>

                    <hr class="mb-4" style="border-color:var(--ds-border);">

                    <!-- Details -->
                    <div class="mb-4">
                        <h5 class="fw-bold text-primary mb-2" style="font-size:1rem;"><i class="bi bi-journal-text me-1"></i> Deskripsi Penyakit</h5>
                        <p class="small text-muted mb-0" style="line-height:1.7; text-align:justify;"><?= htmlspecialchars($primary->definisi) ?></p>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold text-primary mb-2" style="font-size:1rem;"><i class="bi bi-bug me-1"></i> Faktor Penyebab</h5>
                        <p class="small text-muted mb-0" style="line-height:1.7; text-align:justify;"><?= htmlspecialchars($primary->penyebab) ?></p>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold text-success mb-2" style="font-size:1rem;"><i class="bi bi-activity me-1"></i> Penanganan Medis Awal</h5>
                        <div class="p-3 bg-light rounded-3" style="border-left: 4px solid var(--ds-accent); border-radius:12px !important;">
                            <p class="mb-0 small text-dark fw-medium" style="line-height:1.7;"><?= htmlspecialchars($primary->solusi ?: 'Bawa segera kucing Anda ke klinik dokter hewan.') ?></p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-bold text-danger mb-2" style="font-size:1rem;"><i class="bi bi-shield-plus me-1"></i> Langkah Pencegahan</h5>
                        <p class="small text-muted mb-0" style="line-height:1.7; text-align:justify;"><?= htmlspecialchars($primary->pencegahan) ?></p>
                    </div>

                    <div class="pt-3 border-top text-muted small" style="border-color:var(--ds-border) !important;">
                        <i class="bi bi-bookmark-fill me-1"></i> <strong>Referensi Ilmiah:</strong> Merck Veterinary Manual, Cornell Feline Health Center, International Cat Care (iCatCare).
                    </div>
                </div>

                <!-- Selected Symptoms -->
                <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius:20px; background:#fff;">
                    <h4 class="fw-bold text-dark h5 mb-3"><i class="bi bi-clipboard2-pulse text-primary me-2"></i> Gejala Terpilih & CF User</h4>
                    <div class="table-responsive">
                        <table class="table table-striped align-middle mb-0" style="font-size:0.875rem;">
                            <thead class="table-light">
                                <tr>
                                    <th width="80" class="text-center">No</th>
                                    <th width="120" class="text-center">Kode Gejala</th>
                                    <th>Nama Tanda Klinis / Gejala</th>
                                    <th class="text-end">Keyakinan Pemilik (CF)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1; foreach ($gejala_terpilih as $gt): ?>
                                <tr>
                                    <td class="text-center"><?= $num++ ?></td>
                                    <td class="text-center"><span class="badge bg-secondary px-2 py-1" style="font-size:0.75rem;"><?= $gt->kode_gejala ?></span></td>
                                    <td class="fw-semibold text-dark"><?= htmlspecialchars($gt->nama_gejala) ?></td>
                                    <td class="text-end fw-bold text-primary"><?= $gt->cf_user ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Alternative Diagnoses -->
                <?php if (count($diagnosa) > 1): ?>
                    <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius:20px; background:#fff;">
                        <h4 class="fw-bold text-dark h5 mb-2"><i class="bi bi-layers text-primary me-2"></i> Kemungkinan Penyakit Lain (Alternatif)</h4>
                        <p class="text-muted small mb-3">Berikut adalah penyakit lain yang juga cocok dengan beberapa gejala kucing Anda, diurutkan berdasarkan persentase Certainty Factor:</p>
                        <div class="row g-3">
                            <?php for ($i = 1; $i < count($diagnosa); $i++): $alt = $diagnosa[$i]; ?>
                            <div class="col-md-6">
                                <div class="p-3 border rounded-4 bg-light d-flex align-items-center justify-content-between" style="border-radius:16px !important; border-color:var(--ds-border) !important;">
                                    <div>
                                        <span class="badge bg-secondary mb-1" style="font-size:0.7rem;"><?= $alt->kode_penyakit ?></span>
                                        <h6 class="fw-bold text-dark mb-0" style="font-size:0.875rem;"><?= htmlspecialchars($alt->nama_penyakit) ?></h6>
                                    </div>
                                    <div class="text-end">
                                        <span class="fw-bold text-success" style="font-size:1.15rem;"><?= $alt->cf_persentase ?>%</span>
                                        <div class="progress" style="height: 4px; width: 60px; border-radius:2px; background-color:#e9ecef;">
                                            <div class="progress-bar bg-success" style="width: <?= $alt->cf_persentase ?>%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endif; ?>

            <!-- Navigation Buttons -->
            <div class="d-flex justify-content-between flex-wrap gap-3 btn-print-hide mt-5 pt-3 border-top" style="border-color:var(--ds-border) !important;">
                <a href="<?= base_url() ?>" class="btn btn-outline-secondary px-4 py-2.5" style="border-radius:12px; font-weight:500;">
                    <i class="bi bi-house me-1"></i> Beranda
                </a>
                <div class="d-flex gap-2">
                    <button onclick="window.print()" class="btn btn-outline-dark px-4 py-2.5 d-inline-flex align-items-center gap-2 fw-medium" style="border-radius:12px;">
                        <i class="bi bi-printer"></i> Cetak Laporan
                    </button>
                    <a href="<?= base_url('konsultasi') ?>" class="btn btn-custom-primary px-4 py-2.5 d-inline-flex align-items-center gap-2" style="border-radius:12px;">
                        <i class="bi bi-heart-pulse-fill"></i> Konsultasi Baru
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
