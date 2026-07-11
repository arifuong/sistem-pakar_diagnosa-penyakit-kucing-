<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jawab Pertanyaan — DiagnosaKu</title>
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
            <div class="ds-wizard-progress"><div class="ds-wizard-progress-bar" style="width:60%"></div></div>
            <div class="ds-wizard-steps">
                <div class="ds-wizard-step done"><div class="ds-wizard-step-num"><i class="bi bi-check-lg"></i></div><span class="ds-wizard-step-label">Identitas</span></div>
                <div class="ds-wizard-line done"></div>
                <div class="ds-wizard-step active"><div class="ds-wizard-step-num">2</div><span class="ds-wizard-step-label">Gejala</span></div>
                <div class="ds-wizard-line"></div>
                <div class="ds-wizard-step"><div class="ds-wizard-step-num">3</div><span class="ds-wizard-step-label">Diagnosa</span></div>
                <div class="ds-wizard-line"></div>
                <div class="ds-wizard-step"><div class="ds-wizard-step-num">4</div><span class="ds-wizard-step-label">Hasil</span></div>
            </div>

            <div class="ds-wizard-body" style="text-align:center;">
                <div style="margin-bottom:16px;">
                    <img src="<?= base_url('assets/images/illustrations/consultation-cat.svg') ?>" alt="" style="width:100%;max-width:280px;height:auto;opacity:0.7;border-radius:10px;">
                </div>
                <div style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,#D71F84,#6F2282);display:inline-flex;align-items:center;justify-content:center;margin-bottom:20px;">
                    <i class="bi bi-question-circle" style="font-size:24px;color:#fff;"></i>
                </div>
                <p class="ds-question-text"><?= $pertanyaan->gejala ?></p>
                <div class="ds-question-btns">
                    <form method="POST" action="<?= base_url('konsultasi/jawab') ?>" style="flex:1;max-width:200px;">
                        <input type="hidden" name="jawaban" value="ya">
                        <button type="submit" class="ds-question-btn ds-question-btn-ya" style="width:100%;"><i class="bi bi-check-lg"></i> Ya</button>
                    </form>
                    <form method="POST" action="<?= base_url('konsultasi/jawab') ?>" style="flex:1;max-width:200px;">
                        <input type="hidden" name="jawaban" value="tidak">
                        <button type="submit" class="ds-question-btn ds-question-btn-tidak" style="width:100%;"><i class="bi bi-x-lg"></i> Tidak</button>
                    </form>
                </div>
            </div>
        </div>
        <div style="text-align:center;margin-top:20px;color:rgba(255,255,255,0.5);font-size:0.75rem;">
            <a href="<?= base_url('konsultasi') ?>" style="color:rgba(255,255,255,0.6);text-decoration:none;"><i class="bi bi-arrow-left me-1"></i> Mulai Ulang</a>
        </div>
    </div>
</body>
</html>
