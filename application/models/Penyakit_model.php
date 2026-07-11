<?php

class Penyakit_model extends CI_Model
{
    public function getKode()
    {
        $this->db->select_max('kode_penyakit', 'kode');
        $query = $this->db->get('penyakit')->row();
        $data = $query->kode;
        $noUrut = (int) substr($data, 1, 2);
        $noUrut++;
        return 'K' . sprintf('%02s', $noUrut);
    }

    public function getPenyakit()
    {
        return $this->db->get('penyakit')->result();
    }

    public function getPenyakitId($id)
    {
        return $this->db->get_where('penyakit', array('id_penyakit' => $id))->row();
    }

    public function insert()
    {
        $data = [
            'kode_penyakit' => $this->input->post('kode'),
            'penyakit' => $this->input->post('penyakit'),
            'solusi' => $this->input->post('solusi')
        ];
        $this->db->insert('penyakit', $data);

        $id = $this->db->select_max('id_penyakit', 'id')->get('penyakit')->row();

        $check = $this->input->post('gejala');
        if (is_array($check)) {
            foreach ($check as $object) {
                $this->db->insert('relasi', [
                    'penyakit_id' => $id->id,
                    'gejala_id' => $object
                ]);
            }
        }
    }

    public function update($id)
    {
        $data = [
            'penyakit' => $this->input->post('penyakit'),
            'solusi' => $this->input->post('solusi')
        ];
        $this->db->update('penyakit', $data, ['id_penyakit' => $id]);

        $this->db->delete('relasi', ['penyakit_id' => $id]);
        $check = $this->input->post('gejala');
        if (is_array($check)) {
            foreach ($check as $object) {
                $this->db->insert('relasi', [
                    'penyakit_id' => $id,
                    'gejala_id' => $object
                ]);
            }
        }
    }

    public function delete($id)
    {
        $this->db->delete('penyakit', ['id_penyakit' => $id]);
        $this->db->delete('relasi', ['penyakit_id' => $id]);
    }
}
