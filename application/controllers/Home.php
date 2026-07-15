<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Sistem Pakar Diagnosa Penyakit Kucing';
        // Get some common diseases to show on home page
        $data['penyakit'] = $this->penyakit->getPenyakit();
        $this->load->view('home/index', $data);
    }

    public function tentang()
    {
        $data['title'] = 'Tentang Sistem Pakar';
        $this->load->view('home/tentang', $data);
    }

    public function penyakit_info()
    {
        $data['title'] = 'Informasi Penyakit Kucing';
        $data['penyakit'] = $this->penyakit->getPenyakit();
        $this->load->view('home/penyakit_info', $data);
    }
}
