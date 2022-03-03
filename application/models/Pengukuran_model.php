<?php

class Pengukuran_model extends CI_Model
{
    public function getPengukuran($biota_id)
    {
        return $this->db->order_by('tanggal_ukur', 'DESC')->get_where('pengukuran', ['biota_id' => $biota_id], 10)->result_array();
    }


    public function createPengukuran($data)
    {
        if (!$this->db->insert('pengukuran', $data)) {
            $msg = $this->db->error();
            throw new Exception($msg['message'], $msg['code']);
        } else {
            return $this->db->affected_rows();
        }
    }

    public function updatePengukuran($pengukuran_id, $data)
    {
        if (!$this->db->update('pengukuran', $data, ['pengukuran_id' => $pengukuran_id])) {
            $msg = $this->db->error();
            throw new Exception($msg['message'], $msg['code']);
        } else {
            return $this->db->affected_rows();
        }
    }

    public function deletePengukuran($pengukuran_id)
    {
        $this->db->delete('pengukuran', ['pengukuran_id' => $pengukuran_id]);

        return $this->db->affected_rows();
    }
}
