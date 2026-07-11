<div class="ds-page-header ds-fade-in">
    <div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li><li class="breadcrumb-item">Data Master</li><li class="breadcrumb-item"><a href="<?= base_url('kucing') ?>">Jenis Kucing</a></li><li class="breadcrumb-item active">Tambah</li></ol></nav>
        <h2>Tambah Jenis Kucing</h2>
    </div>
    <a href="<?= base_url('kucing') ?>" class="ds-btn ds-btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

<div class="ds-card ds-fade-in">
    <div class="ds-card-header"><i class="bi bi-plus-circle me-1"></i> Form Tambah Jenis</div>
    <div class="ds-card-body">
        <form action="<?= base_url('kucing/simpan') ?>" method="POST" class="needs-validation" novalidate>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="ds-form-group">
                        <label class="ds-label">ID Jenis</label>
                        <input type="text" class="ds-input" value="<?= $id ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ds-form-group">
                        <label class="ds-label ds-label-required">Nama Jenis Kucing</label>
                        <input type="text" name="nama" class="ds-input" placeholder="Contoh: Persia, Anggora, Siamese" value="<?= set_value('nama') ?>" required>
                        <div class="invalid-feedback">Nama jenis kucing tidak boleh kosong.</div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end gap-2 mt-3">
                <a href="<?= base_url('kucing') ?>" class="ds-btn ds-btn-secondary">Batal</a>
                <button type="submit" class="ds-btn ds-btn-primary"><i class="bi bi-check-lg"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
<script>
(function(){'use strict';var f=document.querySelectorAll('.needs-validation');Array.prototype.slice.call(f).forEach(function(form){form.addEventListener('submit',function(e){if(!form.checkValidity()){e.preventDefault();e.stopPropagation();}form.classList.add('was-validated');},false);});})();
</script>
