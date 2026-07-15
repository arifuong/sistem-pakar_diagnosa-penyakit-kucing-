<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        chek_seesion(); // Check if admin is logged in
        $this->form_validation->set_message('required', '{field} wajib diisi.');
    }

    public function index()
    {
        $data['title'] = 'Data Gejala';
        $data['gejala'] = $this->gejala->getGejala();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('gejala/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Gejala';
        $data['kode'] = $this->gejala->getKode();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('gejala/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['title'] = 'Ubah Data Gejala';
        $data['gejala'] = $this->gejala->getGejalaId($id);

        if (!$data['gejala']) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('gejala');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('gejala/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('nama_gejala', 'Nama Gejala', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Gejala', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal menyimpan data. ' . validation_errors());
            redirect('gejala/tambah');
        } else {
            $this->gejala->insert();
            $this->session->set_flashdata('success', 'Data gejala berhasil disimpan!');
            redirect('gejala');
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_gejala', 'Nama Gejala', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Gejala', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal mengubah data. ' . validation_errors());
            redirect('gejala/ubah/' . $id);
        } else {
            $this->gejala->update($id);
            $this->session->set_flashdata('success', 'Data gejala berhasil diubah!');
            redirect('gejala');
        }
    }

    public function delete($id)
    {
        $this->gejala->delete($id);
        $this->session->set_flashdata('success', 'Data gejala berhasil dihapus!');
        redirect('gejala');
    }
}
