<div class="ds-page-header ds-fade-in">
    <div>
        <nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li><li class="breadcrumb-item">Data Master</li><li class="breadcrumb-item"><a href="<?= base_url('rule') ?>">Rule</a></li><li class="breadcrumb-item active">Tambah</li></ol></nav>
        <h2>Tambah Rule</h2>
    </div>
    <a href="<?= base_url('rule') ?>" class="ds-btn ds-btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
</div>

<div class="ds-card ds-fade-in">
    <div class="ds-card-header"><i class="bi bi-plus-circle me-1"></i> Form Tambah Rule (CF)</div>
    <div class="ds-card-body">
        <form action="<?= base_url('rule/insert') ?>" method="POST" class="needs-validation" novalidate>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="ds-form-group">
                        <label class="ds-label ds-label-required">Penyakit</label>
                        <select name="penyakit_id" class="ds-select" required>
                            <option value="">-- Pilih Penyakit --</option>
                            <?php foreach ($penyakit as $p): ?>
                            <option value="<?= $p->id_penyakit ?>" <?= set_select('penyakit_id', $p->id_penyakit) ?>><?= $p->kode_penyakit ?> - <?= htmlspecialchars($p->nama_penyakit) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Penyakit wajib dipilih.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ds-form-group">
                        <label class="ds-label ds-label-required">Gejala</label>
                        <select name="gejala_id" class="ds-select" required>
                            <option value="">-- Pilih Gejala --</option>
                            <?php foreach ($gejala as $g): ?>
                            <option value="<?= $g->id_gejala ?>" <?= set_select('gejala_id', $g->id_gejala) ?>><?= $g->kode_gejala ?> - <?= htmlspecialchars($g->nama_gejala) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Gejala wajib dipilih.</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ds-form-group">
                        <label class="ds-label ds-label-required">MB (Measure of Belief)</label>
                        <input type="number" class="ds-input" name="mb" id="mb" placeholder="0.0 - 1.0" min="0" max="1" step="0.01" value="<?= set_value('mb') ?>" required>
                        <small class="text-muted text-xs">Nilai keyakinan pakar (0 s/d 1).</small>
                        <div class="invalid-feedback">MB wajib diisi antara 0 sampai 1.</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ds-form-group">
                        <label class="ds-label ds-label-required">MD (Measure of Disbelief)</label>
                        <input type="number" class="ds-input" name="md" id="md" placeholder="0.0 - 1.0" min="0" max="1" step="0.01" value="<?= set_value('md') ?>" required>
                        <small class="text-muted text-xs">Nilai ketidakyakinan pakar (0 s/d 1).</small>
                        <div class="invalid-feedback">MD wajib diisi antara 0 sampai 1.</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ds-form-group">
                        <label class="ds-label">CF Pakar (Belief - Disbelief)</label>
                        <input type="text" class="ds-input bg-light" id="cf_pakar" readonly placeholder="0.0">
                        <small class="text-muted text-xs">Dihitung otomatis: MB - MD.</small>
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
(function(){
    'use strict';
    
    // Bootstrap validation
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function(form){
        form.addEventListener('submit', function(e){
            if(!form.checkValidity()){
                e.preventDefault();
                e.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });

    // Auto CF calculation
    var mbInput = document.getElementById('mb');
    var mdInput = document.getElementById('md');
    var cfInput = document.getElementById('cf_pakar');

    function calculateCF() {
        var mb = parseFloat(mbInput.value) || 0;
        var md = parseFloat(mdInput.value) || 0;
        var cf = mb - md;
        cfInput.value = cf.toFixed(2);
    }

    mbInput.addEventListener('input', calculateCF);
    mdInput.addEventListener('input', calculateCF);
})();
</script>

