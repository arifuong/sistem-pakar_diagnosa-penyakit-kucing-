<div class="ds-page-header ds-fade-in">
    <div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li><li class="breadcrumb-item">Data Master</li><li class="breadcrumb-item active">Jenis Kucing</li></ol></nav>
        <h2><?= $title ?></h2>
    </div>
    <div class="d-flex gap-2">
        <a href="<?= base_url('admin') ?>" class="ds-btn ds-btn-secondary"><i class="bi bi-arrow-left"></i> Dashboard</a>
        <a href="<?= base_url('kucing/tambah_jenis') ?>" class="ds-btn ds-btn-primary"><i class="bi bi-plus-lg"></i> Tambah</a>
    </div>
</div>

<?php if (empty($jenis)): ?>
<div class="ds-card ds-fade-in">
    <div class="ds-empty">
        <img src="<?= base_url('assets/images/cats/maine-coon.svg') ?>" alt="" style="width:100px;height:100px;margin-bottom:12px;opacity:0.7;">
        <p>Belum ada data jenis kucing</p>
        <a href="<?= base_url('kucing/tambah_jenis') ?>" class="ds-btn ds-btn-primary ds-btn-sm ds-mt-2"><i class="bi bi-plus-lg"></i> Tambah Jenis</a>
    </div>
</div>
<?php else: ?>
<div class="ds-card ds-fade-in">
    <div class="ds-card-body">
        <div class="table-responsive">
            <table class="ds-datatable ds-table" style="width:100%">
                <thead>
                    <tr>
                        <th class="ds-text-center" width="5%">No</th>
                        <th>Nama Jenis</th>
                        <th class="ds-text-center" width="12%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($jenis as $j): ?>
                    <tr>
                        <td class="ds-text-center"><?= $no++ ?></td>
                        <td><?= $j->nama ?></td>
                        <td class="ds-text-center">
                            <form action="<?= base_url('kucing/delete/' . $j->id) ?>" method="POST" class="d-inline">
                                <button type="button" class="ds-btn ds-btn-danger ds-btn-sm btn-delete" title="Hapus"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endif; ?>
