<?php

class Panen_model extends CI_Model
{
    public function createPanen($data)
    {
        $this->db->trans_start();
        $this->db->insert('panen', $data);
        $this->db->update('biota', ['tanggal_panen' => $data['tanggal_panen']], ['biota_id' => $data['biota_id']]);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            throw new Exception("Transaction Failed");
        } else {
            return true;
        }
    }

    public function getPanen($keramba_id, $user_id = null)
    {
        if ($user_id === null) {
            return $this->db->get_where('panen', ['keramba_id' => $keramba_id])->result_array();
        } else {
            return $this->db->get_where('panen', ['user_id' => $user_id])->result_array();
        }
    }
}
