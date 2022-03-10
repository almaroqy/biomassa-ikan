<?php

class M_panen extends CI_Model
{
    public function __construct()
	{
		$this->load->database();
	}

    function tampil_data()
    {

        return $this->db->get('panen');
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function graph()
    {
        $data = $this->db->query("SELECT * FROM panen");
    }
}