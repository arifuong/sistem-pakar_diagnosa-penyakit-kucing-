<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        chek_seesion(); // Enforce admin session
    }

    public function index()
    {
        $data['title'] = 'Dashboard Admin';

        // Statistics
        $data['jumlah_penyakit'] = $this->db->count_all('penyakit');
        $data['jumlah_gejala'] = $this->db->count_all('gejala');
        $data['jumlah_rule'] = $this->db->count_all('rule');
        $data['jumlah_konsultasi'] = $this->db->count_all('konsultasi');
        $data['jumlah_jenis'] = $this->db->count_all('jenis_kucing');
        $data['jumlah_pengguna'] = $this->db->count_all('users');

        // Latest consultations
        $this->db->select('k.*, hd.cf_persentase, p.nama_penyakit');
        $this->db->from('konsultasi k');
        $this->db->join('hasil_diagnosa hd', 'hd.id_hasil = (
            SELECT hd2.id_hasil
            FROM hasil_diagnosa hd2
            WHERE hd2.konsultasi_id = k.id_konsultasi
            ORDER BY hd2.cf_persentase DESC, hd2.id_hasil ASC
            LIMIT 1
        )', 'left', FALSE);
        $this->db->join('penyakit p', 'p.id_penyakit = hd.penyakit_id', 'left');
        $this->db->order_by('k.tanggal', 'DESC');
        $this->db->limit(5);
        $data['konsultasi_terbaru'] = $this->db->get()->result();
        foreach ($data['konsultasi_terbaru'] as $row) {
            if ($row->nama_penyakit === NULL) {
                $row->nama_penyakit = 'Tidak dapat menentukan diagnosis';
                $row->cf_persentase = 0;
            }
        }

        // Chart Data: Diseases diagnosed (primary only)
        $chart_data = $this->db->query(
            "SELECT p.id_penyakit, p.nama_penyakit, COUNT(*) as jumlah
             FROM hasil_diagnosa hd
             JOIN penyakit p ON p.id_penyakit = hd.penyakit_id
             WHERE hd.id_hasil = (
                SELECT hd2.id_hasil
                FROM hasil_diagnosa hd2
                WHERE hd2.konsultasi_id = hd.konsultasi_id
                ORDER BY hd2.cf_persentase DESC, hd2.id_hasil ASC
                LIMIT 1
             )
             GROUP BY p.id_penyakit, p.nama_penyakit
             ORDER BY jumlah DESC"
        )->result();
        
        $data['chart_labels'] = [];
        $data['chart_values'] = [];
        foreach ($chart_data as $row) {
            $data['chart_labels'][] = $row->nama_penyakit;
            $data['chart_values'][] = $row->jumlah;
        }

        // Pie Data: Consultations by breed
        $pie_data = $this->db->query(
            "SELECT jenis_kucing AS nama, COUNT(*) as jumlah
             FROM konsultasi
             WHERE jenis_kucing IS NOT NULL AND jenis_kucing != ''
             GROUP BY jenis_kucing
             ORDER BY jumlah DESC"
        )->result();
        
        $data['pie_labels'] = [];
        $data['pie_values'] = [];
        foreach ($pie_data as $row) {
            $data['pie_labels'][] = $row->nama;
            $data['pie_values'][] = $row->jumlah;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}
