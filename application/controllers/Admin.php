<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';

        $data['jumlah_penyakit'] = $this->db->count_all('penyakit');
        $data['jumlah_gejala'] = $this->db->count_all('gejala');
        $data['jumlah_rule'] = $this->db->count_all('rule');
        $data['jumlah_konsultasi'] = $this->db->count_all('konsultasi');
        $data['jumlah_jenis'] = $this->db->count_all('jenis');

        $data['konsultasi_terbaru'] = $this->db->query(
            "SELECT k.*, j.nama AS nama_jenis
             FROM konsultasi k
             LEFT JOIN jenis j ON k.id_jenis_kucing = j.id
             ORDER BY k.created_at DESC LIMIT 5"
        )->result();

        $chart_data = $this->db->query(
            "SELECT hasil_penyakit, COUNT(*) as jumlah
             FROM konsultasi
             GROUP BY hasil_penyakit
             ORDER BY jumlah DESC"
        )->result();
        $data['chart_labels'] = [];
        $data['chart_values'] = [];
        foreach ($chart_data as $row) {
            $data['chart_labels'][] = $row->hasil_penyakit;
            $data['chart_values'][] = $row->jumlah;
        }

        $pie_data = $this->db->query(
            "SELECT j.nama, COUNT(*) as jumlah
             FROM konsultasi k
             LEFT JOIN jenis j ON k.id_jenis_kucing = j.id
             WHERE j.nama IS NOT NULL
             GROUP BY j.nama
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
