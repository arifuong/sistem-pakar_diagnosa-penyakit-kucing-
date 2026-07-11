<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login — DiagnosaKu</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Cpath d='M6 24c0 0 2-12 6-16 1-1 3-1 3 0 0 3-3 10-1 14 2 5 5 6 10 6s8-1 8-6c0-4-3-11-1-14 1-1 2-1 3 0 4 4 6 16 6 16' fill='%23D71F84'/%3E%3Ccircle cx='12' cy='12' r='2' fill='white'/%3E%3Ccircle cx='20' cy='12' r='2' fill='white'/%3E%3C/svg%3E">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            background: linear-gradient(135deg, #D71F84 0%, #6F2282 50%, #1a0a20 100%);
            position: relative;
            overflow-x: hidden;
        }
        body::before {
            content:'';position:absolute;top:0;left:0;right:0;bottom:0;
            background: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.06) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(255,255,255,0.04) 0%, transparent 50%);
            pointer-events:none;
        }
        .login-bg-paws {
            position:fixed;top:0;left:0;right:0;bottom:0;pointer-events:none;opacity:0.03;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 60 60'%3E%3Cpath d='M30 42c-2 0-4-3-4-7s2-7 4-7 4 3 4 7-2 7-4 7zm-8-12c-1.5 0-3-2-3-5s1.5-5 3-5 3 2 3 5-1.5 5-3 5zm16 0c-1.5 0-3-2-3-5s1.5-5 3-5 3 2 3 5-1.5 5-3 5zm-12-8c-1.5 0-3-1.5-3-4s1.5-4 3-4 3 1.5 3 4-1.5 4-3 4zm8 0c-1.5 0-3-1.5-3-4s1.5-4 3-4 3 1.5 3 4-1.5 4-3 4z' fill='%23D71F84'/%3E%3C/svg%3E");
            background-size:100px 100px;
        }

        .login-left {
            flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;
            padding:40px;position:relative;z-index:1;
        }
        .login-left-content {
            max-width:420px;text-align:center;color:#fff;
        }
        .login-left-content h1 {
            font-family:'Noto Serif',serif;font-size:2rem;font-weight:700;margin-bottom:12px;line-height:1.3;
        }
        .login-left-content p {
            font-size:0.9375rem;color:rgba(255,255,255,0.75);line-height:1.6;margin-bottom:32px;
        }
        .login-cat-svg { margin-bottom:24px; }

        .login-right {
            width:100%;max-width:460px;display:flex;align-items:center;justify-content:center;
            padding:40px;position:relative;z-index:1;
        }
        .login-card {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 20px;
            padding: 40px 36px;
            width: 100%;
            box-shadow: 0 8px 40px rgba(0,0,0,0.2);
        }
        .login-card-inner {
            background: rgba(255,255,255,0.95);
            border-radius: 16px;
            padding: 36px 32px;
        }
        .login-brand {
            display:flex;align-items:center;gap:10px;justify-content:center;margin-bottom:24px;
        }
        .login-brand-icon {
            width:44px;height:44px;background:linear-gradient(135deg,#D71F84,#6F2282);
            border-radius:12px;display:flex;align-items:center;justify-content:center;
            color:#fff;font-size:22px;box-shadow:0 4px 12px rgba(215,31,132,0.3);
        }
        .login-brand-text {
            font-family:'Noto Serif',serif;font-size:1.375rem;font-weight:700;color:#333;
        }
        .login-card-inner h2 {
            font-family:'Noto Serif',serif;font-size:1.125rem;font-weight:700;color:#333;
            text-align:center;margin-bottom:4px;
        }
        .login-card-inner .login-sub {
            font-size:0.8125rem;color:#888;text-align:center;margin-bottom:28px;
        }
        .form-floating { position:relative; margin-bottom:20px; }
        .form-floating input {
            width:100%;height:52px;padding:18px 14px 6px;font-family:'Poppins',sans-serif;
            font-size:0.875rem;color:#333;background:#fff;border:1.5px solid #e0e0e0;
            border-radius:10px;outline:none;transition:all 0.2s ease;
        }
        .form-floating input:focus { border-color:#D71F84;box-shadow:0 0 0 3px rgba(215,31,132,0.1); }
        .form-floating label {
            position:absolute;top:50%;left:14px;transform:translateY(-50%);
            font-size:0.875rem;color:#999;pointer-events:none;transition:all 0.2s ease;
            background:transparent;padding:0 4px;
        }
        .form-floating input:focus ~ label,
        .form-floating input:not(:placeholder-shown) ~ label {
            top:4px;font-size:0.6875rem;font-weight:600;color:#D71F84;
        }
        .form-floating .pw-toggle {
            position:absolute;right:14px;top:50%;transform:translateY(-50%);
            background:none;border:none;color:#999;cursor:pointer;padding:4px;font-size:1.125rem;
        }
        .form-floating .pw-toggle:hover { color:#D71F84; }

        .login-extras {
            display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;
        }
        .login-extras .form-check { font-size:0.8125rem;color:#666; }
        .login-extras .form-check input { accent-color:#D71F84; }
        .login-extras a { font-size:0.8125rem;color:#D71F84;font-weight:500; }
        .login-extras a:hover { text-decoration:underline; }

        .btn-login {
            width:100%;height:48px;font-family:'Poppins',sans-serif;font-size:0.9375rem;
            font-weight:600;color:#fff;background:linear-gradient(135deg,#D71F84,#6F2282);
            border:none;border-radius:12px;cursor:pointer;transition:all 0.25s ease;
            display:flex;align-items:center;justify-content:center;gap:8px;
            box-shadow:0 4px 16px rgba(215,31,132,0.3);
        }
        .btn-login:hover {
            transform:translateY(-2px);box-shadow:0 6px 24px rgba(215,31,132,0.4);
            background:linear-gradient(135deg,#c01a76,#5a1a6b);color:#fff;
        }
        .btn-login:active { transform:translateY(0); }
        .btn-login .spinner-border { width:18px;height:18px;border-width:2px;display:none; }
        .btn-login.loading .spinner-border { display:inline-block; }
        .btn-login.loading span { display:none; }

        .login-error {
            background:#fef2f2;border:1px solid #fecaca;border-radius:10px;
            padding:12px 16px;margin-bottom:20px;font-size:0.8125rem;color:#C0392B;
            display:flex;align-items:center;gap:8px;
        }

        .login-footer-left {
            position:fixed;bottom:24px;left:40px;z-index:1;color:rgba(255,255,255,0.5);
            font-size:0.75rem;display:flex;align-items:center;gap:8px;
        }
        .login-footer-right {
            position:fixed;bottom:24px;right:40px;z-index:1;color:rgba(255,255,255,0.5);
            font-size:0.75rem;
        }

        @media (max-width: 992px) {
            body { flex-direction:column; }
            .login-left { display:none; }
            .login-right { max-width:100%;min-height:100vh; }
            .login-footer-left, .login-footer-right { display:none; }
        }
        @media (max-width: 480px) {
            .login-card { padding:24px 16px; }
            .login-card-inner { padding:28px 20px; }
        }
    </style>
</head>
<body>
    <div class="login-bg-paws"></div>

    <div class="login-left">
        <div class="login-left-content">
            <div class="login-cat-svg">
                <img src="<?= base_url('assets/images/illustrations/login-cat-doctor.svg') ?>" alt="Dokter Hewan dengan Kucing" style="width:100%;max-width:380px;height:auto;border-radius:16px;">
            </div>
            <h1>DiagnosaKu</h1>
            <p>Sistem Pakar Diagnosa Penyakit Kucing menggunakan metode Forward Chaining. Dilengkapi dengan ilustrasi dokter hewan untuk membantu mendiagnosa kesehatan kucing Anda.</p>
            <div style="display:flex;gap:24px;justify-content:center;">
                <div style="text-align:center;">
                    <div style="font-size:1.75rem;font-weight:700;">20+</div>
                    <div style="font-size:0.75rem;color:rgba(255,255,255,0.6);">Penyakit</div>
                </div>
                <div style="text-align:center;">
                    <div style="font-size:1.75rem;font-weight:700;">50+</div>
                    <div style="font-size:0.75rem;color:rgba(255,255,255,0.6);">Gejala</div>
                </div>
                <div style="text-align:center;">
                    <div style="font-size:1.75rem;font-weight:700;">100%</div>
                    <div style="font-size:0.75rem;color:rgba(255,255,255,0.6);">Akurat</div>
                </div>
            </div>
        </div>
    </div>

    <div class="login-right">
        <div class="login-card">
            <div class="login-card-inner">
                <div class="login-brand">
                    <div class="login-brand-icon"><i class="bi bi-paw"></i></div>
                    <span class="login-brand-text">DiagnosaKu</span>
                </div>
                <h2>Masuk ke Akun Anda</h2>
                <p class="login-sub">Silakan masukkan kredensial untuk mengakses dashboard</p>

                <?php
                $flashMsg = $this->session->flashdata('error');
                // Force-clear flashdata to prevent persistence
                if (isset($_SESSION)) {
                    foreach (['success','error','warning','info','message'] as $_fk) {
                        unset($_SESSION[$_fk]);
                    }
                    unset($_SESSION['__ci_vars']);
                }
                ?>
                <?php if ($flashMsg): ?>
                <div class="login-error">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <?= $flashMsg ?>
                </div>
                <?php endif; ?>

                <form method="POST" action="<?= base_url('auth/login') ?>" id="loginForm" novalidate>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autocomplete="username">
                        <label for="username"><i class="bi bi-person me-1"></i> Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                        <label for="password"><i class="bi bi-lock me-1"></i> Password</label>
                        <button type="button" class="pw-toggle" id="togglePw" aria-label="Tampilkan password">
                            <i class="bi bi-eye" id="pwIcon"></i>
                        </button>
                    </div>
                    <div class="login-extras">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Ingat saya</label>
                        </div>
                        <a href="#" onclick="Swal.fire({icon:'info',title:'Fitur Dalam Pengembangan',text:'Fitur lupa password akan segera tersedia.',confirmButtonColor:'#D71F84'});return false;">Lupa password?</a>
                    </div>
                    <button type="submit" class="btn-login" id="btnLogin">
                        <div class="spinner-border text-light" role="status"></div>
                        <span><i class="bi bi-box-arrow-in-right me-1"></i> Masuk</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="login-footer-left">
        <i class="bi bi-paw-fill"></i>
        <span>&copy; <?= date('Y') ?> DiagnosaKu v2.0</span>
    </div>
    <div class="login-footer-right">
        Sistem Pakar Diagnosa Penyakit Kucing
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            document.getElementById('btnLogin').classList.add('loading');
        });
    });
    </script>
</body>
</html>
