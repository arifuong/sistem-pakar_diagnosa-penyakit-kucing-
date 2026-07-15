<!-- Welcome Banner -->
<div class="ds-mb-4 ds-fade-in">
    <div class="ds-card" style="background:linear-gradient(135deg,var(--ds-primary) 0%,var(--ds-secondary) 100%);border:none;overflow:hidden;border-radius:var(--ds-radius-lg);">
        <div class="ds-card-body" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:20px;position:relative;padding:32px;">
            <div style="position:relative;z-index:1;max-width:60%;">
                <h2 style="font-family:var(--ds-font-heading);color:#fff;margin-bottom:8px;font-size:2rem;">Selamat Datang, <?= $this->session->userdata('nama_lengkap') ?>!</h2>
                <p style="color:rgba(255,255,255,0.9);margin-bottom:0;font-size:1rem;line-height:1.6;">
                    Sistem Pakar Diagnosa Penyakit Kucing dengan Metode <strong>Certainty Factor (CF)</strong>. 
                    Kelola basis pengetahuan (gejala, penyakit, rule), pantau riwayat konsultasi kucing, dan kelola akun pengguna sistem.
                </p>
            </div>
            <div style="position:relative;z-index:1;flex-shrink:0;">
                <svg width="120" height="120" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" style="opacity:0.95;">
                    <path d="M50 75c-4 0-8-6-8-14s4-14 8-14 8 6 8 14-4 14-8 14zm-16-22c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm32 0c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm-20-18c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8zm12 0c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8z" fill="white"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Stat Cards -->
<div class="ds-mb-4">
    <div class="row g-3">
        <div class="col-xl-2 col-md-4 col-6">
            <div class="ds-stat-card ds-fade-in">
                <div class="ds-stat-icon ds-stat-icon-primary" style="position:relative;background-color:rgba(244,162,97,0.1);color:var(--ds-primary);">
                    <i class="bi bi-virus2"></i>
                </div>
                <div class="ds-stat-info">
                    <div class="ds-stat-label">Penyakit</div>
                    <p class="ds-stat-value"><?= $jumlah_penyakit ?></p>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6">
            <div class="ds-stat-card ds-fade-in" style="animation-delay:0.05s;">
                <div class="ds-stat-icon ds-stat-icon-secondary" style="position:relative;background-color:rgba(233,196,106,0.1);color:#e0b234;">
                    <i class="bi bi-clipboard-pulse"></i>
                </div>
                <div class="ds-stat-info">
                    <div class="ds-stat-label">Gejala</div>
                    <p class="ds-stat-value"><?= $jumlah_gejala ?></p>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6">
            <div class="ds-stat-card ds-fade-in" style="animation-delay:0.1s;">
                <div class="ds-stat-icon" style="position:relative;background-color:rgba(42,157,143,0.1);color:var(--ds-accent);font-size:1.5rem;width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-diagram-3-fill"></i>
                </div>
                <div class="ds-stat-info">
                    <div class="ds-stat-label">Rule</div>
                    <p class="ds-stat-value"><?= $jumlah_rule ?></p>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6">
            <div class="ds-stat-card ds-fade-in" style="animation-delay:0.15s;">
                <div class="ds-stat-icon" style="position:relative;background-color:rgba(231,111,81,0.1);color:var(--ds-danger);font-size:1.5rem;width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-heart-pulse-fill"></i>
                </div>
                <div class="ds-stat-info">
                    <div class="ds-stat-label">Konsultasi</div>
                    <p class="ds-stat-value"><?= $jumlah_konsultasi ?></p>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6">
            <div class="ds-stat-card ds-fade-in" style="animation-delay:0.2s;">
                <div class="ds-stat-icon" style="position:relative;background-color:rgba(38,70,83,0.1);color:var(--ds-text);font-size:1.5rem;width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-cat"></i>
                </div>
                <div class="ds-stat-info">
                    <div class="ds-stat-label">Jenis Kucing</div>
                    <p class="ds-stat-value"><?= $jumlah_jenis ?></p>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6">
            <div class="ds-stat-card ds-fade-in" style="animation-delay:0.25s;">
                <div class="ds-stat-icon" style="position:relative;background-color:rgba(13,110,253,0.1);color:#0d6efd;font-size:1.5rem;width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div class="ds-stat-info">
                    <div class="ds-stat-label">Pengguna</div>
                    <p class="ds-stat-value"><?= $jumlah_pengguna ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts -->
