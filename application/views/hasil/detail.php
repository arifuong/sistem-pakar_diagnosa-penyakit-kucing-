<div class="ds-page-header ds-fade-in">
    <div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li><li class="breadcrumb-item"><a href="<?= base_url('hasil') ?>">Riwayat</a></li><li class="breadcrumb-item active">Detail</li></ol></nav>
        <h2><?= $title ?></h2>
    </div>
    <div style="display:flex;align-items:center;gap:16px;">
        <a href="<?= base_url('hasil') ?>" class="ds-btn ds-btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>
</div>

<!-- Info Pasien Card -->
<div class="ds-card ds-mb-4 ds-fade-in">
    <div class="ds-card-header"><i class="bi bi-person-circle me-1"></i> Info Profil Pemilik & Kucing</div>
    <div class="ds-card-body">
        <div class="row g-3">
            <div class="col-md-4"><div class="ds-mb-3"><small class="text-muted d-block">Nama Pemilik</small><strong><?= htmlspecialchars($konsultasi->nama_pemilik) ?></strong></div></div>
            <div class="col-md-4"><div class="ds-mb-3"><small class="text-muted d-block">Email Pemilik</small><strong><?= htmlspecialchars($konsultasi->email) ?></strong></div></div>
            <div class="col-md-4"><div class="ds-mb-3"><small class="text-muted d-block">Nama Kucing</small><strong><?= htmlspecialchars($konsultasi->nama_kucing) ?></strong></div></div>
            <div class="col-md-4"><div class="ds-mb-3"><small class="text-muted d-block">Breed / Ras Kucing</small><strong><?= htmlspecialchars($konsultasi->jenis_kucing) ?></strong></div></div>
            <div class="col-md-4"><div><small class="text-muted d-block">Tanggal & Waktu Konsultasi</small><strong><?= date('d M Y, H:i', strtotime($konsultasi->tanggal)) ?></strong></div></div>
        </div>
    </div>
</div>

<?php if (empty($diagnosa)): ?>
    <div class="alert alert-warning ds-fade-in" style="border-radius: var(--ds-radius-sm);">
        <i class="bi bi-exclamation-triangle-fill me-2"></i> Tidak dapat menentukan diagnosis untuk gejala terpilih.
    </div>
<?php else: $primary = $diagnosa[0]; ?>
    <!-- Hasil Diagnosa Card -->
    <div class="ds-card ds-mb-4 ds-fade-in" style="border-top: 4px solid var(--ds-primary) !important;">
        <div class="ds-card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-clipboard2-pulse me-1"></i> Hasil Diagnosa Utama</span>
            <span class="badge bg-danger"><?= $primary->kode_penyakit ?></span>
        </div>
        <div class="ds-card-body">
            <h3 class="fw-bold mb-3" style="font-family:'Poppins', sans-serif;"><?= htmlspecialchars($primary->nama_penyakit) ?></h3>
            
            <?php 
                $pct = floatval($primary->cf_persentase); 
                if ($pct > 70) $bc = 'bg-success'; 
                elseif ($pct >= 40) $bc = 'bg-warning'; 
                else $bc = 'bg-danger'; 
            ?>
            <div class="ds-mb-4">
                <div class="d-flex justify-content-between ds-mb-1"><span class="small text-muted">Tingkat Keyakinan Certainty Factor</span><strong><?= number_format($pct, 1) ?>%</strong></div>
                <div class="progress" style="height:10px;border-radius:5px;"><div class="progress-bar <?= $bc ?>" style="width:<?= $pct ?>%;border-radius:5px;"></div></div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-3 h-100" style="border-left:3px solid var(--ds-primary);">
                        <h6 class="fw-bold"><i class="bi bi-journal-text"></i> Definisi Klinis</h6>
                        <p class="mb-0 text-sm" style="line-height:1.6; text-align:justify;"><?= htmlspecialchars($primary->definisi) ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-3 h-100" style="border-left:3px solid var(--ds-primary);">
                        <h6 class="fw-bold"><i class="bi bi-bug"></i> Penyebab Utama</h6>
                        <p class="mb-0 text-sm" style="line-height:1.6; text-align:justify;"><?= htmlspecialchars($primary->penyebab) ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-3 h-100" style="border-left:3px solid var(--ds-accent);">
                        <h6 class="fw-bold text-success"><i class="bi bi-activity"></i> Solusi Medis Awal</h6>
                        <p class="mb-0 text-sm" style="line-height:1.6; text-align:justify;"><?= htmlspecialchars($primary->solusi) ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-3 h-100" style="border-left:3px solid var(--ds-danger);">
                        <h6 class="fw-bold text-danger"><i class="bi bi-shield-plus"></i> Langkah Pencegahan</h6>
                        <p class="mb-0 text-sm" style="line-height:1.6; text-align:justify;"><?= htmlspecialchars($primary->pencegahan) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gejala Terpilih Card -->
    <div class="ds-card ds-mb-4 ds-fade-in">
        <div class="ds-card-header"><i class="bi bi-clipboard-check me-1"></i> Gejala Terpilih & Keyakinan Pemilik (CF User)</div>
        <div class="ds-card-body">
            <div class="table-responsive">
                <table class="ds-table" style="width:100%; font-size:0.875rem;">
                    <thead>
                        <tr>
                            <th width="80">No</th>
                            <th width="120">Kode Gejala</th>
                            <th>Nama Gejala</th>
                            <th class="ds-text-center" width="200">Keyakinan Pemilik</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($gejala_terpilih as $gt): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><span class="ds-badge ds-badge-success"><?= $gt->kode_gejala ?></span></td>
                            <td class="fw-medium"><?= htmlspecialchars($gt->nama_gejala) ?></td>
                            <td class="ds-text-center fw-semibold text-primary"><?= $gt->cf_user ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Alternatif Penyakit Card -->
    <?php if (count($diagnosa) > 1): ?>
    <div class="ds-card ds-fade-in">
        <div class="ds-card-header"><i class="bi bi-layers me-1"></i> Kemungkinan Penyakit Lain</div>
        <div class="ds-card-body">
            <div class="row g-3">
                <?php for ($i = 1; $i < count($diagnosa); $i++): $alt = $diagnosa[$i]; ?>
                <div class="col-md-6">
                    <div class="p-3 border rounded-3 bg-light d-flex align-items-center justify-content-between">
                        <div>
                            <span class="badge bg-secondary mb-1"><?= $alt->kode_penyakit ?></span>
                            <h6 class="fw-bold mb-0"><?= htmlspecialchars($alt->nama_penyakit) ?></h6>
                        </div>
                        <div class="text-end">
                            <span class="fw-bold text-success" style="font-size:1.1rem;"><?= $alt->cf_persentase ?>%</span>
                            <div class="progress" style="height: 4px; width: 60px; border-radius:2px;">
                                <div class="progress-bar bg-success" style="width: <?= $alt->cf_persentase ?>%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>
