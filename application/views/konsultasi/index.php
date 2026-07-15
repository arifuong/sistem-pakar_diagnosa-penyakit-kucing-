<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konsultasi — DiagnosaKu</title>
    <!-- Favicon SVG Kucing -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath d='M50 75c-4 0-8-6-8-14s4-14 8-14 8 6 8 14-4 14-8 14zm-16-22c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm32 0c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm-20-18c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8zm12 0c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8z' fill='%23F4A261'/%3E%3C/svg%3E">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>files/dist/css/design-system.css" rel="stylesheet">
    
    <style>
        body { 
            background-color: var(--ds-bg-body);
            color: var(--ds-text);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .consult-container {
            width: 100%;
            max-width: 750px;
            margin: 40px auto;
            z-index: 10;
        }
        .btn-custom-primary {
            background-color: var(--ds-primary);
            color: #fff;
            font-weight: 600;
            border-radius: var(--ds-radius-pill);
            padding: 12px 32px;
            transition: var(--ds-transition);
            border: none;
        }
        .btn-custom-primary:hover {
            background-color: #e09251;
            color: #fff;
            transform: scale(1.02);
            box-shadow: var(--ds-shadow-primary);
        }
    </style>
</head>
<body>
    <div class="ds-paw-bg"></div>

    <div class="container consult-container">
        <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius:24px; background:#fff;">
            <!-- Stepper Modern -->
            <div class="ds-modern-stepper">
                <div class="ds-modern-stepper-line" style="width: 0%"></div>
                <div class="ds-modern-step active">
                    <div class="ds-modern-step-circle">1</div>
                    <div class="ds-modern-step-label">Identitas</div>
                </div>
                <div class="ds-modern-step">
                    <div class="ds-modern-step-circle">2</div>
                    <div class="ds-modern-step-label">Pilih Gejala</div>
                </div>
                <div class="ds-modern-step">
                    <div class="ds-modern-step-circle">3</div>
                    <div class="ds-modern-step-label">Hasil Diagnosa</div>
                </div>
            </div>

            <div class="text-center mb-4">
                <h3 class="fw-bold text-dark" style="font-size:1.5rem;"><i class="bi bi-person-vcard text-primary me-2"></i> Identitas Pemilik & Kucing</h3>
                <p class="text-muted small">Lengkapi data diri Anda dan profil kucing peliharaan untuk memulai proses diagnosa.</p>
            </div>

            <?php if (validation_errors()): ?>
            <div class="alert alert-danger px-3 py-2 d-flex align-items-center gap-2 mb-4" style="border-radius:12px; font-size:0.875rem;">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <div><?= validation_errors() ?></div>
            </div>
            <?php endif; ?>

            <form method="POST" action="<?= base_url('konsultasi/mulai') ?>" class="needs-validation" novalidate>
                <div class="row g-3">
                    <!-- Nama Pemilik -->
                    <div class="col-md-6">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pemilik" value="<?= set_value('nama') ?>" required style="border-radius:12px;">
                            <label for="nama"><i class="bi bi-person me-1"></i> Nama Pemilik</label>
                            <div class="invalid-feedback">Nama pemilik wajib diisi.</div>
                        </div>
                    </div>
                    
                    <!-- Email Pemilik -->
                    <div class="col-md-6">
                        <div class="form-floating mb-1">
                            <input type="email" class="form-control" id="email" name="email" placeholder="email@domain.com" value="<?= set_value('email') ?>" required style="border-radius:12px;">
                            <label for="email"><i class="bi bi-envelope me-1"></i> Email Pemilik</label>
                            <div class="invalid-feedback">Email valid wajib diisi.</div>
                        </div>
                    </div>
                    
                    <!-- Nama Kucing -->
                    <div class="col-md-6">
                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" id="namakucing" name="namakucing" placeholder="Nama Kucing" value="<?= set_value('namakucing') ?>" required style="border-radius:12px;">
                            <label for="namakucing"><i class="bi bi-heart me-1"></i> Nama Kucing</label>
                            <div class="invalid-feedback">Nama kucing wajib diisi.</div>
                        </div>
                    </div>
                    
                    <!-- Ras Kucing -->
                    <div class="col-md-6">
                        <div class="form-floating mb-1">
                            <select class="form-select" id="id_jenis" name="id_jenis" required style="border-radius:12px;">
                                <option value="">— Pilih Breed Kucing —</option>
                                <?php foreach ($jenis as $j): ?>
                                <option value="<?= $j->nama ?>" <?= set_select('id_jenis', $j->nama) ?>><?= $j->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="id_jenis"><i class="bi bi-tag me-1"></i> Breed / Ras Kucing</label>
                            <div class="invalid-feedback">Breed kucing wajib dipilih.</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-5 pt-3 border-top" style="border-color:var(--ds-border) !important;">
                    <a href="<?= base_url() ?>" class="btn btn-outline-secondary px-4 py-2.5" style="border-radius:12px; font-weight:500;">
                        <i class="bi bi-house-door me-1"></i> Beranda
                    </a>
                    <button type="submit" class="btn btn-custom-primary px-5 py-2.5">
                        Selanjutnya <i class="bi bi-arrow-right ms-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    (function(){
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function(form){
            form.addEventListener('submit', function(event){
                if (!form.checkValidity()){
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
    </script>
</body>
</html>