<div class="ds-mb-4">
    <div class="row g-3">
        <div class="col-lg-8">
            <div class="ds-card ds-fade-in" style="animation-delay:0.3s;border-radius:var(--ds-radius);">
                <div class="ds-card-header" style="font-family:var(--ds-font-body);font-weight:600;"><i class="bi bi-bar-chart me-1"></i> Penyakit Terdiagnosa Terbanyak</div>
                <div class="ds-card-body">
                    <?php if (!empty($chart_labels)): ?>
                        <div class="ds-chart-container" style="height:300px;position:relative;"><canvas id="chartDiagnosa"></canvas></div>
                    <?php else: ?>
                        <div class="ds-empty" style="text-align:center;padding:40px 0;">
                            <svg width="64" height="64" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" style="opacity:0.3;margin-bottom:12px;">
                                <circle cx="50" cy="50" r="40" stroke="var(--ds-text)" stroke-width="6"/>
                                <path d="M50 30v30M50 70h.01" stroke="var(--ds-text)" stroke-width="6" stroke-linecap="round"/>
                            </svg>
                            <p style="color:var(--ds-text-muted);">Belum ada data diagnosa penyakit</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ds-card ds-fade-in" style="animation-delay:0.35s;border-radius:var(--ds-radius);">
                <div class="ds-card-header" style="font-family:var(--ds-font-body);font-weight:600;"><i class="bi bi-pie-chart me-1"></i> Distribusi Jenis Kucing</div>
                <div class="ds-card-body">
                    <?php if (!empty($pie_labels)): ?>
                        <div class="ds-chart-container" style="height:300px;position:relative;"><canvas id="chartPie"></canvas></div>
                    <?php else: ?>
                        <div class="ds-empty" style="text-align:center;padding:40px 0;">
                            <svg width="64" height="64" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" style="opacity:0.3;margin-bottom:12px;">
                                <circle cx="50" cy="50" r="40" stroke="var(--ds-text)" stroke-width="6"/>
                                <path d="M50 30v30M50 70h.01" stroke="var(--ds-text)" stroke-width="6" stroke-linecap="round"/>
                            </svg>
                            <p style="color:var(--ds-text-muted);">Belum ada data konsultasi jenis kucing</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Consultations -->
<div class="ds-mb-4">
    <div class="ds-card ds-fade-in" style="animation-delay:0.4s;border-radius:var(--ds-radius);">
        <div class="ds-card-header d-flex justify-content-between align-items-center" style="font-family:var(--ds-font-body);font-weight:600;">
            <span><i class="bi bi-clock-history me-1"></i> Konsultasi Terbaru</span>
            <a href="<?= base_url('hasil') ?>" class="btn btn-sm btn-outline-secondary" style="border-radius:var(--ds-radius-sm);">Lihat Semua</a>
        </div>
        <div class="ds-card-body">
            <?php if (!empty($konsultasi_terbaru)): ?>
            <div class="table-responsive">
                <table class="ds-table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pemilik</th>
                            <th>Nama Kucing</th>
                            <th>Jenis Kucing</th>
                            <th>Hasil Diagnosa</th>
                            <th>Tingkat Keyakinan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($konsultasi_terbaru as $k): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td class="fw-medium"><?= htmlspecialchars($k->nama_pemilik) ?></td>
                            <td><?= htmlspecialchars($k->nama_kucing) ?></td>
                            <td><?= htmlspecialchars($k->jenis_kucing) ?></td>
                            <td>
                                <?php if ($k->nama_penyakit): ?>
                                    <span class="ds-badge" style="background-color:rgba(244,162,97,0.15);color:var(--ds-primary);font-weight:600;"><?= htmlspecialchars($k->nama_penyakit) ?></span>
                                <?php else: ?>
                                    <span class="ds-badge bg-secondary text-white">Tidak Diketahui</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($k->cf_persentase): ?>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="progress flex-grow-1" style="height: 6px; width: 60px; border-radius:3px;">
                                            <div class="progress-bar bg-success" style="width: <?= $k->cf_persentase ?>%"></div>
                                        </div>
                                        <span class="fw-semibold text-success"><?= $k->cf_persentase ?>%</span>
                                    </div>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                            <td><?= date('d M Y, H:i', strtotime($k->tanggal)) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <div class="ds-empty" style="text-align:center;padding:40px 0;">
                    <svg width="64" height="64" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" style="opacity:0.3;margin-bottom:12px;">
                        <rect x="20" y="15" width="60" height="70" rx="8" stroke="var(--ds-text)" stroke-width="6"/>
                        <path d="M35 35h30M35 50h30M35 65h15" stroke="var(--ds-text)" stroke-width="6" stroke-linecap="round"/>
                    </svg>
                    <p style="color:var(--ds-text-muted);">Belum ada riwayat konsultasi kucing</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
