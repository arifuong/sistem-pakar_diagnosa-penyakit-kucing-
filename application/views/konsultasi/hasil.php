<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Diagnosa — DiagnosaKu</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Cpath d='M6 24c0 0 2-12 6-16 1-1 3-1 3 0 0 3-3 10-1 14 2 5 5 6 10 6s8-1 8-6c0-4-3-11-1-14 1-1 2-1 3 0 4 4 6 16 6 16' fill='%23D71F84'/%3E%3Ccircle cx='12' cy='12' r='2' fill='white'/%3E%3Ccircle cx='20' cy='12' r='2' fill='white'/%3E%3C/svg%3E">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>files/dist/css/design-system.css" rel="stylesheet">
    <style>
        body { background:linear-gradient(135deg,#D71F84 0%,#6F2282 50%,#1a0a20 100%); min-height:100vh; display:flex; align-items:center; justify-content:center; padding:24px 0; }
    </style>
</head>
<body>
    <div class="ds-paw-bg"></div>
    <div class="ds-wizard-wrapper" style="max-width:700px;">
        <div class="ds-wizard-card ds-fade-in">
            <div class="ds-wizard-progress"><div class="ds-wizard-progress-bar" style="width:100%"></div></div>
            <div class="ds-wizard-steps">
                <div class="ds-wizard-step done"><div class="ds-wizard-step-num"><i class="bi bi-check-lg"></i></div><span class="ds-wizard-step-label">Identitas</span></div>
                <div class="ds-wizard-line done"></div>
                <div class="ds-wizard-step done"><div class="ds-wizard-step-num"><i class="bi bi-check-lg"></i></div><span class="ds-wizard-step-label">Gejala</span></div>
                <div class="ds-wizard-line done"></div>
                <div class="ds-wizard-step done"><div class="ds-wizard-step-num"><i class="bi bi-check-lg"></i></div><span class="ds-wizard-step-label">Diagnosa</span></div>
                <div class="ds-wizard-line done"></div>
                <div class="ds-wizard-step active"><div class="ds-wizard-step-num">4</div><span class="ds-wizard-step-label">Hasil</span></div>
            </div>

            <div class="ds-result-header">
                <div style="margin-bottom:12px;">
                    <img src="<?= base_url('assets/images/illustrations/healthy-cat.svg') ?>" alt="" style="width:120px;height:120px;">
                </div>
                <div class="ds-result-icon"><i class="bi bi-clipboard-check"></i></div>
                <h2 style="font-family:var(--ds-font-heading);font-size:1.375rem;">Hasil Diagnosa</h2>
                <p style="color:var(--ds-text-muted);font-size:0.875rem;">DiagnosaKu — Sistem Pakar Diagnosa Penyakit Kucing</p>
            </div>

            <div class="ds-result-body">
                <div class="ds-patient-grid">
                    <div class="ds-patient-item"><i class="bi bi-person"></i><div><div class="ds-info-label">Pemilik</div><div class="ds-info-value"><?= $hasil->nama ?></div></div></div>
                    <div class="ds-patient-item"><i class="bi bi-envelope"></i><div><div class="ds-info-label">Email</div><div class="ds-info-value"><?= $hasil->email ?></div></div></div>
                    <div class="ds-patient-item"><i class="bi bi-tag"></i><div><div class="ds-info-label">Jenis</div><div class="ds-info-value"><?= $hasil->jenis ?></div></div></div>
                    <div class="ds-patient-item"><i class="bi bi-heart"></i><div><div class="ds-info-label">Nama Kucing</div><div class="ds-info-value"><?= $hasil->namakucing ?></div></div></div>
                </div>

                <div class="ds-mb-3">
                    <h6 style="font-weight:600;color:var(--ds-text);margin-bottom:12px;"><i class="bi bi-activity me-1" style="color:var(--ds-primary);"></i> Penyakit Terdeteksi</h6>
                    <div style="padding:16px 20px;border:1px solid rgba(200,205,208,0.4);border-radius:var(--ds-radius-sm);">
                        <div style="font-family:var(--ds-font-heading);font-size:1.125rem;font-weight:700;color:var(--ds-primary);margin-bottom:12px;"><?= $hasil->penyakit ?></div>
                        <?php
                            $confClass = 'low';
                            if ($hasil->persentase > 60) $confClass = 'high';
                            elseif ($hasil->persentase >= 30) $confClass = 'medium';
                        ?>
                        <div class="d-flex justify-content-between ds-mb-1"><span style="font-size:0.8125rem;color:var(--ds-text-secondary);">Tingkat Kecocokan</span><strong><?= $hasil->persentase ?>%</strong></div>
                        <div class="ds-confidence-bar"><div class="ds-confidence-fill <?= $confClass ?>" style="width:<?= $hasil->persentase ?>%;"></div></div>
                    </div>
                </div>

                <div class="ds-solusi-box">
                    <h6><i class="bi bi-lightbulb me-1"></i> Solusi / Rekomendasi</h6>
                    <p style="font-size:0.875rem;color:var(--ds-text-secondary);line-height:1.7;margin:0;"><?= $hasil->solusi ?></p>
                </div>

                <?php if (!empty($gejala_dipilih)): ?>
                <div class="ds-mt-4">
                    <h6 style="font-weight:600;margin-bottom:10px;"><i class="bi bi-check-circle me-1" style="color:var(--ds-success);"></i> Gejala yang Dipilih</h6>
                    <?php foreach ($gejala_dipilih as $g): ?>
                    <div style="display:flex;align-items:center;gap:8px;padding:6px 0;border-bottom:1px solid rgba(200,205,208,0.2);font-size:0.875rem;">
                        <i class="bi bi-check-circle-fill" style="color:var(--ds-success);font-size:0.75rem;"></i>
                        <span style="font-weight:600;"><?= $g->kode_gejala ?> —</span> <?= $g->gejala ?>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="ds-result-footer">
                <a href="<?= base_url('konsultasi') ?>" class="ds-btn ds-btn-secondary" style="flex:1;justify-content:center;"><i class="bi bi-arrow-repeat"></i> Konsultasi Lagi</a>
                <a href="<?= base_url('hasil') ?>" class="ds-btn ds-btn-success" style="flex:1;justify-content:center;"><i class="bi bi-clock-history"></i> Riwayat</a>
            </div>
        </div>
        <div style="text-align:center;margin-top:20px;color:rgba(255,255,255,0.5);font-size:0.75rem;">
            <a href="<?= base_url('admin') ?>" style="color:rgba(255,255,255,0.6);text-decoration:none;"><i class="bi bi-arrow-left me-1"></i> Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
