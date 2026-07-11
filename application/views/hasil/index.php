<div class="ds-page-header ds-fade-in">
    <div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li><li class="breadcrumb-item active">Riwayat Diagnosa</li></ol></nav>
        <h2><?= $title ?></h2>
    </div>
    <a href="<?= base_url('admin') ?>" class="ds-btn ds-btn-secondary"><i class="bi bi-arrow-left"></i> Dashboard</a>
</div>

<div class="ds-card ds-fade-in">
    <div class="ds-card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-clock-history me-1"></i> Riwayat Konsultasi</span>
    </div>
    <div class="ds-card-body">
        <?php if (!empty($riwayat)): ?>
        <div class="table-responsive">
            <table class="ds-datatable ds-table" id="riwayatTable" style="width:100%">
                <thead>
                    <tr>
                        <th class="ds-text-center" width="5%">No</th>
                        <th>Nama Pemilik</th>
                        <th>Email</th>
                        <th>Nama Kucing</th>
                        <th>Jenis</th>
                        <th>Hasil Diagnosa</th>
                        <th class="ds-text-center">Persentase</th>
                        <th>Tanggal</th>
                        <th class="ds-text-center" width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($riwayat as $i => $r): ?>
                    <tr>
                        <td class="ds-text-center"><?= $i + 1 ?></td>
                        <td><?= $r->nama_pemilik ?></td>
                        <td><?= $r->email ?></td>
                        <td><?= $r->nama_kucing ?></td>
                        <td><?= $r->nama_jenis ?></td>
                        <td><span class="ds-badge ds-badge-primary"><?= $r->hasil_penyakit ?></span></td>
                        <td class="ds-text-center">
                            <?php
                            $pct = floatval($r->persentase);
                            if ($pct > 60) $bc = 'ds-badge-success';
                            elseif ($pct >= 30) $bc = 'ds-badge-warning';
                            else $bc = 'ds-badge-danger';
                            ?>
                            <span class="ds-badge <?= $bc ?>"><?= number_format($pct, 1) ?>%</span>
                        </td>
                        <td><?= date('d M Y H:i', strtotime($r->created_at)) ?></td>
                        <td class="ds-text-center">
                            <a href="<?= base_url('hasil/detail/' . $r->id) ?>" class="ds-btn ds-btn-primary ds-btn-sm" title="Detail"><i class="bi bi-eye"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="ds-empty">
            <img src="<?= base_url('assets/images/cats/cat-healthy.svg') ?>" alt="" style="width:100px;height:100px;margin-bottom:12px;opacity:0.7;">
            <p>Belum ada riwayat konsultasi</p>
            <a href="<?= base_url('konsultasi') ?>" class="ds-btn ds-btn-primary ds-btn-sm ds-mt-2"><i class="bi bi-heart-pulse"></i> Mulai Konsultasi</a>
        </div>
        <?php endif; ?>
    </div>
</div>
