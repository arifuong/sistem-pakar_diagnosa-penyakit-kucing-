<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala_model extends CI_Model
{
    public function getKode()
    {
        $this->db->select_max('kode_gejala', 'kode');
        $query = $this->db->get('gejala')->row();
        if ($query && $query->kode) {
            $data = $query->kode;
            $noUrut = (int) substr($data, 1);
            $noUrut++;
            return 'G' . sprintf('%02d', $noUrut);
        }
        return 'G01';
    }

    public function getGejala()
    {
        return $this->db->order_by('kode_gejala', 'ASC')->get('gejala')->result();
    }

    public function getGejalaId($id)
    {
        return $this->db->get_where('gejala', ['id_gejala' => $id])->row();
    }

    public function getGejalaKode($kode)
    {
        return $this->db->get_where('gejala', ['kode_gejala' => $kode])->row();
    }

    public function insert()
    {
        $data = [
            'kode_gejala' => $this->input->post('kode', TRUE),
            'nama_gejala' => $this->input->post('nama_gejala', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE)
        ];
        return $this->db->insert('gejala', $data);
    }

    public function update($id)
    {
        $data = [
            'nama_gejala' => $this->input->post('nama_gejala', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE)
        ];
        return $this->db->update('gejala', $data, ['id_gejala' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('gejala', ['id_gejala' => $id]);
    }
}
