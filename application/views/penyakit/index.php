<div class="ds-page-header ds-fade-in">
    <div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li><li class="breadcrumb-item">Data Master</li><li class="breadcrumb-item active">Penyakit</li></ol></nav>
        <h2><?= $title ?></h2>
    </div>
    <div class="d-flex gap-2">
        <a href="<?= base_url('admin') ?>" class="ds-btn ds-btn-secondary"><i class="bi bi-arrow-left"></i> Dashboard</a>
        <a href="<?= base_url('penyakit/tambah') ?>" class="ds-btn ds-btn-primary"><i class="bi bi-plus-lg"></i> Tambah</a>
    </div>
</div>

<div class="ds-card ds-fade-in">
    <div class="ds-card-body">
        <div class="table-responsive">
            <table class="ds-datatable ds-table" style="width:100%">
                <thead>
                    <tr>
                        <th class="ds-text-center" width="5%">No</th>
                        <th class="ds-text-center" width="12%">Kode</th>
                        <th>Nama Penyakit</th>
                        <th>Definisi</th>
                        <th>Penyebab</th>
                        <th>Solusi Utama</th>
                        <th class="ds-text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($penyakit as $p): ?>
                    <tr>
                        <td class="ds-text-center"><?= $no++ ?></td>
                        <td class="ds-text-center"><span class="ds-badge ds-badge-secondary"><?= $p->kode_penyakit ?></span></td>
                        <td class="fw-semibold"><?= htmlspecialchars($p->nama_penyakit) ?></td>
                        <td><small class="text-truncate d-inline-block" style="max-width:200px;"><?= htmlspecialchars($p->definisi) ?></small></td>
                        <td><small class="text-truncate d-inline-block" style="max-width:150px;"><?= htmlspecialchars($p->penyebab) ?></small></td>
                        <td><small class="text-truncate d-inline-block" style="max-width:220px;"><?= htmlspecialchars($p->solusi) ?></small></td>
                        <td class="ds-text-center">
                            <div class="ds-btn-group" style="justify-content:center;">
                                <a href="<?= base_url('penyakit/ubah/' . $p->id_penyakit) ?>" class="ds-btn ds-btn-success ds-btn-sm" title="Edit"><i class="bi bi-pen"></i></a>
                                <form action="<?= base_url('penyakit/delete/' . $p->id_penyakit) ?>" method="POST" class="d-inline">
                                    <button type="submit" class="ds-btn ds-btn-danger ds-btn-sm btn-hapus" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php if (empty($penyakit)): ?>
        <div class="ds-empty">
            <svg width="64" height="64" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-2 opacity-50">
                <path d="M50 75c-4 0-8-6-8-14s4-14 8-14 8 6 8 14-4 14-8 14zm-16-22c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm32 0c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm-20-18c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8zm12 0c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8z" fill="var(--ds-primary)"/>
            </svg>
            <p>Tidak ada data penyakit.</p>
            <a href="<?= base_url('penyakit/tambah') ?>" class="ds-btn ds-btn-primary ds-btn-sm ds-mt-2"><i class="bi bi-plus-lg"></i> Tambah Penyakit</a>
        </div>
        <?php endif; ?>
    </div>
</div>

