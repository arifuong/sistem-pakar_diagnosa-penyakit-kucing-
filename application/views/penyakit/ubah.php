<div class="ds-page-header ds-fade-in">
    <div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li><li class="breadcrumb-item">Data Master</li><li class="breadcrumb-item"><a href="<?= base_url('penyakit') ?>">Penyakit</a></li><li class="breadcrumb-item active">Ubah</li></ol></nav>
        <h2>Ubah Penyakit</h2>
    </div>
    <a href="<?= base_url('penyakit') ?>" class="ds-btn ds-btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

<div class="ds-card ds-fade-in">
    <div class="ds-card-body">
        <form action="<?= base_url('penyakit/update/' . $penyakit->id_penyakit) ?>" method="POST" class="needs-validation" novalidate>
            <input type="hidden" name="id_penyakit" value="<?= $penyakit->id_penyakit ?>">
            <div class="ds-form-group">
                <label class="ds-label">Kode Penyakit</label>
                <input type="text" class="ds-input" value="<?= $penyakit->kode_penyakit ?>" readonly>
            </div>
            <div class="ds-form-group">
                <label class="ds-label ds-label-required">Nama Penyakit</label>
                <input type="text" class="ds-input" name="nama_penyakit" value="<?= htmlspecialchars($penyakit->nama_penyakit) ?>" placeholder="Masukkan nama penyakit" required>
                <div class="invalid-feedback">Nama penyakit tidak boleh kosong.</div>
            </div>
            <div class="ds-form-group">
                <label class="ds-label ds-label-required">Definisi Penyakit</label>
                <textarea class="ds-textarea" name="definisi" placeholder="Masukkan deskripsi klinis/definisi penyakit" required><?= htmlspecialchars($penyakit->definisi) ?></textarea>
                <div class="invalid-feedback">Definisi tidak boleh kosong.</div>
            </div>
            <div class="ds-form-group">
                <label class="ds-label ds-label-required">Penyebab Penyakit</label>
                <textarea class="ds-textarea" name="penyebab" placeholder="Masukkan penyebab patogen/lingkungan penyakit" required><?= htmlspecialchars($penyakit->penyebab) ?></textarea>
                <div class="invalid-feedback">Penyebab tidak boleh kosong.</div>
            </div>
            <div class="ds-form-group">
                <label class="ds-label ds-label-required">Solusi Penanganan Awal</label>
                <textarea class="ds-textarea" name="solusi" placeholder="Masukkan solusi penanganan medis/pertolongan pertama" required><?= htmlspecialchars($penyakit->solusi) ?></textarea>
                <div class="invalid-feedback">Solusi tidak boleh kosong.</div>
            </div>
            <div class="ds-form-group">
                <label class="ds-label ds-label-required">Langkah Pencegahan</label>
                <textarea class="ds-textarea" name="pencegahan" placeholder="Masukkan langkah-langkah preventif/vaksinasi" required><?= htmlspecialchars($penyakit->pencegahan) ?></textarea>
                <div class="invalid-feedback">Pencegahan tidak boleh kosong.</div>
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="<?= base_url('penyakit') ?>" class="ds-btn ds-btn-secondary">Batal</a>
                <button type="submit" class="ds-btn ds-btn-primary"><i class="bi bi-check-lg"></i> Update</button>
            </div>
        </form>
    </div>
</div>
<script>
(function(){'use strict';var f=document.querySelectorAll('.needs-validation');Array.prototype.slice.call(f).forEach(function(form){form.addEventListener('submit',function(e){if(!form.checkValidity()){e.preventDefault();e.stopPropagation();}form.classList.add('was-validated');},false);});})();
</script>

