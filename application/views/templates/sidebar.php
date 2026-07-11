<?php $seg = $this->uri->segment(1); $seg2 = $this->uri->segment(2); ?>

<div class="ds-sidebar-overlay" id="sidebarOverlay"></div>

<aside class="ds-sidebar" id="dsSidebar">
    <div class="ds-sidebar-brand">
        <img src="<?= base_url('assets/images/illustrations/logo-diagnosaku.svg') ?>" alt="DiagnosaKu" style="width:42px;height:42px;border-radius:10px;">
        <div>
            <span class="ds-brand-text">DiagnosaKu</span>
            <span class="ds-brand-sub">Expert System</span>
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
                <i class="bi bi-virus"></i>
                <span>Penyakit</span>
            </a>
        </li>
        <li class="ds-sidebar-nav-item">
            <a href="<?= base_url('gejala') ?>" class="ds-sidebar-nav-link <?= ($seg === 'gejala') ? 'active' : '' ?>">
                <i class="bi bi-clipboard2-pulse"></i>
                <span>Gejala</span>
            </a>
        </li>
        <li class="ds-sidebar-nav-item">
            <a href="<?= base_url('rule') ?>" class="ds-sidebar-nav-link <?= ($seg === 'rule') ? 'active' : '' ?>">
                <i class="bi bi-diagram-3"></i>
                <span>Rule</span>
            </a>
        </li>
        <li class="ds-sidebar-nav-item">
            <a href="<?= base_url('kucing') ?>" class="ds-sidebar-nav-link <?= ($seg === 'kucing') ? 'active' : '' ?>">
                <i class="bi bi-cat"></i>
                <span>Jenis Kucing</span>
            </a>
        </li>

        <li class="ds-sidebar-section">Konsultasi</li>
        <li class="ds-sidebar-nav-item">
            <a href="<?= base_url('konsultasi') ?>" class="ds-sidebar-nav-link <?= ($seg === 'konsultasi' && !$seg2) ? 'active' : '' ?>">
                <i class="bi bi-heart-pulse"></i>
                <span>Mulai Konsultasi</span>
            </a>
        </li>
        <li class="ds-sidebar-nav-item">
            <a href="<?= base_url('hasil') ?>" class="ds-sidebar-nav-link <?= ($seg === 'hasil') ? 'active' : '' ?>">
                <i class="bi bi-clock-history"></i>
                <span>Riwayat Diagnosa</span>
            </a>
        </li>

        <li class="ds-sidebar-section">Akun</li>
        <li class="ds-sidebar-nav-item">
            <a href="<?= base_url('auth/logout') ?>" class="ds-sidebar-nav-link" onclick="return confirm('Yakin ingin logout?')">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</aside>
