<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Data Gejala';
        $data['gejala'] = $this->gejala->getGejala();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('gejala/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Gejala';
        $data['kode'] = $this->gejala->getKode();
        $data['id_gejala'] = $this->gejala->getKode();
        $data['kode_gejala'] = $this->gejala->getKode();
        $data['id'] = $this->gejala->getKode();

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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('gejala/ubah');
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('gejala', 'Gejala', 'required|trim');
        $this->form_validation->set_message('required', '{field} wajib diisi.');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal menyimpan data. ' . validation_errors());
            redirect('gejala/tambah');
        } else {
            $this->gejala->insert();
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect('gejala');
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('gejala', 'Gejala', 'required|trim');
        $this->form_validation->set_message('required', '{field} wajib diisi.');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal mengubah data. ' . validation_errors());
            redirect('gejala/ubah/' . $id);
        } else {
            $this->gejala->update($id);
            $this->session->set_flashdata('success', 'Data berhasil diubah!');
            redirect('gejala');
        }
    }

    public function delete($id)
    {
        $this->gejala->delete($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('gejala');
    }
}
