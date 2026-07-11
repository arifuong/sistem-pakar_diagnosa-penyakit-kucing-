<?php

class Kucing_model extends CI_Model
{
    public function getJenis()
    {
        return $this->db->get('jenis')->result();
    }

    public function id_jenis()
    {
        $this->db->select('RIGHT(jenis.id,3) as kode', FALSE);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('jenis');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "M" . $kodemax;
        return $kodejadi;
    }
}
