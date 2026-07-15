<div class="ds-card ds-fade-in" style="border-radius: var(--ds-radius);">
    <div class="ds-card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-people-fill me-1"></i> Data Pengguna</span>
        <a href="<?= base_url('pengguna/tambah') ?>" class="btn btn-sm btn-primary text-white" style="border-radius:var(--ds-radius-sm);background-color:var(--ds-primary);border:none;">
            <i class="bi bi-plus-lg"></i> Tambah Pengguna
        </a>
    </div>
    <div class="ds-card-body">
        <div class="table-responsive">
            <table class="ds-table ds-datatable table-hover">
                <thead>
                    <tr>
                        <th width="80">No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Hak Akses / Role</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($pengguna as $u): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td class="fw-semibold">@<?= htmlspecialchars($u->username) ?></td>
                        <td><?= htmlspecialchars($u->nama_lengkap) ?></td>
                        <td>
                            <?php if ($u->role === 'admin'): ?>
                                <span class="badge bg-primary">Administrator</span>
                            <?php else: ?>
                                <span class="badge bg-success">Pakar Veteriner</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="<?= base_url('pengguna/ubah/' . $u->id) ?>" class="btn btn-sm btn-outline-warning" title="Ubah" style="border-radius:var(--ds-radius-sm);">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <?php if ($u->id != $this->session->userdata('user_id')): ?>
                                <form action="<?= base_url('pengguna/delete/' . $u->id) ?>" method="POST" class="d-inline">
                                    <button type="submit" class="btn btn-sm btn-outline-danger btn-delete" title="Hapus" style="border-radius:var(--ds-radius-sm);">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                <?php else: ?>
                                    <button class="btn btn-sm btn-outline-secondary disabled" title="Tidak dapat menghapus diri sendiri" style="border-radius:var(--ds-radius-sm);">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
