<body>
    <div id="ds-preloader" class="ds-preloader">
        <div class="ds-paw-spinner">
            <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M50 75c-4 0-8-6-8-14s4-14 8-14 8 6 8 14-4 14-8 14zm-16-22c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm32 0c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm-20-18c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8zm12 0c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8z" fill="#F4A261"/>
            </svg>
        </div>
        <div class="ds-preloader-text">Memuat DiagnosaKu...</div>
    </div>
    <script>
    (function(){
        var maxTime = setTimeout(function(){
            var el = document.getElementById('ds-preloader');
            if (el) { el.classList.add('fade-out'); setTimeout(function(){ el.style.display = 'none'; }, 500); }
        }, 500);
        if (document.readyState === 'complete' || document.readyState === 'interactive') {
            clearTimeout(maxTime);
            setTimeout(function(){
                var el = document.getElementById('ds-preloader');
                if (el) { el.classList.add('fade-out'); setTimeout(function(){ el.style.display = 'none'; }, 500); }
            }, 200);
        } else {
            document.addEventListener('DOMContentLoaded', function(){
                clearTimeout(maxTime);
                setTimeout(function(){
                    var el = document.getElementById('ds-preloader');
                    if (el) { el.classList.add('fade-out'); setTimeout(function(){ el.style.display = 'none'; }, 500); }
                }, 200);
            });
        }
    })();
    </script>

    <div class="ds-paw-bg"></div>
    <div class="ds-page-wrapper">

        <header class="ds-topbar">
            <div class="ds-topbar-left">
                <button class="ds-topbar-toggle" id="sidebarToggle" aria-label="Toggle sidebar">
                    <i class="bi bi-list"></i>
                </button>
                <h1 class="ds-topbar-title"><?= $title ?></h1>
            </div>
            <div class="ds-topbar-right">
                <div class="ds-topbar-date">
                    <i class="bi bi-calendar3 me-1"></i><?= date('d M Y') ?>
                </div>
                <div class="ds-topbar-search">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Cari..." id="globalSearch">
                </div>
                <button class="ds-topbar-icon-btn" title="Notifikasi">
                    <i class="bi bi-bell"></i>
                    <span class="ds-notif-dot"></span>
                </button>
                <div class="dropdown">
                    <div class="ds-topbar-avatar dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="ds-topbar-avatar-img">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div class="d-none d-md-block">
                            <div class="ds-topbar-avatar-name"><?= $this->session->userdata('nama_lengkap') ?: 'Admin' ?></div>
                            <div class="ds-topbar-avatar-role"><?= ucfirst($this->session->userdata('role') ?: 'admin') ?></div>
                        </div>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end" style="border-radius:var(--ds-radius-sm);min-width:200px;box-shadow:var(--ds-shadow-lg);">
                        <li class="px-3 py-2">
                            <div class="fw-semibold" style="font-size:0.875rem;"><?= $this->session->userdata('nama_lengkap') ?: 'Admin' ?></div>
                            <div style="font-size:0.75rem;color:var(--ds-text-muted);">@<?= $this->session->userdata('username') ?: 'admin' ?></div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?= base_url('admin') ?>"><i class="bi bi-grid-1x2 me-2"></i>Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="<?= base_url('auth/logout') ?>"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <?php $this->load->view('templates/sidebar'); ?>

        <main class="ds-content">
