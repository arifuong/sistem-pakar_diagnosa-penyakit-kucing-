<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('admin');
		}

		$data['title'] = 'Sistem Pakar Diagnosa Penyakit Kucing';
		$this->load->view('auth/login', $data);
	}

	public function login()
	{
		$this->admin->login();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
