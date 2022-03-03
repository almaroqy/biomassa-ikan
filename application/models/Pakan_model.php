<?php
class Pakan_model extends CI_Model
{
    public function getPakan($user_id, $pakan_id = null)
    {
        if ($pakan_id == null) {
            return $this->db->get_where('pakan', ['user_id' => $user_id])->result_array();
        } else {
            return $this->db->get_where('pakan', ['pakan_id' => $pakan_id, 'user_id' => $user_id])->result_array();
        }
    }

    public function createPakan($data)
    {
        if (!$this->db->insert('pakan', $data)) {
            $msg = $this->db->error();
            throw new Exception($msg['message'], $msg['code']);
        } else {
            return $this->db->affected_rows();
        }
    }

    public function updatePakan($pakan_id, $data)
    {
        if (!$this->db->update('pakan', $data, ['pakan_id' => $pakan_id])){
            $msg = $this->db->error();
            throw new Exception($msg['message'], $msg['code']);
        } else {
            return $this->db->affected_rows();
        }
    }


    public function deletePakan($pakan_id)
    {
        $this->db->delete('pakan', ['pakan_id' => $pakan_id]);

        return $this->db->affected_rows();
    }
}
