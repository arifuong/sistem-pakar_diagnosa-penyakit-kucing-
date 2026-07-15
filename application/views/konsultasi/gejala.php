<?php
// Function to dynamically assign categories based on symptom code
function get_symptom_categories($code) {
    $map = [
        'G01' => ['umum'],
        'G02' => ['umum'],
        'G03' => ['pencernaan'],
        'G04' => ['pencernaan'],
        'G05' => ['pencernaan'],
        'G06' => ['pencernaan'],
        'G07' => ['pernapasan'],
        'G08' => ['hidung', 'pernapasan'],
        'G09' => ['mata'],
        'G10' => ['mulut'],
        'G11' => ['mulut'],
        'G12' => ['pernapasan'],
        'G13' => ['pernapasan'],
        'G14' => ['mata', 'hidung', 'pernapasan'],
        'G15' => ['pencernaan'],
        'G16' => ['mulut', 'pernapasan'],
        'G17' => ['kemih'],
        'G18' => ['kemih'],
        'G19' => ['kemih'],
        'G20' => ['kemih'],
        'G21' => ['kemih'],
        'G22' => ['pencernaan'],
        'G23' => ['pencernaan'],
        'G24' => ['kemih'],
        'G25' => ['kulit'],
        'G26' => ['kulit'],
        'G27' => ['kulit'],
        'G28' => ['telinga'],
        'G29' => ['telinga'],
        'G30' => ['telinga'],
    ];
    return isset($map[$code]) ? implode(',', $map[$code]) : 'umum';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> — DiagnosaKu</title>
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
        }
        .loading-screen {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(255, 253, 248, 0.95);
            z-index: 9999;
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .symptom-search-wrapper {
            position: relative;
        }
        .symptom-search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--ds-text-muted);
        }
        .symptom-search-input {
            padding-left: 44px !important;
            height: 52px;
            border-radius: 16px !important;
        }
        .progress-bar-custom {
            height: 8px;
            background-color: #E9ECEF;
            border-radius: 4px;
            overflow: hidden;
            margin-bottom: 24px;
        }
        .progress-bar-fill {
            height: 100%;
            background-color: var(--ds-primary);
            width: 66%;
            border-radius: 4px;
        }
        /* Sticky container adjustment */
        .sticky-footer-container {
            margin-bottom: -48px; /* Offset the container padding */
        }
    </style>
