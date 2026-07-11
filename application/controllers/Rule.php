<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rule extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Data Rule';
        $data['rule'] = $this->rule->getAllRule();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('rule/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Rule';
        $data['gejala'] = $this->gejala->getGejala();
        $data['rule'] = $this->rule->getRule();
        $data['penyakit'] = $this->penyakit->getPenyakit();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('rule/tambah');
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['title'] = 'Ubah Data Rule';
        $data['gejala'] = $this->gejala->getGejala();
        $data['penyakit'] = $this->penyakit->getPenyakit();
        $data['rule'] = $this->rule->getAllRuleId($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('rule/ubah');
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('gejala_id', 'Gejala', 'required');
        $this->form_validation->set_message('required', '{field} wajib dipilih.');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal menyimpan data. ' . validation_errors());
            redirect('rule/tambah');
        } else {
            $this->rule->insert();
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect('rule');
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('gejala_id', 'Gejala', 'required');
        $this->form_validation->set_message('required', '{field} wajib dipilih.');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal mengubah data. ' . validation_errors());
            redirect('rule/ubah/' . $id);
        } else {
            $this->rule->update($id);
            $this->session->set_flashdata('success', 'Data berhasil diubah!');
            redirect('rule');
        }
    }

    public function delete($id)
    {
        $this->rule->delete($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('rule');
    }
}
