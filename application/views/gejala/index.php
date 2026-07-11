<div class="ds-page-header ds-fade-in">
    <div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li><li class="breadcrumb-item">Data Master</li><li class="breadcrumb-item active">Gejala</li></ol></nav>
        <h2><?= $title ?></h2>
    </div>
    <div class="d-flex gap-2">
        <a href="<?= base_url('admin') ?>" class="ds-btn ds-btn-secondary"><i class="bi bi-arrow-left"></i> Dashboard</a>
        <a href="<?= base_url('gejala/tambah') ?>" class="ds-btn ds-btn-primary"><i class="bi bi-plus-lg"></i> Tambah</a>
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
                        <th>Nama Gejala</th>
                        <th class="ds-text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($gejala as $g): ?>
                    <tr>
                        <td class="ds-text-center"><?= $no++ ?></td>
                        <td class="ds-text-center"><span class="ds-badge ds-badge-primary"><?= $g->kode_gejala ?></span></td>
                        <td><?= $g->gejala ?></td>
                        <td class="ds-text-center">
                            <div class="ds-btn-group" style="justify-content:center;">
                                <a href="<?= base_url('gejala/ubah/' . $g->id_gejala) ?>" class="ds-btn ds-btn-success ds-btn-sm" title="Edit"><i class="bi bi-pen"></i></a>
                                <form action="<?= base_url('gejala/delete/' . $g->id_gejala) ?>" method="POST" class="d-inline">
                                    <button type="button" class="ds-btn ds-btn-danger ds-btn-sm btn-hapus" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php if (empty($gejala)): ?>
        <div class="ds-empty">
            <img src="<?= base_url('assets/images/cats/cat-stethoscope.svg') ?>" alt="" style="width:100px;height:100px;margin-bottom:12px;opacity:0.7;">
            <p>Tidak ada data gejala.</p>
            <a href="<?= base_url('gejala/tambah') ?>" class="ds-btn ds-btn-primary ds-btn-sm ds-mt-2"><i class="bi bi-plus-lg"></i> Tambah Gejala</a>
        </div>
        <?php endif; ?>
    </div>
</div>
