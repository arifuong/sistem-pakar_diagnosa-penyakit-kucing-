<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        chek_seesion(); // Check if admin is logged in
        $this->form_validation->set_message('required', '{field} wajib diisi.');
        $this->form_validation->set_message('is_unique', '{field} sudah terdaftar.');
        $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
    }

    public function index()
    {
        $data['title'] = 'Data Pengguna';
        $data['pengguna'] = $this->db->order_by('username', 'ASC')->get('users')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('pengguna/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data Pengguna';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('pengguna/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['title'] = 'Ubah Data Pengguna';
        $data['user'] = $this->db->get_where('users', ['id' => $id])->row();

        if (!$data['user']) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('pengguna');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('pengguna/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('role', 'Hak Akses / Role', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal menyimpan data. ' . validation_errors());
            redirect('pengguna/tambah');
        } else {
            $data = [
                'username' => $this->input->post('username', TRUE),
                'password' => password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT, ['cost' => 12]),
                'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
                'role' => $this->input->post('role', TRUE)
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('success', 'Pengguna berhasil ditambahkan!');
            redirect('pengguna');
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('role', 'Hak Akses / Role', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal mengubah data. ' . validation_errors());
            redirect('pengguna/ubah/' . $id);
        } else {
            // Check if username unique for other IDs
            $username = $this->input->post('username', TRUE);
            $existing = $this->db->query("SELECT * FROM users WHERE username = ? AND id != ?", [$username, $id])->row();
            if ($existing) {
                $this->session->set_flashdata('error', 'Username sudah digunakan oleh orang lain.');
                redirect('pengguna/ubah/' . $id);
                return;
            }

            $data = [
                'username' => $username,
                'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
                'role' => $this->input->post('role', TRUE)
            ];

            // If password is changed
            $password = $this->input->post('password', TRUE);
            if (!empty($password)) {
                if (strlen($password) < 5) {
                    $this->session->set_flashdata('error', 'Password baru minimal 5 karakter.');
                    redirect('pengguna/ubah/' . $id);
                    return;
                }
                $data['password'] = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            }

            $this->db->update('users', $data, ['id' => $id]);
            $this->session->set_flashdata('success', 'Data pengguna berhasil diubah!');
            redirect('pengguna');
        }
    }

    public function delete($id)
    {
        // Don't delete the active logged in user
        if ($id == $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Anda tidak dapat menghapus diri sendiri!');
            redirect('pengguna');
            return;
        }

        $this->db->delete('users', ['id' => $id]);
        $this->session->set_flashdata('success', 'Pengguna berhasil dihapus!');
        redirect('pengguna');
    }
}
