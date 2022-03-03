<?php
class Keramba_model extends CI_Model
{
    public function getAllKeramba($user_id, $keramba_id = null)
    {
        if ($keramba_id === null) {
            return $this->db->get_where('keramba', ['user_id' => $user_id])->result_array();
        } else {
            return $this->db->get_where('keramba', ['user_id' => $user_id, 'keramba_id' => $keramba_id])->result_array();
        }
    }

    public function deleteKeramba($keramba_id)
    {
        $this->db->delete('keramba', ['keramba_id' => $keramba_id]);

        return $this->db->affected_rows();
    }

    public function createKeramba($data)
    {
        if (!$this->db->insert('keramba', $data)) {
            $msg = $this->db->error();
            throw new Exception($msg['message'], $msg['code']);
        } else {
            return $this->db->affected_rows();
        }
    }

    public function updateKeramba($data, $keramba_id)
    {

        if (!$this->db->update('keramba', $data, ['keramba_id' => $keramba_id])) {
            $msg = $this->db->error();
            throw new Exception($msg['message'], $msg['code']);
        } else {
            return $this->db->affected_rows();
        }
    }
}
