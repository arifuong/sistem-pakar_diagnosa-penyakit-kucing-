<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Data Penyakit';
        $data['penyakit'] = $this->penyakit->getPenyakit();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('penyakit/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Penyakit';
        $data['kode'] = $this->penyakit->getKode();
        $data['gejala'] = $this->gejala->getGejala();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('penyakit/tambah');
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['title'] = 'Ubah Data Penyakit';
        $data['penyakit'] = $this->penyakit->getPenyakitId($id);
        $data['gejala'] = $this->gejala->getGejala();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('penyakit/ubah');
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('penyakit', 'Nama Penyakit', 'required|trim');
        $this->form_validation->set_rules('solusi', 'Solusi', 'required|trim');
        $this->form_validation->set_message('required', '{field} wajib diisi.');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal menyimpan data. ' . validation_errors());
            redirect('penyakit/tambah');
        } else {
            $this->penyakit->insert();
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect('penyakit');
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('penyakit', 'Nama Penyakit', 'required|trim');
        $this->form_validation->set_rules('solusi', 'Solusi', 'required|trim');
        $this->form_validation->set_message('required', '{field} wajib diisi.');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal mengubah data. ' . validation_errors());
            redirect('penyakit/ubah/' . $id);
        } else {
            $this->penyakit->update($id);
            $this->session->set_flashdata('success', 'Data berhasil diubah!');
            redirect('penyakit');
        }
    }

    public function delete($id)
    {
        $this->penyakit->delete($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('penyakit');
    }

    public function ubahRelasi()
    {
        $gejala_id = $this->input->post('gejalaId');
        $penyakit_id = $this->input->post('penyakitId');
        $data = ['penyakit_id' => $penyakit_id, 'gejala_id' => $gejala_id];
        $result = $this->db->get_where('relasi', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('relasi', $data);
        } else {
            $this->db->delete('relasi', $data);
        }
    }
}