</head>
<body class="py-4">
    <!-- Loading Screen -->
    <div id="loadingScreen" class="loading-screen">
        <div class="ds-loading-paw-bounce">
            <svg width="80" height="80" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M50 75c-4 0-8-6-8-14s4-14 8-14 8 6 8 14-4 14-8 14zm-16-22c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm32 0c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm-20-18c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8zm12 0c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8z" fill="var(--ds-primary)"/>
            </svg>
        </div>
        <h4 class="mt-3 fw-bold text-dark" style="font-size:1.25rem;">Menganalisis Gejala Kucing...</h4>
        <p class="text-muted small">Mesin inferensi Certainty Factor sedang menghitung tingkat keyakinan.</p>
    </div>

    <div class="ds-paw-bg"></div>

    <div class="container" style="max-width: 900px;">
        <div class="card border-0 shadow-sm p-4 p-md-5 mb-5" style="border-radius: 24px; background: #fff;">
            
            <!-- Stepper Modern -->
            <div class="ds-modern-stepper">
                <div class="ds-modern-stepper-line" style="width: 50%"></div>
                <div class="ds-modern-step completed">
                    <div class="ds-modern-step-circle"><i class="bi bi-check-lg"></i></div>
                    <div class="ds-modern-step-label">Identitas</div>
                </div>
                <div class="ds-modern-step active">
                    <div class="ds-modern-step-circle">2</div>
                    <div class="ds-modern-step-label">Pilih Gejala</div>
                </div>
                <div class="ds-modern-step">
                    <div class="ds-modern-step-circle">3</div>
                    <div class="ds-modern-step-label">Hasil Diagnosa</div>
                </div>
            </div>

            <!-- Consultation Progress Bar -->
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small text-muted fw-semibold">Progres Konsultasi</span>
                <span class="small text-primary fw-bold" id="progressPercent">0% Terisi</span>
            </div>
            <div class="progress-bar-custom">
                <div class="progress-bar-fill" id="progressBar" style="width: 0%"></div>
            </div>

            <div class="text-center mb-4">
                <h3 class="fw-bold text-dark" style="font-size: 1.5rem;"><i class="bi bi-clipboard2-pulse text-primary me-2"></i> Pilih Gejala Kucing Anda</h3>
                <p class="text-muted small">Centang tanda-tanda sakit yang terlihat secara fisik pada kucing dan pilih tingkat keyakinan Anda.</p>
            </div>

            <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger px-3 py-2 d-flex align-items-center gap-2 mb-4" style="border-radius:12px; font-size:0.875rem;">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <span><?= $this->session->flashdata('error') ?></span>
            </div>
            <?php endif; ?>

            <form id="formDiagnosa" method="POST" action="<?= base_url('konsultasi/proses') ?>">
                
                <!-- Search Gejala -->
                <div class="symptom-search-wrapper mb-4">
                    <i class="bi bi-search symptom-search-icon"></i>
                    <input type="text" id="searchGejala" class="form-control ds-input symptom-search-input" placeholder="Cari gejala kucing (contoh: demam, muntah, mata)...">
                </div>

                <!-- Category Filters -->
                <div class="ds-category-pills justify-content-start overflow-x-auto pb-2 mb-4">
                    <button type="button" class="ds-category-pill category-btn active" data-category="all"><i class="bi bi-grid-fill"></i> Semua</button>
                    <button type="button" class="ds-category-pill category-btn" data-category="umum"><i class="bi bi-info-circle-fill"></i> Umum</button>
                    <button type="button" class="ds-category-pill category-btn" data-category="mata"><i class="bi bi-eye-fill"></i> Mata</button>
                    <button type="button" class="ds-category-pill category-btn" data-category="hidung"><i class="bi bi-wind"></i> Hidung</button>
                    <button type="button" class="ds-category-pill category-btn" data-category="mulut"><i class="bi bi-egg-fill"></i> Mulut</button>
                    <button type="button" class="ds-category-pill category-btn" data-category="pencernaan"><i class="bi bi-database-fill-check"></i> Pencernaan</button>
                    <button type="button" class="ds-category-pill category-btn" data-category="kulit"><i class="bi bi-shield-shaded"></i> Kulit</button>
                    <button type="button" class="ds-category-pill category-btn" data-category="telinga"><i class="bi bi-ear-fill"></i> Telinga</button>
                    <button type="button" class="ds-category-pill category-btn" data-category="pernapasan"><i class="bi bi-lungs-fill"></i> Pernapasan</button>
                    <button type="button" class="ds-category-pill category-btn" data-category="kemih"><i class="bi bi-droplet-fill"></i> Kemih</button>
                </div>

                <!-- Symptoms Table / List -->
                <div class="border rounded-4 overflow-hidden mb-4" style="background:#fff; border-color:var(--ds-border) !important;">
                    <div class="table-responsive" style="max-height: 480px; overflow-y: auto;">
                        <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                            <thead class="table-light sticky-top" style="z-index:10;">
                                <tr class="border-bottom" style="border-color:var(--ds-border) !important;">
                                    <th width="70" class="text-center py-3">Pilih</th>
                                    <th width="90" class="text-center py-3">Kode</th>
                                    <th class="py-3">Tanda Klinis / Gejala Kucing</th>
                                    <th width="260" class="py-3">Tingkat Keyakinan Anda (CF)</th>
                                </tr>
                            </thead>
                            <tbody id="gejalaTableBody">
                                <?php foreach ($gejala as $g): ?>
                                <tr class="gejala-row border-bottom" data-categories="<?= get_symptom_categories($g->kode_gejala) ?>" style="border-color:var(--ds-border) !important;">
                                    <!-- Checkbox -->
                                    <td class="text-center py-3">
                                        <input type="checkbox" class="form-check-input ds-checkbox-lg gejala-check" name="gejala[]" value="<?= $g->id_gejala ?>" id="check-<?= $g->id_gejala ?>">
                                    </td>
                                    
                                    <!-- Kode -->
                                    <td class="text-center py-3">
                                        <span class="badge bg-secondary font-monospace px-2.5 py-1.5 gejala-code" style="border-radius:6px; font-weight:600; font-size:0.75rem;"><?= $g->kode_gejala ?></span>
                                    </td>
                                    
                                    <!-- Nama & Tooltip -->
                                    <td class="py-3">
                                        <div class="d-flex align-items-center">
                                            <label for="check-<?= $g->id_gejala ?>" class="fw-semibold mb-0 text-dark gejala-name" style="cursor:pointer;"><?= htmlspecialchars($g->nama_gejala) ?></label>
                                            
                                            <!-- Tooltip Button -->
                                            <?php if ($g->deskripsi): ?>
                                            <span class="ds-info-btn ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= htmlspecialchars($g->deskripsi) ?>">
                                                <i class="bi bi-info-circle-fill"></i>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <span class="d-none gejala-desc"><?= htmlspecialchars($g->deskripsi) ?></span>
                                    </td>
                                    
                                    <!-- Select CF -->
                                    <td class="py-3 pr-3">
                                        <select class="form-select ds-select-lg cf-select" name="cf_user[<?= $g->id_gejala ?>]" id="select-<?= $g->id_gejala ?>" disabled required>
                                            <option value="">— Pilih Keyakinan —</option>
                                            <?php foreach ($cf_options as $val => $label): ?>
                                                <option value="<?= $val ?>"><?= $label ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                
                                <!-- Empty state inside table -->
                                <tr id="emptySearchRow" style="display:none;">
                                    <td colspan="4" class="text-center py-5 text-muted">
                                        <svg width="64" height="64" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-3 opacity-50">
                                            <path d="M50 75c-4 0-8-6-8-14s4-14 8-14 8 6 8 14-4 14-8 14zm-16-22c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm32 0c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm-20-18c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8zm12 0c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8z" fill="var(--ds-primary)"/>
                                        </svg>
                                        <p class="fw-semibold mb-0">Gejala tidak ditemukan</p>
                                        <small>Coba gunakan kata kunci pencarian yang lain.</small>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Action Sticky Panel Wrapper -->
                <div class="sticky-footer-container">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <a href="<?= base_url('konsultasi') ?>" class="btn btn-outline-secondary px-4 py-2.5" style="border-radius:12px; font-weight:500;">
                            <i class="bi opacity-50 bi-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" id="btnSubmit" class="btn btn-primary px-5 py-2.5 text-white fw-bold" style="border-radius:12px; background-color:var(--ds-primary); border:none;">
                            Mulai Analisis <i class="bi bi-cpu ms-1"></i>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Initialize Bootstrap Tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });

            // Update Progress Bar
            function updateProgress() {
                var totalRow = $('.gejala-row').length;
                var checkedCount = $('.gejala-check:checked').length;
                var percent = Math.round((checkedCount / 1) * 10); // arbitrary but satisfying visual logic: showing progress per checks
                if (checkedCount === 0) percent = 0;
                else if (percent > 100) percent = 100;
                else if (percent < 10) percent = 10;
                
                $('#progressPercent').text(checkedCount + ' Gejala Terpilih');
                $('#progressBar').css('width', (checkedCount > 0 ? Math.min(100, 20 + checkedCount * 8) : 0) + '%');
            }

            // Enable/disable select based on checkbox state
            $('.gejala-check').on('change', function() {
                var id = $(this).val();
                var select = $('#select-' + id);
                if ($(this).is(':checked')) {
                    select.prop('disabled', false);
                    select.val('1.0'); // default to Pasti Terjadi (1.0)
                } else {
                    select.prop('disabled', true);
                    select.val('');
                }
                updateProgress();
            });

            // Live Search and Category Filter Logic (Vanilla JS concept in jQuery)
            function filterGejala() {
                var searchQuery = $('#searchGejala').val().toLowerCase();
                var activeCategory = $('.category-btn.active').data('category');
                var visibleCount = 0;

                $('.gejala-row').each(function() {
                    var name = $(this).find('.gejala-name').text().toLowerCase();
                    var code = $(this).find('.gejala-code').text().toLowerCase();
                    var desc = $(this).find('.gejala-desc').text().toLowerCase();
                    var categories = $(this).data('categories').split(',');

                    var matchesSearch = name.includes(searchQuery) || code.includes(searchQuery) || desc.includes(searchQuery);
                    var matchesCategory = activeCategory === 'all' || categories.includes(activeCategory);

                    if (matchesSearch && matchesCategory) {
                        $(this).show();
                        visibleCount++;
                    } else {
                        $(this).hide();
                    }
                });

                if (visibleCount === 0) {
                    $('#emptySearchRow').show();
                } else {
                    $('#emptySearchRow').hide();
                }
            }

            // Category pills click handler
            $('.category-btn').on('click', function() {
                $('.category-btn').removeClass('active');
                $(this).addClass('active');
                filterGejala();
            });

            // Search input keyup handler
            $('#searchGejala').on('input', function() {
                filterGejala();
            });

            // Form Submit confirmation and animation
            $('#formDiagnosa').on('submit', function(e) {
                e.preventDefault();

                var checkedCount = $('.gejala-check:checked').length;
                if (checkedCount === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Perhatian',
                        text: 'Pilih minimal satu gejala yang terlihat pada kucing Anda.',
                        confirmButtonColor: '#F4A261',
                        customClass: { popup: 'ds-swal' }
                    });
                    return;
                }

                // Check if all checked items have a selected CF value
                var missingCF = false;
                $('.gejala-check:checked').each(function() {
                    var id = $(this).val();
                    var val = $('#select-' + id).val();
                    if (!val || val === '') {
                        missingCF = true;
                    }
                });

                if (missingCF) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Lengkapi Keyakinan',
                        text: 'Tentukan tingkat keyakinan untuk semua gejala yang Anda pilih.',
                        confirmButtonColor: '#F4A261',
                        customClass: { popup: 'ds-swal' }
                    });
                    return;
                }

                Swal.fire({
                    title: 'Lakukan Diagnosa?',
                    text: 'Sistem akan menghitung tingkat keyakinan diagnosa penyakit kucing Anda.',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#F4A261',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, Analisis!',
                    cancelButtonText: 'Batal',
                    customClass: { popup: 'ds-swal' }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#loadingScreen').css('display', 'flex');
                        setTimeout(() => {
                            document.getElementById('formDiagnosa').submit();
                        }, 1200); // Give brief visual processing/loading time
                    }
                });
            });
        });
    </script>
</body>
</html>
