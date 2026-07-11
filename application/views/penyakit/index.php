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
                        <th>Solusi</th>
                        <th class="ds-text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($penyakit as $p): ?>
                    <tr>
                        <td class="ds-text-center"><?= $no++ ?></td>
                        <td class="ds-text-center"><span class="ds-badge ds-badge-secondary"><?= $p->kode_penyakit ?></span></td>
                        <td><?= $p->penyakit ?></td>
                        <td><?= strlen($p->solusi) > 80 ? substr($p->solusi, 0, 80) . '...' : $p->solusi ?></td>
                        <td class="ds-text-center">
                            <div class="ds-btn-group" style="justify-content:center;">
                                <a href="<?= base_url('penyakit/ubah/' . $p->id_penyakit) ?>" class="ds-btn ds-btn-success ds-btn-sm" title="Edit"><i class="bi bi-pen"></i></a>
                                <form action="<?= base_url('penyakit/delete/' . $p->id_penyakit) ?>" method="POST" class="d-inline">
                                    <button type="button" class="ds-btn ds-btn-danger ds-btn-sm btn-hapus" title="Hapus"><i class="bi bi-trash"></i></button>
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
            <img src="<?= base_url('assets/images/cats/cat-clipboard.svg') ?>" alt="" style="width:100px;height:100px;margin-bottom:12px;opacity:0.7;">
            <p>Tidak ada data penyakit.</p>
            <a href="<?= base_url('penyakit/tambah') ?>" class="ds-btn ds-btn-primary ds-btn-sm ds-mt-2"><i class="bi bi-plus-lg"></i> Tambah Penyakit</a>
        </div>
        <?php endif; ?>
    </div>
</div>
