<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->form_validation->set_message('required', '{field} wajib diisi.');
        $this->form_validation->set_message('valid_email', '{field} harus berupa email yang valid.');
    }

    public function index()
    {
        $this->session->unset_userdata('konsultasi_data');
        $this->session->unset_userdata('diagnosa_id');
        $data['title'] = 'Identitas Kucing & Pemilik';
        $data['jenis'] = $this->kucing->getJenis();
        $this->load->view('konsultasi/index', $data);
    }

    public function mulai()
    {
        $this->form_validation->set_rules('nama', 'Nama Pemilik', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('id_jenis', 'Jenis Kucing', 'required');
        $this->form_validation->set_rules('namakucing', 'Nama Kucing', 'required|trim|callback_valid_nama_kucing');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Identitas Kucing & Pemilik';
            $data['jenis'] = $this->kucing->getJenis();
            $this->load->view('konsultasi/index', $data);
        } else {
            $konsultasi_data = [
                'nama' => $this->input->post('nama', TRUE),
                'email' => $this->input->post('email', TRUE),
                'jenis' => $this->input->post('id_jenis', TRUE),
                'namakucing' => $this->input->post('namakucing', TRUE)
            ];
            $this->session->set_userdata('konsultasi_data', $konsultasi_data);
            redirect('konsultasi/gejala');
        }
    }

    public function valid_nama_kucing($str)
    {
        if (strlen($str) < 2) {
            $this->form_validation->set_message('valid_nama_kucing', 'Nama Kucing minimal 2 karakter.');
            return FALSE;
        }
        if (ctype_digit($str)) {
            $this->form_validation->set_message('valid_nama_kucing', 'Nama Kucing tidak boleh hanya angka.');
            return FALSE;
        }
        if (preg_match('/<[^>]*>/', $str)) {
            $this->form_validation->set_message('valid_nama_kucing', 'Nama Kucing tidak boleh mengandung HTML atau script.');
            return FALSE;
        }
        return TRUE;
    }

    public function gejala()
    {
        $konsultasi_data = $this->session->userdata('konsultasi_data');
        if (!$konsultasi_data) {
            $this->session->set_flashdata('error', 'Silakan masukkan identitas kucing terlebih dahulu.');
            redirect('konsultasi');
            return;
        }

        $data['title'] = 'Pilih Gejala Kucing';
        $data['gejala'] = $this->gejala->getGejala();
        
        // Define standard CF options for user selection
        $data['cf_options'] = [
            '0.0' => 'Tidak Terjadi / Tidak Tahu (0.0)',
            '0.2' => 'Sedikit Yakin (0.2)',
            '0.4' => 'Cukup Yakin (0.4)',
            '0.6' => 'Yakin (0.6)',
            '0.8' => 'Sangat Yakin (0.8)',
            '1.0' => 'Pasti Terjadi (1.0)',
        ];

        $this->load->view('konsultasi/gejala', $data);
    }

    public function proses()
    {
        $konsultasi_data = $this->session->userdata('konsultasi_data');
        if (!$konsultasi_data) {
            redirect('konsultasi');
            return;
        }

        $gejala_input = $this->input->post('gejala', TRUE); // Array of gejala IDs
        $cf_user_input = $this->input->post('cf_user', TRUE); // Associative array [gejala_id => cf_value]

        if (empty($gejala_input) || !is_array($gejala_input)) {
            $this->session->set_flashdata('error', 'Silakan pilih minimal 1 gejala yang terlihat pada kucing.');
            redirect('konsultasi/gejala');
            return;
        }

        // Prepare the active symptom inputs with their corresponding user CFs
        $gejala_selected = [];
        foreach ($gejala_input as $gejala_id) {
            $cf_val = isset($cf_user_input[$gejala_id]) ? floatval($cf_user_input[$gejala_id]) : 0.0;
            if ($cf_val > 0) {
                $gejala_selected[$gejala_id] = $cf_val;
            }
        }

        if (empty($gejala_selected)) {
            $this->session->set_flashdata('error', 'Anda harus memilih tingkat keyakinan yang valid (> 0) untuk gejala yang dicentang.');
            redirect('konsultasi/gejala');
            return;
        }

        // Run Certainty Factor Inference
        $diagnosa_results = $this->certaintyfactor->diagnosa($gejala_selected);

        // Save consultation details
        $data_konsultasi = [
            'nama_pemilik' => $konsultasi_data['nama'],
            'email' => $konsultasi_data['email'],
            'nama_kucing' => $konsultasi_data['namakucing'],
            'jenis_kucing' => $konsultasi_data['jenis'],
            'tanggal' => date('Y-m-d H:i:s')
        ];
        
        $this->db->trans_start();

        $konsultasi_id = $this->konsultasi_model->insert_konsultasi($data_konsultasi);

        // Save selected symptoms
        $this->konsultasi_model->insert_detail_konsultasi($konsultasi_id, $gejala_selected);

        // Save diagnosis outcomes only when at least one disease has a positive CF.
        if (!empty($diagnosa_results)) {
            $this->konsultasi_model->insert_hasil_diagnosa($konsultasi_id, $diagnosa_results);
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal menyimpan hasil konsultasi. Silakan coba lagi.');
            redirect('konsultasi/gejala');
            return;
        }

        $this->session->set_userdata('diagnosa_id', $konsultasi_id);
        redirect('konsultasi/hasil');
    }

    public function hasil()
    {
        $diagnosa_id = $this->session->userdata('diagnosa_id');
        if (!$diagnosa_id) {
            redirect('konsultasi');
            return;
        }

        $data['title'] = 'Hasil Diagnosa Kucing';
        $data['konsultasi'] = $this->konsultasi_model->get_hasil($diagnosa_id);
        $data['diagnosa'] = $this->konsultasi_model->get_diagnosa_by_konsultasi($diagnosa_id);
        $data['gejala_terpilih'] = $this->konsultasi_model->get_gejala_by_konsultasi($diagnosa_id);

        // Clean up consultation data from session
        $this->session->unset_userdata('konsultasi_data');
        $this->session->unset_userdata('diagnosa_id');

        $this->load->view('konsultasi/hasil', $data);
    }
}
