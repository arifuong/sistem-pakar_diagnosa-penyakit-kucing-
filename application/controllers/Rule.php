<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rule extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        chek_seesion(); // Check if admin is logged in
        $this->form_validation->set_message('required', '{field} wajib dipilih/diisi.');
    }

    public function index()
    {
        $data['title'] = 'Data Rule (Basis Pengetahuan)';
        $data['rule'] = $this->rule->getAllRule();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('rule/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Rule';
        $data['gejala'] = $this->gejala->getGejala();
        $data['penyakit'] = $this->penyakit->getPenyakit();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('rule/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['title'] = 'Ubah Data Rule';
        $data['rule'] = $this->rule->getAllRuleId($id);
        $data['gejala'] = $this->gejala->getGejala();
        $data['penyakit'] = $this->penyakit->getPenyakit();

        if (!$data['rule']) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('rule');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('rule/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('penyakit_id', 'Penyakit', 'required');
        $this->form_validation->set_rules('gejala_id', 'Gejala', 'required');
        $this->form_validation->set_rules('mb', 'MB (Belief)', 'required|numeric|callback_valid_cf_value');
        $this->form_validation->set_rules('md', 'MD (Disbelief)', 'required|numeric|callback_valid_cf_value');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal menyimpan data. ' . validation_errors());
            redirect('rule/tambah');
        } else {
            // Check if rule already exists for this combination
            $exists = $this->db->get_where('rule', [
                'penyakit_id' => $this->input->post('penyakit_id'),
                'gejala_id' => $this->input->post('gejala_id')
            ])->row();

            if ($exists) {
                $this->session->set_flashdata('error', 'Rule untuk hubungan penyakit dan gejala tersebut sudah ada!');
                redirect('rule/tambah');
                return;
            }

            $this->rule->insert();
            $this->session->set_flashdata('success', 'Data rule berhasil disimpan!');
            redirect('rule');
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('penyakit_id', 'Penyakit', 'required');
        $this->form_validation->set_rules('gejala_id', 'Gejala', 'required');
        $this->form_validation->set_rules('mb', 'MB (Belief)', 'required|numeric|callback_valid_cf_value');
        $this->form_validation->set_rules('md', 'MD (Disbelief)', 'required|numeric|callback_valid_cf_value');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal mengubah data. ' . validation_errors());
            redirect('rule/ubah/' . $id);
        } else {
            $exists = $this->db->where('penyakit_id', $this->input->post('penyakit_id'))
                ->where('gejala_id', $this->input->post('gejala_id'))
                ->where('id_rule !=', $id)
                ->get('rule')
                ->row();

            if ($exists) {
                $this->session->set_flashdata('error', 'Rule untuk hubungan penyakit dan gejala tersebut sudah ada!');
                redirect('rule/ubah/' . $id);
                return;
            }

            $this->rule->update($id);
            $this->session->set_flashdata('success', 'Data rule berhasil diubah!');
            redirect('rule');
        }
    }

    public function valid_cf_value($value)
    {
        $value = floatval($value);
        if ($value < 0 || $value > 1) {
            $this->form_validation->set_message('valid_cf_value', '{field} harus bernilai antara 0.00 sampai 1.00.');
            return FALSE;
        }
        return TRUE;
    }

    public function delete($id)
    {
        $this->rule->delete($id);
        $this->session->set_flashdata('success', 'Data rule berhasil dihapus!');
        redirect('rule');
    }
}
