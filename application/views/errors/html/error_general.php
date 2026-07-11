<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Error - Sistem Pakar Diagnosa</title>
    <link href="files/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body { margin: 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
        .auth-wrapper { display: flex; justify-content: center; align-items: center; min-height: 100vh; background: #f1f2f3; }
        .error-box { background: #fff; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); padding: 4rem 2rem; text-align: center; max-width: 500px; }
        .error-icon { font-size: 5rem; color: #e74a3b; }
        .error-msg { font-size: 1.2rem; color: #666; margin-bottom: 1rem; }
        .btn-home { background: #4e73df; border: none; padding: 0.6rem 2rem; font-weight: 600; border-radius: 8px; color: #fff; text-decoration: none; display: inline-block; }
        .btn-home:hover { background: #2e59d9; color: #fff; }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="error-box">
            <div class="error-icon"><i class="fas fa-bug"></i></div>
            <div class="error-msg">Terjadi kesalahan pada sistem.</div>
            <p class="text-muted mb-4"><?= isset($message) ? htmlspecialchars($message) : 'Silakan coba lagi atau hubungi administrator.' ?></p>
            <a href="auth" class="btn-home">
                <i class="fas fa-home"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
    <script src="files/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="files/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="files/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
