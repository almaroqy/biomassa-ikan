<?php
class History_model extends CI_Model
{
    public function getHistoryBiota($keramba_id)
    {
        $history = $this->db->query('SELECT * FROM biota WHERE tanggal_panen IS NOT NULL AND keramba_id='. $keramba_id)->result_array();

        return $history;
    }
}