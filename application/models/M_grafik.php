<?php
class M_grafik extends CI_Model{
 
    function tampil_data()
    {
        return $this->db->get('panen');
    }
 
}