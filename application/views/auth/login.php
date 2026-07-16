<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin — DiagnosaKu</title>
    <!-- Favicon SVG Kucing -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath d='M50 75c-4 0-8-6-8-14s4-14 8-14 8 6 8 14-4 14-8 14zm-16-22c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm32 0c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm-20-18c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8zm12 0c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8z' fill='%23F4A261'/%3E%3C/svg%3E">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?= base_url() ?>files/dist/css/design-system.css" rel="stylesheet">
    
    <style>
        body {
            background-color: var(--ds-bg-body);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            position: relative;
        }
        .login-container {
            width: 100%;
            max-width: 1000px;
            margin: 20px;
            z-index: 10;
        }
        .login-card {
            border: none;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--ds-shadow-lg);
            background: #ffffff;
        }
        .login-brand-side {
            background-color: var(--ds-dark);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 48px;
            position: relative;
        }
        .login-brand-side::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 60 60'%3E%3Cpath d='M30 42c-2 0-4-3-4-7s2-7 4-7 4 3 4 7-2 7-4 7zm-8-12c-1.5 0-3-2-3-5s1.5-5 3-5 3 2 3 5-1.5 5-3 5zm16 0c-1.5 0-3-2-3-5s1.5-5 3-5 3 2 3 5-1.5 5-3 5zm-12-8c-1.5 0-3-1.5-3-4s1.5-4 3-4 3 1.5 3 4-1.5 4-3 4zm8 0c-1.5 0-3-1.5-3-4s1.5-4 3-4 3 1.5 3 4-1.5 4-3 4z' fill='%23F4A261'/%3E%3C/svg%3E");
            background-size: 100px 100px;
            opacity: 0.02;
            pointer-events: none;
        }
        .login-form-side {
            padding: 48px;
        }
        .login-brand-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--ds-primary);
            margin-top: 16px;
        }
        .login-brand-desc {
            font-size: 0.875rem;
            color: rgba(255,255,255,0.7);
            max-width: 320px;
            line-height: 1.6;
            margin-top: 8px;
        }
        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label {
            color: var(--ds-primary) !important;
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem) !important;
        }
        .form-control:focus {
            border-color: var(--ds-primary) !important;
            box-shadow: 0 0 0 0.25rem rgba(244, 162, 97, 0.15) !important;
        }
        .btn-primary-custom {
            background-color: var(--ds-primary);
            border: none;
            font-weight: 600;
            padding: 12px;
            border-radius: 12px;
            color: white;
            transition: var(--ds-transition);
        }
        .btn-primary-custom:hover {
            background-color: #e09251;
            transform: translateY(-2px);
            box-shadow: var(--ds-shadow-primary);
        }
        .btn-primary-custom:active {
            transform: translateY(0);
        }
        .pw-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
            color: var(--ds-text-muted);
            cursor: pointer;
            z-index: 10;
        }
        .pw-toggle:hover {
            color: var(--ds-primary);
        }
        @media (max-width: 768px) {
            .login-brand-side {
                padding: 32px 20px;
            }
            .login-form-side {
                padding: 32px 24px;
            }
        }
    </style>
