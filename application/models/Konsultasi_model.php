<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi_model extends CI_Model
{
    public function insert_konsultasi($data)
    {
        $this->db->insert('konsultasi', $data);
        return $this->db->insert_id();
    }

    public function insert_detail_konsultasi($konsultasi_id, $gejala_selected)
    {
        foreach ($gejala_selected as $gejala_id => $cf_user) {
            $cf_user = floatval($cf_user);
            if ($cf_user > 0) {
                $this->db->insert('detail_konsultasi', [
                    'konsultasi_id' => $konsultasi_id,
                    'gejala_id' => $gejala_id,
                    'cf_user' => $cf_user
                ]);
            }
        }
    }

    public function insert_hasil_diagnosa($konsultasi_id, $penyakit_results)
    {
        foreach ($penyakit_results as $result) {
            $this->db->insert('hasil_diagnosa', [
                'konsultasi_id' => $konsultasi_id,
                'penyakit_id' => $result['id_penyakit'],
                'cf_persentase' => $result['cf_percentage']
            ]);
        }
    }

    public function get_hasil($id)
    {
        return $this->db->get_where('konsultasi', ['id_konsultasi' => $id])->row();
    }

    public function get_diagnosa_by_konsultasi($id)
    {
        $this->db->select('hd.*, p.nama_penyakit, p.kode_penyakit, p.definisi, p.penyebab, p.pencegahan, s.solusi');
        $this->db->from('hasil_diagnosa hd');
        $this->db->join('penyakit p', 'p.id_penyakit = hd.penyakit_id');
        $this->db->join('solusi s', 's.penyakit_id = p.id_penyakit', 'left');
        $this->db->where('hd.konsultasi_id', $id);
        $this->db->order_by('hd.cf_persentase', 'DESC');
        return $this->db->get()->result();
    }

    public function get_gejala_by_konsultasi($id)
    {
        $this->db->select('dc.*, g.kode_gejala, g.nama_gejala');
        $this->db->from('detail_konsultasi dc');
        $this->db->join('gejala g', 'g.id_gejala = dc.gejala_id');
        $this->db->where('dc.konsultasi_id', $id);
        $this->db->order_by('g.kode_gejala', 'ASC');
        return $this->db->get()->result();
    }

    public function get_all()
    {
        // Get all consultations with their primary (highest CF%) diagnosis
        $this->db->select('k.*, hd.cf_persentase, p.nama_penyakit, p.kode_penyakit');
        $this->db->from('konsultasi k');
        $this->db->join('hasil_diagnosa hd', 'hd.id_hasil = (
            SELECT hd2.id_hasil
            FROM hasil_diagnosa hd2
            WHERE hd2.konsultasi_id = k.id_konsultasi
            ORDER BY hd2.cf_persentase DESC, hd2.id_hasil ASC
            LIMIT 1
        )', 'left', FALSE);
        $this->db->join('penyakit p', 'p.id_penyakit = hd.penyakit_id', 'left');
        $this->db->order_by('k.tanggal', 'DESC');
        $rows = $this->db->get()->result();

        foreach ($rows as $row) {
            if ($row->nama_penyakit === NULL) {
                $row->kode_penyakit = '-';
                $row->nama_penyakit = 'Tidak dapat menentukan diagnosis';
                $row->cf_persentase = 0;
            }
        }

        return $rows;
    }

    public function get_all_count()
    {
        return $this->db->count_all('konsultasi');
    }

    public function delete($id)
    {
        // Cascade delete on foreign keys will clean detail_konsultasi and hasil_diagnosa automatically
        return $this->db->delete('konsultasi', ['id_konsultasi' => $id]);
    }
}
