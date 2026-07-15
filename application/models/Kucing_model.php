<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kucing_model extends CI_Model
{
    public function getJenis()
    {
        return $this->db->order_by('id', 'ASC')->get('jenis_kucing')->result();
    }

    public function id_jenis()
    {
        $this->db->select('RIGHT(id, 2) as kode', FALSE);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('jenis_kucing');
        if ($query->num_rows() != 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 2, "0", STR_PAD_LEFT);
        $kodejadi = "JK" . $kodemax;
        return $kodejadi;
    }
}
