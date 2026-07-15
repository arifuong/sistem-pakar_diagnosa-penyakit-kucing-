<div class="ds-page-header ds-fade-in">
    <div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li><li class="breadcrumb-item">Data Master</li><li class="breadcrumb-item"><a href="<?= base_url('gejala') ?>">Gejala</a></li><li class="breadcrumb-item active">Tambah</li></ol></nav>
        <h2>Tambah Gejala</h2>
    </div>
    <a href="<?= base_url('gejala') ?>" class="ds-btn ds-btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

<div class="ds-card ds-fade-in">
    <div class="ds-card-body">
        <form action="<?= base_url('gejala/insert') ?>" method="POST" class="needs-validation" novalidate>
            <div class="ds-form-group">
                <label class="ds-label">Kode Gejala</label>
                <input type="text" class="ds-input" name="kode" value="<?= $kode ?>" readonly>
            </div>
            <div class="ds-form-group">
                <label class="ds-label ds-label-required">Nama Gejala</label>
                <input type="text" class="ds-input" name="nama_gejala" placeholder="Masukkan nama gejala" value="<?= set_value('nama_gejala') ?>" required>
                <div class="invalid-feedback">Nama gejala tidak boleh kosong.</div>
            </div>
            <div class="ds-form-group">
                <label class="ds-label ds-label-required">Deskripsi Gejala / Tanda Klinis</label>
                <textarea class="ds-input" name="deskripsi" placeholder="Masukkan penjelasan klinis singkat dari gejala" rows="3" required><?= set_value('deskripsi') ?></textarea>
                <div class="invalid-feedback">Deskripsi gejala tidak boleh kosong.</div>
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="<?= base_url('gejala') ?>" class="ds-btn ds-btn-secondary">Batal</a>
                <button type="submit" class="ds-btn ds-btn-primary"><i class="bi bi-check-lg"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
<script>
(function(){'use strict';var f=document.querySelectorAll('.needs-validation');Array.prototype.slice.call(f).forEach(function(form){form.addEventListener('submit',function(e){if(!form.checkValidity()){e.preventDefault();e.stopPropagation();}form.classList.add('was-validated');},false);});})();
</script>

