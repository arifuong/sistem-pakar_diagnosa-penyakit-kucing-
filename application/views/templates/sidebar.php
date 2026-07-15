<?php $seg = $this->uri->segment(1); $seg2 = $this->uri->segment(2); ?>

<div class="ds-sidebar-overlay" id="sidebarOverlay"></div>

<aside class="ds-sidebar" id="dsSidebar">
    <div class="ds-sidebar-brand">
        <!-- Paw Icon SVG with Theme Colors -->
        <svg width="36" height="36" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M50 75c-4 0-8-6-8-14s4-14 8-14 8 6 8 14-4 14-8 14zm-16-22c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm32 0c-3 0-6-4-6-10s3-10 6-10 6 4 6 10-3 10-6 10zm-20-18c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8zm12 0c-3 0-5-3-5-8s3-8 5-8 5 3 5 8-3 8-5 8z" fill="var(--ds-primary)"/>
        </svg>
        <div>
            <span class="ds-brand-text">DiagnosaKu</span>
            <span class="ds-brand-sub">Expert System CF</span>
        </div>
    </div>

    <ul class="ds-sidebar-nav">
        <li class="ds-sidebar-nav-item">
            <a href="<?= base_url('admin') ?>" class="ds-sidebar-nav-link <?= ($seg === 'admin') ? 'active' : '' ?>">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="ds-sidebar-section">Data Master</li>
        <li class="ds-sidebar-nav-item">
            <a href="<?= base_url('penyakit') ?>" class="ds-sidebar-nav-link <?= ($seg === 'penyakit') ? 'active' : '' ?>">
                <i class="bi bi-virus2"></i>
                <span>Data Penyakit</span>
            </a>
        </li>
        <li class="ds-sidebar-nav-item">
            <a href="<?= base_url('gejala') ?>" class="ds-sidebar-nav-link <?= ($seg === 'gejala') ? 'active' : '' ?>">
                <i class="bi bi-clipboard-pulse"></i>
                <span>Data Gejala</span>
            </a>
        </li>
        <li class="ds-sidebar-nav-item">
            <a href="<?= base_url('rule') ?>" class="ds-sidebar-nav-link <?= ($seg === 'rule') ? 'active' : '' ?>">
                <i class="bi bi-diagram-3-fill"></i>
                <span>Data Rule</span>
            </a>
        </li>
        <li class="ds-sidebar-nav-item">
            <a href="<?= base_url('kucing') ?>" class="ds-sidebar-nav-link <?= ($seg === 'kucing') ? 'active' : '' ?>">
                <i class="bi bi-cat"></i>
                <span>Jenis Kucing</span>
            </a>
        </li>
        <li class="ds-sidebar-nav-item">
            <a href="<?= base_url('pengguna') ?>" class="ds-sidebar-nav-link <?= ($seg === 'pengguna') ? 'active' : '' ?>">
                <i class="bi bi-people-fill"></i>
                <span>Data Pengguna</span>
            </a>
        </li>

        <li class="ds-sidebar-section">Konsultasi</li>
        <li class="ds-sidebar-nav-item">
            <a href="<?= base_url('konsultasi') ?>" class="ds-sidebar-nav-link <?= ($seg === 'konsultasi' && $seg2 != 'hasil' && $seg2 != 'gejala') ? 'active' : '' ?>">
                <i class="bi bi-heart-pulse-fill"></i>
                <span>Mulai Konsultasi</span>
            </a>
        </li>
        <li class="ds-sidebar-nav-item">
            <a href="<?= base_url('hasil') ?>" class="ds-sidebar-nav-link <?= ($seg === 'hasil' || $seg2 == 'detail') ? 'active' : '' ?>">
                <i class="bi bi-clock-history"></i>
                <span>Riwayat Diagnosa</span>
            </a>
        </li>

        <li class="ds-sidebar-section">Akun</li>
        <li class="ds-sidebar-nav-item">
            <a href="<?= base_url('auth/logout') ?>" class="ds-sidebar-nav-link text-danger" onclick="return confirm('Yakin ingin logout?')">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</aside>
