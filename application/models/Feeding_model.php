<?php
class Feeding_model extends CI_Model
{
    public function getFeeding($keramba_id, $activity_id = null)
    {
        if ($activity_id === null) {
            return $this->db->get_where('feeding', ['keramba_id' => $keramba_id])->result_array();
        } else {
            return $this->db->get_where('feeding', ['keramba_id' => $keramba_id, 'activity_id' => $activity_id])->result_array();
        }
    }

    public function getFeedingDetail($activity_id)
    {
        return $this->db->get_where('detail_feeding', ['activity_id' => $activity_id])->result_array();
    }

    public function createFeeding($data)
    {
        if (!$this->db->insert('feeding', $data)) {
            $msg = $this->db->error();
            throw new Exception($msg['message'], $msg['code']);
        } else {
            return $this->db->affected_rows();
        }
    }

    public function updateFeeding($data, $activity_id)
    {
        if (!$this->db->update('feeding', $data, ['activity_id' => $activity_id])) {
            $msg = $this->db->error();
            throw new Exception($msg['message'], $msg['code']);
        } else {
            return $this->db->affected_rows();
        }
    }

    public function deleteFeeding($activity_id)
    {
        $this->db->delete('feeding', ['activity_id' => $activity_id]);

        return $this->db->affected_rows();
    }

    public function deleteDetailFeeding($detail_id)
    {
        $this->db->delete('detail_feeding', ['detail_id' => $detail_id]);

        return $this->db->affected_rows();
    }

    public function createDetailFeeding($data)
    {
        if (!$this->db->insert('detail_feeding', $data)) {
            $msg = $this->db->error();
            throw new Exception($msg['message'], $msg['code']);
        } else {
            return $this->db->affected_rows();
        }
    }
}
