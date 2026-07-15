<div class="ds-page-header ds-fade-in">
    <div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li><li class="breadcrumb-item active">Riwayat Diagnosa</li></ol></nav>
        <h2><?= $title ?></h2>
    </div>
    <a href="<?= base_url('admin') ?>" class="ds-btn ds-btn-secondary"><i class="bi bi-arrow-left"></i> Dashboard</a>
</div>

<div class="ds-card ds-fade-in">
    <div class="ds-card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-clock-history me-1"></i> Riwayat Konsultasi Pemilik Kucing</span>
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
                        <th>Breed / Jenis</th>
                        <th>Hasil Diagnosa Utama</th>
                        <th class="ds-text-center">Persentase</th>
                        <th>Tanggal</th>
                        <th class="ds-text-center" width="12%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($riwayat as $r): ?>
                    <tr>
                        <td class="ds-text-center"><?= $no++ ?></td>
                        <td><?= htmlspecialchars($r->nama_pemilik) ?></td>
                        <td><?= htmlspecialchars($r->email) ?></td>
                        <td><?= htmlspecialchars($r->nama_kucing) ?></td>
                        <td><?= htmlspecialchars($r->jenis_kucing) ?></td>
                        <td>
                            <span class="ds-badge ds-badge-secondary"><?= $r->kode_penyakit ?></span>
                            <span class="fw-semibold ms-1"><?= htmlspecialchars($r->nama_penyakit) ?></span>
                        </td>
                        <td class="ds-text-center">
                            <?php
                            $pct = floatval($r->cf_persentase);
                            if ($pct > 70) $bc = 'ds-badge-success';
                            elseif ($pct >= 40) $bc = 'ds-badge-warning';
                            else $bc = 'ds-badge-danger';
                            ?>
                            <span class="ds-badge <?= $bc ?>"><?= number_format($pct, 1) ?>%</span>
                        </td>
                        <td><?= date('d M Y H:i', strtotime($r->tanggal)) ?></td>
                        <td class="ds-text-center">
                            <div class="ds-btn-group" style="justify-content:center;">
                                <a href="<?= base_url('hasil/detail/' . $r->id_konsultasi) ?>" class="ds-btn ds-btn-primary ds-btn-sm" title="Detail"><i class="bi bi-eye"></i></a>
                                <form action="<?= base_url('hasil/delete/' . $r->id_konsultasi) ?>" method="POST" class="d-inline">
                                    <button type="submit" class="ds-btn ds-btn-danger ds-btn-sm btn-delete" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="ds-empty">
            <svg width="64" height="64" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-2 opacity-50">
                <path d="M50 75c-4 0-8-6-8-14s4-14 8-14 8 6 8 14-4 14-8 14zm-16-22c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm32 0c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm-20-18c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8zm12 0c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8z" fill="var(--ds-primary)"/>
            </svg>
            <p>Belum ada riwayat konsultasi.</p>
            <a href="<?= base_url('konsultasi') ?>" class="ds-btn ds-btn-primary ds-btn-sm ds-mt-2"><i class="bi bi-heart-pulse"></i> Mulai Konsultasi</a>
        </div>
        <?php endif; ?>
    </div>
</div>

