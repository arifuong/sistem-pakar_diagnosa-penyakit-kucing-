<div class="ds-page-header ds-fade-in">
    <div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li><li class="breadcrumb-item">Data Master</li><li class="breadcrumb-item"><a href="<?= base_url('rule') ?>">Rule</a></li><li class="breadcrumb-item active">Tambah</li></ol></nav>
        <h2>Tambah Rule</h2>
    </div>
    <a href="<?= base_url('rule') ?>" class="ds-btn ds-btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

<div class="ds-card ds-fade-in">
    <div class="ds-card-header"><i class="bi bi-plus-circle me-1"></i> Form Tambah Rule</div>
    <div class="ds-card-body">
        <form action="<?= base_url('rule/insert') ?>" method="POST" class="needs-validation" novalidate>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="ds-form-group">
                        <label class="ds-label ds-label-required">Parent (Gejala Sebelumnya)</label>
                        <select name="parent" class="ds-select" required>
                            <option value="">-- Pilih Parent --</option>
                            <?php foreach ($gejala as $g): ?>
                            <option value="<?= $g->kode_gejala ?>"><?= $g->kode_gejala ?> - <?= $g->gejala ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ds-form-group">
                        <label class="ds-label ds-label-required">Ya (Gejala / Penyakit)</label>
                        <select name="ya" class="ds-select" required>
                            <option value="">-- Pilih Jawaban Ya --</option>
                            <optgroup label="Gejala">
                                <?php foreach ($gejala as $g): ?>
                                <option value="<?= $g->kode_gejala ?>"><?= $g->kode_gejala ?> - <?= $g->gejala ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                            <optgroup label="Penyakit">
                                <?php foreach ($penyakit as $p): ?>
                                <option value="<?= $p->kode_penyakit ?>"><?= $p->kode_penyakit ?> - <?= $p->penyakit ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ds-form-group">
                        <label class="ds-label ds-label-required">Tidak (Gejala / Penyakit)</label>
                        <select name="tidak" class="ds-select" required>
                            <option value="">-- Pilih Jawaban Tidak --</option>
                            <optgroup label="Gejala">
                                <?php foreach ($gejala as $g): ?>
                                <option value="<?= $g->kode_gejala ?>"><?= $g->kode_gejala ?> - <?= $g->gejala ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                            <optgroup label="Penyakit">
                                <?php foreach ($penyakit as $p): ?>
                                <option value="<?= $p->kode_penyakit ?>"><?= $p->kode_penyakit ?> - <?= $p->penyakit ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end gap-2 mt-3">
                <a href="<?= base_url('rule') ?>" class="ds-btn ds-btn-secondary">Batal</a>
                <button type="submit" class="ds-btn ds-btn-primary"><i class="bi bi-check-lg"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
<script>
(function(){'use strict';var f=document.querySelectorAll('.needs-validation');Array.prototype.slice.call(f).forEach(function(form){form.addEventListener('submit',function(e){if(!form.checkValidity()){e.preventDefault();e.stopPropagation();}form.classList.add('was-validated');},false);});})();
</script>
