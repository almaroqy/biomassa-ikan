<?php
class Biota_model extends CI_Model
{
    public function getBiota($keramba_id, $biota_id = null)
    {
        if ($biota_id === null) {
            return $this->db->get_where('biota', ['keramba_id' => $keramba_id])->result_array();
        } else {
            return $this->db->get_where('biota', ['biota_id' => $biota_id])->result_array();
        }
    }

    public function updateBiota($data, $biota_id)
    {
        if (!$this->db->update('biota', $data, ['biota_id' => $biota_id])) {
            $msg = $this->db->error();
            throw new Exception($msg['message'], $msg['code']);
        } else {
            return $this->db->affected_rows();
        }
    }

    public function deleteBiota($biota_id)
    {
        $this->db->delete('biota', ['biota_id' => $biota_id]);

        return $this->db->affected_rows();
    }

    public function createBiota($data)
    {
        if (!$this->db->insert('biota', $data)) {
            $msg = $this->db->error();
            throw new Exception($msg['message'], $msg['code']);
        } else {
            return $this->db->affected_rows();
        }
    }
}