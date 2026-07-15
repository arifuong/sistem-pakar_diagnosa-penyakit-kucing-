<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit_model extends CI_Model
{
    public function getKode()
    {
        $this->db->select_max('kode_penyakit', 'kode');
        $query = $this->db->get('penyakit')->row();
        if ($query && $query->kode) {
            $data = $query->kode;
            $noUrut = (int) substr($data, 1);
            $noUrut++;
            return 'P' . sprintf('%02d', $noUrut);
        }
        return 'P01';
    }

    public function getPenyakit()
    {
        $this->db->select('penyakit.*, solusi.solusi');
        $this->db->from('penyakit');
        $this->db->join('solusi', 'solusi.penyakit_id = penyakit.id_penyakit', 'left');
        $this->db->order_by('penyakit.kode_penyakit', 'ASC');
        return $this->db->get()->result();
    }

    public function getPenyakitId($id)
    {
        $this->db->select('penyakit.*, solusi.solusi');
        $this->db->from('penyakit');
        $this->db->join('solusi', 'solusi.penyakit_id = penyakit.id_penyakit', 'left');
        $this->db->where('penyakit.id_penyakit', $id);
        return $this->db->get()->row();
    }

    public function insert()
    {
        $this->db->trans_start();

        $data_penyakit = [
            'kode_penyakit' => $this->input->post('kode', TRUE),
            'nama_penyakit' => $this->input->post('nama_penyakit', TRUE),
            'definisi' => $this->input->post('definisi', TRUE),
            'penyebab' => $this->input->post('penyebab', TRUE),
            'pencegahan' => $this->input->post('pencegahan', TRUE)
        ];
        $this->db->insert('penyakit', $data_penyakit);
        $penyakit_id = $this->db->insert_id();

        $data_solusi = [
            'penyakit_id' => $penyakit_id,
            'solusi' => $this->input->post('solusi', TRUE)
        ];
        $this->db->insert('solusi', $data_solusi);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        }

        return $penyakit_id;
    }

    public function update($id)
    {
        $this->db->trans_start();

        $data_penyakit = [
            'nama_penyakit' => $this->input->post('nama_penyakit', TRUE),
            'definisi' => $this->input->post('definisi', TRUE),
            'penyebab' => $this->input->post('penyebab', TRUE),
            'pencegahan' => $this->input->post('pencegahan', TRUE)
        ];
        $this->db->update('penyakit', $data_penyakit, ['id_penyakit' => $id]);

        // Check if solution already exists
        $check = $this->db->get_where('solusi', ['penyakit_id' => $id])->row();
        $data_solusi = [
            'solusi' => $this->input->post('solusi', TRUE)
        ];
        if ($check) {
            $this->db->update('solusi', $data_solusi, ['penyakit_id' => $id]);
        } else {
            $data_solusi['penyakit_id'] = $id;
            $this->db->insert('solusi', $data_solusi);
        }

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete($id)
    {
        // Foreign keys with cascade delete will automatically remove the corresponding rules and solutions
        return $this->db->delete('penyakit', ['id_penyakit' => $id]);
    }
}
