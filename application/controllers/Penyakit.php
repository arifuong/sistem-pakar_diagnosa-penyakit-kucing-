<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        chek_seesion(); // Check if admin is logged in
        $this->form_validation->set_message('required', '{field} wajib diisi.');
    }

    public function index()
    {
        $data['title'] = 'Data Penyakit & Solusi';
        $data['penyakit'] = $this->penyakit->getPenyakit();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('penyakit/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Penyakit';
        $data['kode'] = $this->penyakit->getKode();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('penyakit/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['title'] = 'Ubah Data Penyakit';
        $data['penyakit'] = $this->penyakit->getPenyakitId($id);

        if (!$data['penyakit']) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('penyakit');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('penyakit/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required|trim');
        $this->form_validation->set_rules('definisi', 'Definisi Penyakit', 'required|trim');
        $this->form_validation->set_rules('penyebab', 'Penyebab Penyakit', 'required|trim');
        $this->form_validation->set_rules('pencegahan', 'Pencegahan Penyakit', 'required|trim');
        $this->form_validation->set_rules('solusi', 'Solusi Penanganan', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal menyimpan data. ' . validation_errors());
            redirect('penyakit/tambah');
        } else {
            if ($this->penyakit->insert()) {
                $this->session->set_flashdata('success', 'Data penyakit berhasil disimpan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan data penyakit.');
            }
            redirect('penyakit');
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required|trim');
        $this->form_validation->set_rules('definisi', 'Definisi Penyakit', 'required|trim');
        $this->form_validation->set_rules('penyebab', 'Penyebab Penyakit', 'required|trim');
        $this->form_validation->set_rules('pencegahan', 'Pencegahan Penyakit', 'required|trim');
        $this->form_validation->set_rules('solusi', 'Solusi Penanganan', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal mengubah data. ' . validation_errors());
            redirect('penyakit/ubah/' . $id);
        } else {
            if ($this->penyakit->update($id)) {
                $this->session->set_flashdata('success', 'Data penyakit berhasil diubah!');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengubah data penyakit.');
            }
            redirect('penyakit');
        }
    }

    public function delete($id)
    {
        $this->penyakit->delete($id);
        $this->session->set_flashdata('success', 'Data penyakit berhasil dihapus!');
        redirect('penyakit');
    }
}
