<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konsultasi — DiagnosaKu</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Cpath d='M6 24c0 0 2-12 6-16 1-1 3-1 3 0 0 3-3 10-1 14 2 5 5 6 10 6s8-1 8-6c0-4-3-11-1-14 1-1 2-1 3 0 4 4 6 16 6 16' fill='%23D71F84'/%3E%3Ccircle cx='12' cy='12' r='2' fill='white'/%3E%3Ccircle cx='20' cy='12' r='2' fill='white'/%3E%3C/svg%3E">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>files/dist/css/design-system.css" rel="stylesheet">
    <style>
        body { background:linear-gradient(135deg,#D71F84 0%,#6F2282 50%,#1a0a20 100%); min-height:100vh; display:flex; align-items:center; justify-content:center; }
    </style>
</head>
<body>
    <div class="ds-paw-bg"></div>
    <div class="ds-wizard-wrapper">
        <div class="ds-wizard-card ds-fade-in">
            <div class="ds-wizard-progress"><div class="ds-wizard-progress-bar" style="width:25%"></div></div>
            <div class="ds-wizard-steps">
                <div class="ds-wizard-step active"><div class="ds-wizard-step-num">1</div><span class="ds-wizard-step-label">Identitas</span></div>
                <div class="ds-wizard-line"></div>
                <div class="ds-wizard-step"><div class="ds-wizard-step-num">2</div><span class="ds-wizard-step-label">Gejala</span></div>
                <div class="ds-wizard-line"></div>
                <div class="ds-wizard-step"><div class="ds-wizard-step-num">3</div><span class="ds-wizard-step-label">Diagnosa</span></div>
                <div class="ds-wizard-line"></div>
                <div class="ds-wizard-step"><div class="ds-wizard-step-num">4</div><span class="ds-wizard-step-label">Hasil</span></div>
            </div>

            <div class="ds-wizard-body">
                <div style="text-align:center;margin-bottom:16px;">
                    <img src="<?= base_url('assets/images/illustrations/consultation-cat.svg') ?>" alt="Konsultasi Diagnosa" style="width:100%;max-width:320px;height:auto;border-radius:12px;">
                </div>

                <?php if (validation_errors()): ?>
                <div class="ds-alert ds-alert-danger"><i class="bi bi-exclamation-triangle-fill"></i><?= validation_errors() ?></div>
                <?php endif; ?>

                <form method="POST" action="<?= base_url('konsultasi/mulai') ?>" class="needs-validation" novalidate>
                    <div class="ds-form-group">
                        <label class="ds-label ds-label-required"><i class="bi bi-person me-1"></i> Nama Pemilik</label>
                        <input type="text" class="ds-input" name="nama" placeholder="Masukkan nama pemilik" value="<?= set_value('nama') ?>" required>
                        <div class="invalid-feedback">Nama pemilik wajib diisi.</div>
                    </div>
                    <div class="ds-form-group">
                        <label class="ds-label ds-label-required"><i class="bi bi-envelope me-1"></i> Email</label>
                        <input type="email" class="ds-input" name="email" placeholder="email@domain.com" value="<?= set_value('email') ?>" required>
                        <div class="invalid-feedback">Email valid wajib diisi.</div>
                    </div>
                    <div class="ds-form-group">
                        <label class="ds-label ds-label-required"><i class="bi bi-tag me-1"></i> Jenis Kucing</label>
                        <select class="ds-select" name="id_jenis" required>
                            <option value="">— Pilih Jenis Kucing —</option>
                            <?php foreach ($jenis as $j): ?>
                            <option value="<?= $j->nama ?>" <?= set_select('id_jenis', $j->nama) ?>><?= $j->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Jenis kucing wajib dipilih.</div>
                    </div>
                    <div class="ds-form-group">
                        <label class="ds-label ds-label-required"><i class="bi bi-heart me-1"></i> Nama Kucing</label>
                        <input type="text" class="ds-input" name="namakucing" placeholder="Nama kucing Anda" value="<?= set_value('namakucing') ?>" required>
                        <div class="invalid-feedback">Nama kucing wajib diisi.</div>
                    </div>
                    <button type="submit" class="ds-btn ds-btn-primary" style="width:100%;padding:12px;">
                        Selanjutnya <i class="bi bi-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
        <div style="text-align:center;margin-top:20px;color:rgba(255,255,255,0.5);font-size:0.75rem;">
            <i class="bi bi-paw-fill me-1"></i> DiagnosaKu v2.0
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    (function(){'use strict';var f=document.querySelectorAll('.needs-validation');Array.prototype.slice.call(f).forEach(function(form){form.addEventListener('submit',function(e){if(!form.checkValidity()){e.preventDefault();e.stopPropagation();}form.classList.add('was-validated');},false);});})();
    </script>
</body>
</html>
