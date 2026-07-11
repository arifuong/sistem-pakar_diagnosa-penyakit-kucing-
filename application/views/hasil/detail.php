<div class="ds-page-header ds-fade-in">
    <div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li><li class="breadcrumb-item"><a href="<?= base_url('hasil') ?>">Riwayat</a></li><li class="breadcrumb-item active">Detail</li></ol></nav>
        <h2><?= $title ?></h2>
    </div>
    <div style="display:flex;align-items:center;gap:16px;">
        <img src="<?= base_url('assets/images/illustrations/healthy-cat.svg') ?>" alt="" style="width:64px;height:64px;opacity:0.7;">
        <a href="<?= base_url('hasil') ?>" class="ds-btn ds-btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>
</div>

<div class="ds-card ds-mb-4 ds-fade-in">
    <div class="ds-card-header"><i class="bi bi-person-circle me-1"></i> Info Pasien</div>
    <div class="ds-card-body">
        <div class="row g-3">
            <div class="col-md-4"><div class="ds-mb-3"><small class="text-muted d-block">Nama Pemilik</small><strong><?= $hasil->nama_pemilik ?></strong></div></div>
            <div class="col-md-4"><div class="ds-mb-3"><small class="text-muted d-block">Email</small><strong><?= $hasil->email ?></strong></div></div>
            <div class="col-md-4"><div class="ds-mb-3"><small class="text-muted d-block">Nama Kucing</small><strong><?= $hasil->nama_kucing ?></strong></div></div>
            <div class="col-md-4"><div class="ds-mb-3"><small class="text-muted d-block">Jenis Kucing</small><strong><?= $hasil->nama_jenis ?></strong></div></div>
            <div class="col-md-4"><div><small class="text-muted d-block">Tanggal Konsultasi</small><strong><?= date('d M Y H:i', strtotime($hasil->created_at)) ?></strong></div></div>
        </div>
    </div>
</div>

<div class="ds-card ds-mb-4 ds-fade-in">
    <div class="ds-card-header" style="background:linear-gradient(135deg,var(--ds-primary),var(--ds-secondary));color:#fff;">
        <i class="bi bi-clipboard2-pulse me-1"></i> Hasil Diagnosa
    </div>
    <div class="ds-card-body">
        <h4 class="ds-mb-3"><?= $hasil->hasil_penyakit ?></h4>
        <?php $pct = floatval($hasil->persentase); if ($pct > 60) $bc = 'bg-success'; elseif ($pct >= 30) $bc = 'bg-warning'; else $bc = 'bg-danger'; ?>
        <div class="ds-mb-3">
            <div class="d-flex justify-content-between ds-mb-1"><span>Tingkat Kepercayaan</span><strong><?= number_format($pct, 1) ?>%</strong></div>
            <div class="progress" style="height:10px;border-radius:5px;"><div class="progress-bar <?= $bc ?>" style="width:<?= $pct ?>%;border-radius:5px;"></div></div>
        </div>
        <?php if (!empty($hasil->solusi)): ?>
        <div class="ds-solusi-box ds-mt-3">
            <h6><i class="bi bi-lightbulb me-1"></i> Solusi / Penanganan</h6>
            <p class="ds-mb-0" style="line-height:1.7;color:#555;"><?= nl2br($hasil->solusi) ?></p>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php if (!empty($gejala_dipilih)): ?>
<div class="ds-card ds-fade-in">
    <div class="ds-card-header"><i class="bi bi-clipboard-check me-1"></i> Gejala yang Dipilih</div>
    <div class="ds-card-body">
        <div class="table-responsive">
            <table class="ds-table" style="width:100%">
                <thead><tr><th width="50px">No</th><th>Kode Gejala</th><th>Gejala</th></tr></thead>
                <tbody>
                    <?php foreach ($gejala_dipilih as $i => $g): ?>
                    <tr>
                        <td><i class="bi bi-check-circle-fill text-success"></i> <?= $i + 1 ?></td>
                        <td><span class="ds-badge ds-badge-success"><?= $g->kode_gejala ?></span></td>
                        <td><?= $g->gejala ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endif; ?>
