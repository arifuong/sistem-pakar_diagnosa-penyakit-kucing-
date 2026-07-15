        </main>

    </div>

    <footer class="ds-footer">
        <div class="ds-footer-inner">
            <img src="<?= base_url('assets/images/illustrations/logo-diagnosaku.svg') ?>" alt="DiagnosaKu" style="width:20px;height:20px;opacity:0.7;border-radius:4px;">
            <small>&copy; <?= date('Y') ?> <strong>DiagnosaKu</strong> — Sistem Pakar Diagnosa Penyakit Kucing</small>
            <img src="<?= base_url('assets/images/illustrations/cat-paw-pattern.svg') ?>" alt="" style="width:16px;height:16px;opacity:0.5;border-radius:3px;">
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <?php if (!empty($chart_labels) || !empty($pie_labels)): ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <?php endif; ?>

    <?php if (!empty($chart_labels) || !empty($pie_labels)): ?>
    <script>
    function initCharts() {
        if (typeof Chart === 'undefined') return;

        <?php if (!empty($chart_labels)): ?>
        var canvas = document.getElementById('chartDiagnosa');
        if (canvas) {
            new Chart(canvas, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($chart_labels) ?>,
                    datasets: [{
                        label: 'Jumlah Diagnosa',
                        data: <?= json_encode($chart_values) ?>,
                        backgroundColor: [
                            'rgba(244, 162, 97, 0.75)',  // Primary Orange
                            'rgba(233, 196, 106, 0.75)', // Secondary Yellow
                            'rgba(42, 157, 143, 0.75)',  // Accent Teal
                            'rgba(38, 70, 83, 0.75)',    // Dark Charcoal
                            'rgba(231, 111, 81, 0.75)',   // Danger Coral
                            'rgba(244, 211, 185, 0.75)',
                            'rgba(224, 122, 95, 0.75)',
                            'rgba(246, 188, 143, 0.75)'
                        ],
                        borderColor: ['#F4A261','#E9C46A','#2A9D8F','#264653','#E76F51','#F4D3B9','#E07A5F','#F6BC8F'],
                        borderWidth: 1.5,
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: { backgroundColor: '#264653', titleFont: { family: "'Poppins'" }, bodyFont: { family: "'Poppins'" }, cornerRadius: 8, padding: 12 }
                    },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1, font: { family: "'Poppins'", size: 12 } }, grid: { color: 'rgba(0,0,0,0.04)' } },
                        x: { ticks: { font: { family: "'Poppins'", size: 11 }, maxRotation: 45 }, grid: { display: false } }
                    }
                }
            });
        }
        <?php endif; ?>

        <?php if (!empty($pie_labels)): ?>
        var canvas2 = document.getElementById('chartPie');
        if (canvas2) {
            new Chart(canvas2, {
                type: 'doughnut',
                data: {
                    labels: <?= json_encode($pie_labels) ?>,
                    datasets: [{
                        data: <?= json_encode($pie_values) ?>,
                        backgroundColor: [
                            '#F4A261', // Primary
                            '#E9C46A', // Secondary
                            '#2A9D8F', // Accent
                            '#264653', // Dark
                            '#E76F51', // Danger
                            '#F4D3B9',
                            '#E07A5F',
                            '#F6BC8F'
                        ],
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { font: { family: "'Poppins'", size: 11 }, padding: 12 }
                        }
                    },
                    cutout: '60%'
                }
            });
        }
        <?php endif; ?>
    }
    if (document.readyState === 'complete') initCharts();
    </script>
    <?php endif; ?>

    <script>
    $(function() {
        /* Hide preloader */
        var el = document.getElementById('ds-preloader');
        if (el && el.style.display !== 'none') { el.classList.add('fade-out'); setTimeout(function(){ el.style.display = 'none'; }, 500); }

        /* Sidebar toggle */
        $('#sidebarToggle').on('click', function() {
            $('#dsSidebar').toggleClass('open');
            $('#sidebarOverlay').toggleClass('active');
        });
        $('#sidebarOverlay').on('click', function() {
            $('#dsSidebar').removeClass('open');
            $(this).removeClass('active');
        });

        /* DataTables auto-init */
        try {
            if ($.fn.DataTable) {
                $('.ds-datatable').DataTable({
                    language: {
                        search: "<i class='bi bi-search'></i> _INPUT_",
                        lengthMenu: "Tampilkan _MENU_ data",
                        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                        infoEmpty: "Tidak ada data",
                        infoFiltered: "(disaring dari _MAX_ total)",
                        zeroRecords: "Tidak ada data yang cocok",
                        paginate: { first: "Pertama", last: "Terakhir", next: "<i class='bi bi-chevron-right'></i>", previous: "<i class='bi bi-chevron-left'></i>" }
                    }
                });
            }
        } catch(e) {}

        /* Flash messages via SweetAlert2 — read flashdata once per key into variables */
        <?php
        $flash_success = $this->session->flashdata('success');
        $flash_error   = $this->session->flashdata('error');
        $flash_warning = $this->session->flashdata('warning');
        $flash_info    = $this->session->flashdata('info');
        ?>
        <?php if ($flash_success): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: <?= json_encode($flash_success) ?>,
            confirmButtonColor: '#F4A261',
            timer: 3000,
            timerProgressBar: true,
            customClass: { popup: 'ds-swal' }
        });
        <?php endif; ?>
        <?php if ($flash_error): ?>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: <?= json_encode($flash_error) ?>,
            confirmButtonColor: '#E76F51',
            customClass: { popup: 'ds-swal' }
        });
        <?php endif; ?>
        <?php if ($flash_warning): ?>
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan!',
            text: <?= json_encode($flash_warning) ?>,
            confirmButtonColor: '#F4A261',
            customClass: { popup: 'ds-swal' }
        });
        <?php endif; ?>
        <?php if ($flash_info): ?>
        Swal.fire({
            icon: 'info',
            title: 'Informasi',
            text: <?= json_encode($flash_info) ?>,
            confirmButtonColor: '#2A9D8F',
            customClass: { popup: 'ds-swal' }
        });
        <?php endif; ?>
    });

    /* Delete confirmations */
    document.querySelectorAll('.btn-hapus, .btn-delete').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            var form = this.closest('form');
            Swal.fire({
                title: 'Hapus Data?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#E76F51',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                customClass: { popup: 'ds-swal' }
            }).then(function(result) {
                if (result.isConfirmed) form.submit();
            });
        });
    });
    </script>
</body>
</html>
