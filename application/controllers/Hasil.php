<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        chek_seesion(); // Check if admin is logged in
    }

    public function index()
    {
        $data['title'] = 'Riwayat Konsultasi';
        $data['riwayat'] = $this->konsultasi_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('hasil/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Riwayat Konsultasi';
        $data['konsultasi'] = $this->konsultasi_model->get_hasil($id);
        $data['diagnosa'] = $this->konsultasi_model->get_diagnosa_by_konsultasi($id);
        $data['gejala_terpilih'] = $this->konsultasi_model->get_gejala_by_konsultasi($id);

        if (!$data['konsultasi']) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('hasil');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('hasil/detail', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->konsultasi_model->delete($id);
        $this->session->set_flashdata('success', 'Data riwayat berhasil dihapus!');
        redirect('hasil');
    }
}
