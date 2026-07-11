<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{
    public function index()
    {
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $data['title'] = 'Riwayat Konsultasi';
        $data['riwayat'] = $this->konsultasi_model->get_all();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('hasil/index');
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $data['title'] = 'Detail Konsultasi';
        $data['hasil'] = $this->konsultasi_model->get_hasil($id);

        if (!$data['hasil']) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('hasil');
        }

        $gejala_ids = json_decode($data['hasil']->gejala_dipilih, true);
        $data['gejala_dipilih'] = [];
        if (is_array($gejala_ids)) {
            foreach ($gejala_ids as $gid) {
                $g = $this->db->get_where('gejala', ['id_gejala' => $gid])->row();
                if ($g) $data['gejala_dipilih'][] = $g;
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('hasil/detail');
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->konsultasi_model->delete($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('hasil');
    }
}
