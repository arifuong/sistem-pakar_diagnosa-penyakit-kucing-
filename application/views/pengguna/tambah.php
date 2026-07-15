<div class="row justify-content-center ds-fade-in">
    <div class="col-lg-8">
        <div class="ds-card" style="border-radius: var(--ds-radius);">
            <div class="ds-card-header">
                <i class="bi bi-person-plus-fill me-1"></i> Tambah Data Pengguna
            </div>
            <div class="ds-card-body">
                <form method="POST" action="<?= base_url('pengguna/insert') ?>">
                    <div class="ds-form-group mb-3">
                        <label class="ds-label ds-label-required">Username</label>
                        <input type="text" class="ds-input" name="username" placeholder="Masukkan username" required value="<?= set_value('username') ?>">
                        <small class="text-muted text-xs">Digunakan untuk login. Minimal 4 karakter dan unik.</small>
                    </div>

                    <div class="ds-form-group mb-3">
                        <label class="ds-label ds-label-required">Nama Lengkap</label>
                        <input type="text" class="ds-input" name="nama_lengkap" placeholder="Masukkan nama lengkap" required value="<?= set_value('nama_lengkap') ?>">
                    </div>

                    <div class="ds-form-group mb-3">
                        <label class="ds-label ds-label-required">Password</label>
                        <input type="password" class="ds-input" name="password" placeholder="Masukkan password" required>
                        <small class="text-muted text-xs">Minimal 5 karakter.</small>
                    </div>

                    <div class="ds-form-group mb-4">
                        <label class="ds-label ds-label-required">Role / Hak Akses</label>
                        <select class="ds-select" name="role" required>
                            <option value="">— Pilih Role —</option>
                            <option value="admin" <?= set_select('role', 'admin') ?>>Administrator</option>
                            <option value="pakar" <?= set_select('role', 'pakar') ?>>Pakar Veteriner</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('pengguna') ?>" class="btn btn-outline-secondary px-4" style="border-radius:var(--ds-radius-sm);">Kembali</a>
                        <button type="submit" class="btn btn-primary text-white px-5" style="border-radius:var(--ds-radius-sm);background-color:var(--ds-primary);border:none;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
