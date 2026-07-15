<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rule_model extends CI_Model
{
    public function getAllRule()
    {
        $this->db->select('rule.*, gejala.kode_gejala, gejala.nama_gejala, penyakit.kode_penyakit, penyakit.nama_penyakit');
        $this->db->from('rule');
        $this->db->join('gejala', 'gejala.id_gejala = rule.gejala_id');
        $this->db->join('penyakit', 'penyakit.id_penyakit = rule.penyakit_id');
        $this->db->order_by('penyakit.kode_penyakit', 'ASC');
        $this->db->order_by('gejala.kode_gejala', 'ASC');
        return $this->db->get()->result();
    }

    public function getAllRuleId($id)
    {
        $this->db->select('rule.*, gejala.kode_gejala, gejala.nama_gejala, penyakit.kode_penyakit, penyakit.nama_penyakit');
        $this->db->from('rule');
        $this->db->join('gejala', 'gejala.id_gejala = rule.gejala_id');
        $this->db->join('penyakit', 'penyakit.id_penyakit = rule.penyakit_id');
        $this->db->where('rule.id_rule', $id);
        return $this->db->get()->row();
    }

    public function insert()
    {
        $mb = floatval($this->input->post('mb'));
        $md = floatval($this->input->post('md'));
        $cf_pakar = $mb - $md;

        $data = [
            'penyakit_id' => $this->input->post('penyakit_id', TRUE),
            'gejala_id' => $this->input->post('gejala_id', TRUE),
            'mb' => $mb,
            'md' => $md,
            'cf_pakar' => $cf_pakar
        ];
        return $this->db->insert('rule', $data);
    }

    public function update($id)
    {
        $mb = floatval($this->input->post('mb'));
        $md = floatval($this->input->post('md'));
        $cf_pakar = $mb - $md;

        $data = [
            'penyakit_id' => $this->input->post('penyakit_id', TRUE),
            'gejala_id' => $this->input->post('gejala_id', TRUE),
            'mb' => $mb,
            'md' => $md,
            'cf_pakar' => $cf_pakar
        ];
        return $this->db->update('rule', $data, ['id_rule' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('rule', ['id_rule' => $id]);
    }
}