</head>
<body>
    <div class="ds-paw-bg"></div>

    <div class="container login-container">
        <div class="login-card">
            <div class="row g-0">
                <!-- Brand Side -->
                <div class="col-md-5 login-brand-side text-center">
                    <!-- Ilustrasi Kucing Dokter -->
                    <svg width="150" height="150" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto">
                        <!-- Collar & Tag -->
                        <path d="M40 85 C40 70, 80 70, 80 85 Z" fill="#264653" />
                        <!-- Head -->
                        <circle cx="60" cy="55" r="24" fill="#F4A261" />
                        <!-- Ear Left -->
                        <path d="M40 40 L50 20 L58 35 Z" fill="#F4A261" />
                        <path d="M43 38 L50 25 L55 35 Z" fill="#E76F51" />
                        <!-- Ear Right -->
                        <path d="M80 40 L70 20 L62 35 Z" fill="#F4A261" />
                        <path d="M77 38 L70 25 L65 35 Z" fill="#E76F51" />
                        <!-- Eyes -->
                        <circle cx="51" cy="50" r="3" fill="#264653" />
                        <circle cx="69" cy="50" r="3" fill="#264653" />
                        <!-- Nose/Mouth -->
                        <path d="M60 55 L58 58 H62 Z" fill="#E76F51" />
                        <path d="M57 60 C59 62, 60 62, 60 60 C60 62, 61 62, 63 60" stroke="#264653" stroke-width="1.5" stroke-linecap="round" />
                        <!-- Whiskers -->
                        <line x1="38" y1="56" x2="25" y2="54" stroke="#E5E0D8" stroke-width="1.5" stroke-linecap="round" />
                        <line x1="38" y1="60" x2="23" y2="60" stroke="#E5E0D8" stroke-width="1.5" stroke-linecap="round" />
                        <line x1="82" y1="56" x2="95" y2="54" stroke="#E5E0D8" stroke-width="1.5" stroke-linecap="round" />
                        <line x1="82" y1="60" x2="97" y2="60" stroke="#E5E0D8" stroke-width="1.5" stroke-linecap="round" />
                        <!-- Stethoscope collar tag -->
                        <circle cx="60" cy="74" r="4" fill="#E9C46A" />
                        <path d="M60 78 V83 M58 83 H62" stroke="#E9C46A" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                    <div class="login-brand-title">DiagnosaKu</div>
                    <div class="login-brand-desc">Sistem Pakar Diagnosa Penyakit Kucing dengan Certainty Factor (CF).</div>
                </div>
                
                <!-- Form Side -->
                <div class="col-md-7 login-form-side">
                    <div class="mb-4">
                        <h2 class="fw-bold text-dark" style="font-size:1.5rem;">Selamat Datang Admin</h2>
                        <p class="text-muted small">Silakan masuk untuk mengelola sistem pakar.</p>
                    </div>

                    <?php 
                    $login_error = $this->session->flashdata('login_error'); 
                    if ($login_error):
                        // Force consumption NOW
                        unset($_SESSION['login_error'], $_SESSION['__ci_vars']['login_error']);
                        if (empty($_SESSION['__ci_vars'])) unset($_SESSION['__ci_vars']);

                        $lid = md5($login_error . uniqid('', true));
                    ?>
                    <div class="alert alert-danger d-flex align-items-center gap-2 py-2 px-3 mb-4" style="border-radius:12px; font-size:0.875rem;" id="la_<?= $lid ?>">
                        <i class="bi bi-exclamation-circle-fill"></i>
                        <span><?= $login_error ?></span>
                    </div>
                    <script>
                    (function() {
                        if (!sessionStorage.getItem('sn_<?= $lid ?>')) {
                            sessionStorage.setItem('sn_<?= $lid ?>', '1');
                        } else {
                            var el = document.getElementById('la_<?= $lid ?>');
                            if (el) el.style.display = 'none';
                        }
                    })();
                    </script>
                    <?php endif; ?>

                    <form method="POST" action="<?= base_url('auth/login') ?>" id="loginForm">
                        <!-- Username input -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autocomplete="username" style="border-radius:12px;">
                            <label for="username"><i class="bi bi-person me-1"></i> Username</label>
                        </div>
                        
                        <!-- Password input -->
                        <div class="form-floating mb-4 position-relative">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="current-password" style="border-radius:12px;">
                            <label for="password"><i class="bi bi-lock me-1"></i> Password</label>
                            <button type="button" class="pw-toggle" id="togglePw" aria-label="Tampilkan password">
                                <i class="bi bi-eye" id="pwIcon"></i>
                            </button>
                        </div>
                        
                        <!-- Remember me & Forgot password -->
                        <div class="d-flex justify-content-between align-items-center mb-4" style="font-size:0.875rem;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember" style="cursor:pointer; accent-color:var(--ds-primary);">
                                <label class="form-check-label text-muted" for="remember" style="cursor:pointer;">Ingat saya</label>
                            </div>
                            <a href="#" onclick="alert('Silakan hubungi administrator utama untuk reset password Anda.'); return false;" class="text-decoration-none" style="color:var(--ds-primary); font-weight:500;">Lupa password?</a>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary-custom w-100 py-3 d-flex align-items-center justify-content-center gap-2" id="btnLogin">
                            <span class="spinner-border spinner-border-sm text-light d-none" id="btnSpinner" role="status"></span>
                            <span><i class="bi bi-box-arrow-in-right me-1"></i> Masuk</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Back to Home -->
        <div class="text-center mt-4">
            <a href="<?= base_url() ?>" class="text-decoration-none text-muted small"><i class="bi bi-arrow-left me-1"></i> Kembali ke Halaman Utama</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var toggle = document.getElementById('togglePw');
        var pw = document.getElementById('password');
        var icon = document.getElementById('pwIcon');
        if (toggle && pw && icon) {
            toggle.addEventListener('click', function() {
                var isPw = pw.type === 'password';
                pw.type = isPw ? 'text' : 'password';
                icon.classList.toggle('bi-eye');
                icon.classList.toggle('bi-eye-slash');
            });
        }
        document.getElementById('loginForm').addEventListener('submit', function() {
            var btn = document.getElementById('btnLogin');
            var spinner = document.getElementById('btnSpinner');
            if (btn && spinner) {
                btn.disabled = true;
                spinner.classList.remove('d-none');
            }
        });
    });
    </script>
</body>
</html>
