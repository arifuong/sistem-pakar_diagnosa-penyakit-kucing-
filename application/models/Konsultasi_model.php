<?php

class Konsultasi_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('konsultasi', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->update('konsultasi', $data, ['id' => $id]);
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('konsultasi', ['id' => $id])->row_array();
    }

    public function get_hasil($id)
    {
        $this->db->select('konsultasi.*, jenis.nama as nama_jenis');
        $this->db->from('konsultasi');
        $this->db->join('jenis', 'jenis.id = konsultasi.id_jenis_kucing', 'left');
        $this->db->where('konsultasi.id', $id);
        return $this->db->get()->row();
    }

    public function get_all()
    {
        $this->db->select('konsultasi.*, jenis.nama as nama_jenis');
        $this->db->from('konsultasi');
        $this->db->join('jenis', 'jenis.id = konsultasi.id_jenis_kucing', 'left');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function delete($id)
    {
        $this->db->delete('konsultasi', ['id' => $id]);
    }
}
