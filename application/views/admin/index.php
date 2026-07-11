<!-- Welcome Banner -->
<div class="ds-mb-4 ds-fade-in">
    <div class="ds-card" style="background:linear-gradient(135deg,var(--ds-primary) 0%,var(--ds-secondary) 100%);border:none;overflow:hidden;">
        <div class="ds-card-body" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:20px;position:relative;">
            <div style="position:relative;z-index:1;max-width:55%;">
                <h2 style="font-family:var(--ds-font-heading);color:#fff;margin-bottom:6px;">Selamat Datang, Admin!</h2>
                <p style="color:rgba(255,255,255,0.8);margin-bottom:0;font-size:0.9375rem;">Sistem Pakar Diagnosa Penyakit Kucing — Metode Forward Chaining</p>
            </div>
            <div style="position:relative;z-index:1;flex-shrink:0;">
                <img src="<?= base_url('assets/images/illustrations/dashboard-cat.svg') ?>" alt="Dokter Hewan dengan 2 Kucing" style="width:100%;max-width:340px;height:auto;border-radius:12px;">
            </div>
        </div>
    </div>
</div>

<!-- Stat Cards -->
<div class="ds-mb-4">
    <div class="row g-3">
        <div class="col-xl col-md-4 col-6">
            <div class="ds-stat-card ds-fade-in">
                <div class="ds-stat-icon ds-stat-icon-primary" style="position:relative;">
                    <i class="bi bi-clipboard2-pulse"></i>
                    <img src="<?= base_url('assets/images/cats/cat-paw.svg') ?>" alt="" style="position:absolute;bottom:-4px;right:-4px;width:18px;height:18px;opacity:0.3;">
                </div>
                <div class="ds-stat-info">
                    <div class="ds-stat-label">Penyakit</div>
                    <p class="ds-stat-value"><?= $jumlah_penyakit ?></p>
                </div>
            </div>
        </div>
        <div class="col-xl col-md-4 col-6">
            <div class="ds-stat-card ds-fade-in" style="animation-delay:0.05s;">
                <div class="ds-stat-icon ds-stat-icon-secondary" style="position:relative;">
                    <i class="bi bi-clipboard2-data"></i>
                    <img src="<?= base_url('assets/images/cats/cat-paw.svg') ?>" alt="" style="position:absolute;bottom:-4px;right:-4px;width:18px;height:18px;opacity:0.3;">
                </div>
                <div class="ds-stat-info">
                    <div class="ds-stat-label">Gejala</div>
                    <p class="ds-stat-value"><?= $jumlah_gejala ?></p>
                </div>
            </div>
        </div>
        <div class="col-xl col-md-4 col-6">
            <div class="ds-stat-card ds-fade-in" style="animation-delay:0.1s;">
                <div class="ds-stat-icon ds-stat-icon-success" style="position:relative;">
                    <i class="bi bi-diagram-3"></i>
                    <img src="<?= base_url('assets/images/cats/cat-paw.svg') ?>" alt="" style="position:absolute;bottom:-4px;right:-4px;width:18px;height:18px;opacity:0.3;">
                </div>
                <div class="ds-stat-info">
                    <div class="ds-stat-label">Rule</div>
                    <p class="ds-stat-value"><?= $jumlah_rule ?></p>
                </div>
            </div>
        </div>
        <div class="col-xl col-md-4 col-6">
            <div class="ds-stat-card ds-fade-in" style="animation-delay:0.15s;">
                <div class="ds-stat-icon ds-stat-icon-warning" style="position:relative;">
                    <i class="bi bi-heart-pulse"></i>
                    <img src="<?= base_url('assets/images/cats/cat-paw.svg') ?>" alt="" style="position:absolute;bottom:-4px;right:-4px;width:18px;height:18px;opacity:0.3;">
                </div>
                <div class="ds-stat-info">
                    <div class="ds-stat-label">Konsultasi</div>
                    <p class="ds-stat-value"><?= $jumlah_konsultasi ?></p>
                </div>
            </div>
        </div>
        <div class="col-xl col-md-4 col-6">
            <div class="ds-stat-card ds-fade-in" style="animation-delay:0.2s;">
                <div class="ds-stat-icon ds-stat-icon-accent" style="position:relative;">
                    <img src="<?= base_url('assets/images/cats/cat-logo.svg') ?>" alt="" style="width:24px;height:24px;">
                    <img src="<?= base_url('assets/images/cats/cat-paw.svg') ?>" alt="" style="position:absolute;bottom:-4px;right:-4px;width:18px;height:18px;opacity:0.3;">
                </div>
                <div class="ds-stat-info">
                    <div class="ds-stat-label">Jenis Kucing</div>
                    <p class="ds-stat-value"><?= $jumlah_jenis ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts -->
<div class="ds-mb-4">
    <div class="row g-3">
        <div class="col-lg-8">
            <div class="ds-card ds-fade-in" style="animation-delay:0.25s;">
                <div class="ds-card-header"><i class="bi bi-bar-chart me-1"></i> Diagnosa Terbanyak</div>
                <div class="ds-card-body">
                    <?php if (!empty($chart_labels)): ?>
                        <div class="ds-chart-container"><canvas id="chartDiagnosa"></canvas></div>
                    <?php else: ?>
                        <div class="ds-empty">
                            <img src="<?= base_url('assets/images/cats/cat-clipboard.svg') ?>" alt="" style="width:80px;height:80px;margin-bottom:12px;opacity:0.6;">
                            <p>Belum ada data diagnosa</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ds-card ds-fade-in" style="animation-delay:0.3s;">
                <div class="ds-card-header"><i class="bi bi-pie-chart me-1"></i> Distribusi Jenis Kucing</div>
                <div class="ds-card-body">
                    <?php if (!empty($pie_labels)): ?>
                        <div class="ds-chart-container"><canvas id="chartPie"></canvas></div>
                    <?php else: ?>
                        <div class="ds-empty">
                            <img src="<?= base_url('assets/images/cats/cat-diagnosis.svg') ?>" alt="" style="width:80px;height:80px;margin-bottom:12px;opacity:0.6;">
                            <p>Belum ada data</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Consultations -->
<div class="ds-mb-4">
    <div class="ds-card ds-fade-in" style="animation-delay:0.35s;">
        <div class="ds-card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-clock-history me-1"></i> Konsultasi Terbaru</span>
            <a href="<?= base_url('hasil') ?>" class="ds-btn ds-btn-sm ds-btn-secondary">Lihat Semua</a>
        </div>
        <div class="ds-card-body">
            <?php if (!empty($konsultasi_terbaru)): ?>
            <div class="table-responsive">
                <table class="ds-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pemilik</th>
                            <th>Kucing</th>
                            <th>Jenis</th>
                            <th>Hasil</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($konsultasi_terbaru as $k): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $k->nama_pemilik ?></td>
                            <td><?= $k->nama_kucing ?></td>
                            <td><?= $k->nama_jenis ?? '-' ?></td>
                            <td><span class="ds-badge ds-badge-primary"><?= $k->hasil_penyakit ?></span></td>
                            <td><?= date('d M Y', strtotime($k->created_at)) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
                <div class="ds-empty">
                    <img src="<?= base_url('assets/images/cats/cat-folder.svg') ?>" alt="" style="width:80px;height:80px;margin-bottom:12px;opacity:0.6;">
                    <p>Belum ada konsultasi</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
