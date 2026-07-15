<div class="ds-page-header ds-fade-in">
    <div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li><li class="breadcrumb-item">Data Master</li><li class="breadcrumb-item"><a href="<?= base_url('gejala') ?>">Gejala</a></li><li class="breadcrumb-item active">Ubah</li></ol></nav>
        <h2>Ubah Gejala</h2>
    </div>
    <a href="<?= base_url('gejala') ?>" class="ds-btn ds-btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

<div class="ds-card ds-fade-in">
    <div class="ds-card-body">
        <form action="<?= base_url('gejala/update/' . $gejala->id_gejala) ?>" method="POST" class="needs-validation" novalidate>
            <input type="hidden" name="id_gejala" value="<?= $gejala->id_gejala ?>">
            <div class="ds-form-group">
                <label class="ds-label">Kode Gejala</label>
                <input type="text" class="ds-input" value="<?= $gejala->kode_gejala ?>" readonly>
            </div>
            <div class="ds-form-group">
                <label class="ds-label ds-label-required">Nama Gejala</label>
                <input type="text" class="ds-input" name="nama_gejala" value="<?= htmlspecialchars($gejala->nama_gejala) ?>" placeholder="Masukkan nama gejala" required>
                <div class="invalid-feedback">Nama gejala tidak boleh kosong.</div>
            </div>
            <div class="ds-form-group">
                <label class="ds-label ds-label-required">Deskripsi Gejala / Tanda Klinis</label>
                <textarea class="ds-input" name="deskripsi" placeholder="Masukkan penjelasan klinis singkat dari gejala" rows="3" required><?= htmlspecialchars($gejala->deskripsi) ?></textarea>
                <div class="invalid-feedback">Deskripsi gejala tidak boleh kosong.</div>
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="<?= base_url('gejala') ?>" class="ds-btn ds-btn-secondary">Batal</a>
                <button type="submit" class="ds-btn ds-btn-primary"><i class="bi bi-check-lg"></i> Update</button>
            </div>
        </form>
    </div>
</div>
<script>
(function(){'use strict';var f=document.querySelectorAll('.needs-validation');Array.prototype.slice.call(f).forEach(function(form){form.addEventListener('submit',function(e){if(!form.checkValidity()){e.preventDefault();e.stopPropagation();}form.classList.add('was-validated');},false);});})();
</script>

