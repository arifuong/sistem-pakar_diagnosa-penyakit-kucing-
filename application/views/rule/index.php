<div class="ds-page-header ds-fade-in">
    <div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li><li class="breadcrumb-item">Data Master</li><li class="breadcrumb-item active">Rule</li></ol></nav>
        <h2><?= $title ?></h2>
    </div>
    <div class="d-flex gap-2">
        <a href="<?= base_url('admin') ?>" class="ds-btn ds-btn-secondary"><i class="bi bi-arrow-left"></i> Dashboard</a>
        <a href="<?= base_url('rule/tambah') ?>" class="ds-btn ds-btn-primary"><i class="bi bi-plus-lg"></i> Tambah</a>
    </div>
</div>

<div class="ds-card ds-fade-in">
    <div class="ds-card-body">
        <?php if (!empty($rule)): ?>
        <div class="table-responsive">
            <table class="ds-datatable ds-table" style="width:100%">
                <thead>
                    <tr>
                        <th class="ds-text-center" width="5%">No</th>
                        <th>Penyakit</th>
                        <th>Gejala</th>
                        <th class="ds-text-center" width="10%">MB</th>
                        <th class="ds-text-center" width="10%">MD</th>
                        <th class="ds-text-center" width="12%">CF Pakar</th>
                        <th class="ds-text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($rule as $r): ?>
                    <tr>
                        <td class="ds-text-center"><?= $no++ ?></td>
                        <td>
                            <span class="ds-badge ds-badge-secondary"><?= $r->kode_penyakit ?></span>
                            <span class="fw-semibold ms-1"><?= htmlspecialchars($r->nama_penyakit) ?></span>
                        </td>
                        <td>
                            <span class="ds-badge ds-badge-primary"><?= $r->kode_gejala ?></span>
                            <span class="ms-1"><?= htmlspecialchars($r->nama_gejala) ?></span>
                        </td>
                        <td class="ds-text-center fw-medium text-success"><?= $r->mb ?></td>
                        <td class="ds-text-center fw-medium text-danger"><?= $r->md ?></td>
                        <td class="ds-text-center fw-bold text-primary"><?= $r->cf_pakar ?></td>
                        <td class="ds-text-center">
                            <div class="ds-btn-group" style="justify-content:center;">
                                <a href="<?= base_url('rule/ubah/' . $r->id_rule) ?>" class="ds-btn ds-btn-success ds-btn-sm" title="Edit"><i class="bi bi-pen"></i></a>
                                <form action="<?= base_url('rule/delete/' . $r->id_rule) ?>" method="POST" class="d-inline">
                                    <button type="submit" class="ds-btn ds-btn-danger ds-btn-sm btn-hapus" title="Hapus"><i class="bi bi-trash"></i></button>
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
            <p>Belum ada data rule.</p>
            <a href="<?= base_url('rule/tambah') ?>" class="ds-btn ds-btn-primary ds-btn-sm ds-mt-2"><i class="bi bi-plus-lg"></i> Tambah Rule</a>
        </div>
        <?php endif; ?>
    </div>
</div>

