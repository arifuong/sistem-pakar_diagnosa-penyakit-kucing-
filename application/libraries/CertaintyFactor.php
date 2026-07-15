<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CertaintyFactor
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    /**
     * Run the Certainty Factor inference engine based on user selected symptoms.
     * 
     * @param array $gejala_user Associative array of [gejala_id => cf_user]
     * @return array List of diagnosed diseases with combined CF percentage, sorted desc
     */
    public function diagnosa($gejala_user)
    {
        // Filter out symptoms with 0 or empty CF user
        $active_gejala = [];
        foreach ($gejala_user as $id_gejala => $cf_val) {
            $cf_val = floatval($cf_val);
            if ($cf_val > 0) {
                $active_gejala[$id_gejala] = $cf_val;
            }
        }

        if (empty($active_gejala)) {
            return [];
        }

        // Get all diseases
        $diseases = $this->CI->db->get('penyakit')->result_array();
        $results = [];

        foreach ($diseases as $disease) {
            $disease_id = $disease['id_penyakit'];

            // Get rules for this disease
            $rules = $this->CI->db->get_where('rule', ['penyakit_id' => $disease_id])->result_array();
            
            $cf_gejala_list = [];
            $matched_symptoms = [];

            foreach ($rules as $rule) {
                $gejala_id = $rule['gejala_id'];
                
                // If user selected this symptom
                if (isset($active_gejala[$gejala_id])) {
                    $cf_user = $active_gejala[$gejala_id];
                    // CF pakar = MB - MD
                    $cf_pakar = floatval($rule['mb']) - floatval($rule['md']);
                    
                    // CF gejala = CF pakar * CF user
                    $cf_gejala = $cf_pakar * $cf_user;
                    
                    $cf_gejala_list[] = $cf_gejala;

                    // Get symptom details
                    $gejala_info = $this->CI->db->get_where('gejala', ['id_gejala' => $gejala_id])->row_array();

                    $matched_symptoms[] = [
                        'id_gejala' => $gejala_id,
                        'kode_gejala' => $gejala_info['kode_gejala'],
                        'nama_gejala' => $gejala_info['nama_gejala'],
                        'cf_user' => $cf_user,
                        'cf_pakar' => $cf_pakar,
                        'cf_gejala' => $cf_gejala
                    ];
                }
            }

            // If there are matched symptoms, combine their CF values
            if (!empty($cf_gejala_list)) {
                $cf_combined = $this->combine($cf_gejala_list);
                
                // Only consider positive certainty
                if ($cf_combined > 0) {
                    // Fetch solutions
                    $solutions = $this->CI->db->get_where('solusi', ['penyakit_id' => $disease_id])->result_array();
                    
                    $results[] = [
                        'id_penyakit' => $disease_id,
                        'kode_penyakit' => $disease['kode_penyakit'],
                        'nama_penyakit' => $disease['nama_penyakit'],
                        'definisi' => $disease['definisi'],
                        'penyebab' => $disease['penyebab'],
                        'pencegahan' => $disease['pencegahan'],
                        'cf_combine' => $cf_combined,
                        'cf_percentage' => round($cf_combined * 100, 2),
                        'matched_symptoms' => $matched_symptoms,
                        'solutions' => $solutions
                    ];
                }
            }
        }

        // Sort results by cf_combine descending
        usort($results, function ($a, $b) {
            return $b['cf_combine'] <=> $a['cf_combine'];
        });

        return $results;
    }

    /**
     * Sequential combination of CF values
     * 
     * @param array $cf_array Array of float CF values
     * @return float Combined CF value
     */
    public function combine($cf_array)
    {
        if (empty($cf_array)) {
            return 0.0;
        }
        if (count($cf_array) == 1) {
            return floatval($cf_array[0]);
        }

        $cf_combine = floatval($cf_array[0]);
        $count = count($cf_array);

        for ($i = 1; $i < $count; $i++) {
            $cf_new = floatval($cf_array[$i]);

            if ($cf_combine >= 0 && $cf_new >= 0) {
                // Rule 1: Both positive
                $cf_combine = $cf_combine + $cf_new * (1.0 - $cf_combine);
            } elseif ($cf_combine < 0 && $cf_new < 0) {
                // Rule 2: Both negative
                $cf_combine = $cf_combine + $cf_new * (1.0 + $cf_combine);
            } else {
                // Rule 3: One positive, one negative
                $cf_combine = ($cf_combine + $cf_new) / (1.0 - min(abs($cf_combine), abs($cf_new)));
            }
        }

        return $cf_combine;
    }
}
