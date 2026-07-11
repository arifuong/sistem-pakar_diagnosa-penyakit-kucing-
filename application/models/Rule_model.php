<?php

class Rule_model extends CI_Model
{
    public function getKode()
    {
        $this->db->select_max('kode', 'kode');
        $query = $this->db->get('penyakit')->row();
        $data = $query->kode;
        $noUrut = (int) substr($data, 1, 2);
        $noUrut++;
        return 'G' . sprintf('%02s', $noUrut);
    }

    public function getAllRule()
    {
        $this->db->select('*');
        $this->db->from('rule');
        $this->db->join('gejala', 'gejala.id_gejala = rule.gejala_id');
        return $this->db->get()->result();
    }

    public function getAllRuleId($id)
    {
        $this->db->select('*');
        $this->db->from('rule');
        $this->db->join('gejala', 'gejala.id_gejala = rule.gejala_id', 'left');
        $this->db->join('penyakit', 'penyakit.id_penyakit = rule.penyakit_id', 'left');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function getRule()
    {
        return $this->db->get('rule')->result();
    }

    public function getDataParent($kode_parent)
    {
        if ($kode_parent == NULL) {
            return 'Pilih Gejala';
        }
        $data = $this->db->get_where('gejala', array('kode_gejala' => $kode_parent))->row();
        return $data->kode_gejala . ' - ' . $data->gejala;
    }

    public function getDataYa($kode_ya)
    {
        if ($kode_ya == NULL) {
            return 'Pilih Gejala';
        }
        $data = $this->db->get_where('gejala', array('kode_gejala' => $kode_ya))->row();
        return $data->kode_gejala . ' - ' . $data->gejala;
    }

    public function getDataTidak($kode_tidak)
    {
        if ($kode_tidak == NULL) {
            return 'Pilih Gejala';
        }
        $data = $this->db->get_where('gejala', array('kode_gejala' => $kode_tidak))->row();
        return $data->kode_gejala . ' - ' . $data->gejala;
    }

    public function insert()
    {
        $gejala_parent = $this->input->post('gejala_parent') !== "" ? $this->input->post('gejala_parent') : null;
        $gejala_ya = $this->input->post('gejala_ya') !== "" ? $this->input->post('gejala_ya') : null;
        $gejala_tidak = $this->input->post('gejala_tidak') !== "" ? $this->input->post('gejala_tidak') : null;

        $this->db->insert('rule', [
            'gejala_id' => $this->input->post('gejala_id'),
            'parent' => $gejala_parent,
            'ya' => $gejala_ya,
            'tidak' => $gejala_tidak
        ]);
    }

    public function update($id)
    {
        $gejala_parent = $this->input->post('gejala_parent') !== "" ? $this->input->post('gejala_parent') : null;
        $gejala_ya = $this->input->post('gejala_ya') !== "" ? $this->input->post('gejala_ya') : null;
        $gejala_tidak = $this->input->post('gejala_tidak') !== "" ? $this->input->post('gejala_tidak') : null;

        $this->db->update('rule', [
            'gejala_id' => $this->input->post('gejala_id'),
            'parent' => $gejala_parent,
            'ya' => $gejala_ya,
            'tidak' => $gejala_tidak
        ], ['id' => $id]);
    }

    public function delete($id)
    {
        $this->db->delete('rule', ['id' => $id]);
    }
}
