<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forward_chaining
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function get_pertanyaan($kode_gejala)
    {
        $this->CI->db->select('rule.*, gejala.gejala, gejala.kode_gejala');
        $this->CI->db->from('rule');
        $this->CI->db->join('gejala', 'gejala.id_gejala = rule.gejala_id');
        $this->CI->db->where('gejala.kode_gejala', $kode_gejala);
        $row = $this->CI->db->get()->row();
        return $row;
    }

    public function proses_jawaban($kode_sekarang, $jawaban)
    {
        $this->CI->db->select('rule.*, gejala.kode_gejala');
        $this->CI->db->from('rule');
        $this->CI->db->join('gejala', 'gejala.id_gejala = rule.gejala_id');
        $this->CI->db->where('gejala.kode_gejala', $kode_sekarang);
        $rule = $this->CI->db->get()->row();

        if (!$rule) {
            return ['selesai' => TRUE, 'kode_penyakit' => NULL];
        }

        $next = ($jawaban === 'ya') ? $rule->ya : $rule->tidak;

        if (empty($next)) {
            return ['selesai' => TRUE, 'kode_penyakit' => NULL];
        }

        if (substr($next, 0, 1) === 'P') {
            return ['selesai' => TRUE, 'kode_penyakit' => $next];
        }

        return ['selesai' => FALSE, 'kode_selanjutnya' => $next];
    }

    public function get_penyakit($kode_penyakit)
    {
        return $this->CI->db->get_where('penyakit', ['kode_penyakit' => $kode_penyakit])->row_array();
    }

    public function get_gejala_penyakit($kode_penyakit)
    {
        $this->CI->db->select('gejala.kode_gejala, gejala.gejala');
        $this->CI->db->from('relasi');
        $this->CI->db->join('penyakit', 'relasi.penyakit_id = penyakit.id_penyakit');
        $this->CI->db->join('gejala', 'gejala.id_gejala = relasi.gejala_id');
        $this->CI->db->where('penyakit.kode_penyakit', $kode_penyakit);
        return $this->CI->db->get()->result();
    }

    public function hitung_persentase($gejala_dipilih, $kode_penyakit)
    {
        $this->CI->db->select('COUNT(*) as jumlah_relasi');
        $this->CI->db->from('relasi');
        $this->CI->db->join('penyakit', 'relasi.penyakit_id = penyakit.id_penyakit');
        $this->CI->db->where('penyakit.kode_penyakit', $kode_penyakit);
        $total = $this->CI->db->get()->row()->jumlah_relasi;

        if ($total == 0) return '0';

        $cocok = 0;
        foreach ($gejala_dipilih as $g) {
            $this->CI->db->from('relasi');
            $this->CI->db->join('penyakit', 'relasi.penyakit_id = penyakit.id_penyakit');
            $this->CI->db->where('penyakit.kode_penyakit', $kode_penyakit);
            $this->CI->db->where('relasi.gejala_id', $g);
            if ($this->CI->db->count_all_results() > 0) {
                $cocok++;
            }
        }
        return round(($cocok / $total) * 100);
    }
}
