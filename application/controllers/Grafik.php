<?php
class Grafik extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $data["title"] = "Grafik jumlah biota yang hidup";
        $this->load->model('m_grafik');
        $this->load->model('m_biota');
        $this->load->view('lib/header');
        
    }
    public function index(){
        $data['panen'] = $this->m_grafik->tampil_data()->result();
        $data['biota'] = $this->m_biota->tampil_data()->result();
        $this->load->view('user/v_grafik',$data);
        $this->load->view('lib/footer');
    }
}