<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('forward_chaining');
        $this->form_validation->set_message('required', '{field} wajib diisi.');
        $this->form_validation->set_message('valid_email', '{field} harus berupa email yang valid.');
    }

    public function index()
    {
        $data['title'] = 'Konsultasi Diagnosa';
        $data['jenis'] = $this->kucing->getJenis();
        $this->load->view('konsultasi/index', $data);
    }

    public function mulai()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('id_jenis', 'Jenis Kucing', 'required');
        $this->form_validation->set_rules('namakucing', 'Nama Kucing', 'required|trim|callback_valid_nama_kucing');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Konsultasi Diagnosa';
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
            $this->session->set_userdata('gejala_dipilih', []);
            $this->session->set_userdata('kode_sekarang', 'G01');

            redirect('konsultasi/pertanyaan');
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

    public function pertanyaan()
    {
        $kode = $this->session->userdata('kode_sekarang');
        if (!$kode) {
            redirect('konsultasi');
            return;
        }

        $pertanyaan = $this->forward_chaining->get_pertanyaan($kode);
        if (!$pertanyaan) {
            $this->session->unset_userdata('kode_sekarang');
            redirect('konsultasi');
            return;
        }

        $data['title'] = 'Jawab Pertanyaan';
        $data['pertanyaan'] = $pertanyaan;
        $this->load->view('konsultasi/pertanyaan', $data);
    }

    public function jawab()
    {
        $jawaban = $this->input->post('jawaban', TRUE);
        if (!$jawaban || !in_array($jawaban, ['ya', 'tidak'])) {
            redirect('konsultasi/pertanyaan');
            return;
        }

        $kode_sekarang = $this->session->userdata('kode_sekarang');
        if (!$kode_sekarang) {
            redirect('konsultasi');
            return;
        }

        $gejala_dipilih = $this->session->userdata('gejala_dipilih');
        if (!is_array($gejala_dipilih)) {
            $gejala_dipilih = [];
        }

        $gejala_row = $this->db->get_where('gejala', ['kode_gejala' => $kode_sekarang])->row_array();
        if ($gejala_row) {
            $gejala_dipilih[] = $gejala_row['id_gejala'];
        }
        $this->session->set_userdata('gejala_dipilih', $gejala_dipilih);

        $hasil = $this->forward_chaining->proses_jawaban($kode_sekarang, $jawaban);

        if ($hasil['selesai']) {
            $this->session->set_userdata('kode_penyakit', $hasil['kode_penyakit']);
            $this->session->unset_userdata('kode_sekarang');
            redirect('konsultasi/hasil');
        } else {
            $this->session->set_userdata('kode_sekarang', $hasil['kode_selanjutnya']);
            redirect('konsultasi/pertanyaan');
        }
    }

    public function hasil()
    {
        $kode_penyakit = $this->session->userdata('kode_penyakit');
        $konsultasi_data = $this->session->userdata('konsultasi_data');
        $gejala_dipilih = $this->session->userdata('gejala_dipilih');

        if (!$kode_penyakit || !$konsultasi_data) {
            redirect('konsultasi');
            return;
        }

        $penyakit = $this->forward_chaining->get_penyakit($kode_penyakit);
        $gejala_penyakit = $this->forward_chaining->get_gejala_penyakit($kode_penyakit);
        $persentase = $this->forward_chaining->hitung_persentase($gejala_dipilih, $kode_penyakit);

        $gejala_dipilih_detail = [];
        foreach ($gejala_dipilih as $id) {
            $g = $this->db->get_where('gejala', ['id_gejala' => $id])->row();
            if ($g) $gejala_dipilih_detail[] = $g;
        }

        $kode_jenis = $this->db->get_where('jenis', ['nama' => $konsultasi_data['jenis']])->row_array();
        $id_jenis = $kode_jenis ? $kode_jenis['id'] : '';

        $data_db = [
            'nama_pemilik' => $konsultasi_data['nama'],
            'email' => $konsultasi_data['email'],
            'id_jenis_kucing' => $id_jenis,
            'nama_kucing' => $konsultasi_data['namakucing'],
            'gejala_dipilih' => json_encode($gejala_dipilih),
            'hasil_penyakit' => $penyakit['penyakit'],
            'solusi' => $penyakit['solusi'],
            'persentase' => $persentase . '%',
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->konsultasi_model->insert($data_db);

        $data['title'] = 'Hasil Diagnosa';
        $data['hasil'] = (object) [
            'nama' => $konsultasi_data['nama'],
            'email' => $konsultasi_data['email'],
            'jenis' => $konsultasi_data['jenis'],
            'namakucing' => $konsultasi_data['namakucing'],
            'penyakit' => $penyakit['penyakit'],
            'solusi' => $penyakit['solusi'],
            'persentase' => $persentase
        ];
        $data['gejala_dipilih'] = $gejala_dipilih_detail;
        $data['gejala_penyakit'] = $gejala_penyakit;

        $this->session->unset_userdata('konsultasi_data');
        $this->session->unset_userdata('gejala_dipilih');
        $this->session->unset_userdata('kode_sekarang');
        $this->session->unset_userdata('kode_penyakit');

        $this->load->view('konsultasi/hasil', $data);
    }
}
