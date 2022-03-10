<?php
class Panen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_panen');
    }

    public function index()
    {
        $data['panen'] = $this->m_panen->tampil_data()->result();
        $this->load->view('user/panen', $data);
        $this->load->view('lib/header', $data);
    }
}
