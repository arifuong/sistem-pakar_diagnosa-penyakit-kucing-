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
                        <th class="ds-text-center" width="12%">Kode Gejala</th>
                        <th>Gejala</th>
                        <th class="ds-text-center" width="12%">Parent</th>
                        <th class="ds-text-center" width="12%">Ya</th>
                        <th class="ds-text-center" width="12%">Tidak</th>
                        <th class="ds-text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($rule as $r): ?>
                    <tr>
                        <td class="ds-text-center"><?= $no++ ?></td>
                        <td class="ds-text-center"><span class="ds-badge ds-badge-primary"><?= $r->kode_gejala ?></span></td>
                        <td><?= $r->gejala ?></td>
                        <td class="ds-text-center"><?= $r->parent ? $r->parent : '-' ?></td>
                        <td class="ds-text-center"><?= $r->ya ?></td>
                        <td class="ds-text-center"><?= $r->tidak ?></td>
                        <td class="ds-text-center">
                            <div class="ds-btn-group" style="justify-content:center;">
                                <a href="<?= base_url('rule/ubah/' . $r->id) ?>" class="ds-btn ds-btn-success ds-btn-sm" title="Edit"><i class="bi bi-pen"></i></a>
                                <form action="<?= base_url('rule/delete/' . $r->id) ?>" method="POST" class="d-inline">
                                    <button type="button" class="ds-btn ds-btn-danger ds-btn-sm btn-delete" title="Hapus"><i class="bi bi-trash"></i></button>
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
            <img src="<?= base_url('assets/images/cats/cat-diagnosis.svg') ?>" alt="" style="width:100px;height:100px;margin-bottom:12px;opacity:0.7;">
            <p>Belum ada data rule</p>
            <a href="<?= base_url('rule/tambah') ?>" class="ds-btn ds-btn-primary ds-btn-sm ds-mt-2"><i class="bi bi-plus-lg"></i> Tambah Rule</a>
        </div>
        <?php endif; ?>
    </div>
</div>
