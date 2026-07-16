<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kucing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        chek_seesion(); // Check if admin is logged in
        $this->form_validation->set_message('required', '{field} wajib diisi.');
    }

    public function index()
    {
        $data['title'] = 'Data Jenis Kucing';
        $data['jenis'] = $this->kucing->getJenis();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('kucing/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_jenis()
    {
        $data['title'] = 'Tambah Data Jenis Kucing';
        $data['id'] = $this->kucing->id_jenis();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('kucing/tambah_jenis', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $this->form_validation->set_rules('nama', 'Jenis Kucing', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal menyimpan data. ' . validation_errors());
            redirect('kucing/tambah_jenis');
        } else {
            $data = [
                'id' => $this->input->post('id', TRUE),
                'nama' => $this->input->post('nama', TRUE)
            ];
            $this->db->insert('jenis_kucing', $data);
            $this->session->set_flashdata('success', 'Data jenis kucing berhasil disimpan!');
            redirect('kucing');
        }
    }

    public function delete($id)
    {
        $this->db->delete('jenis_kucing', ['id' => $id]);
        $this->session->set_flashdata('success', 'Data jenis kucing berhasil dihapus!');
        redirect('kucing');
    }
}
