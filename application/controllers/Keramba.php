<?php
class Keramba extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_keramba');
        $this->load->view('lib/header');
    }

    public function index()
    {
        $data['keramba'] = $this->m_keramba->tampil_data()->result();
        $this->load->view('user/keramba', $data);
        $this->load->view('lib/footer');
    }
    
     public function hapus($keramba_id)

    {
        $where = array('keramba_id' => $keramba_id);
        $this->m_keramba->hapus_data($where, 'keramba');
        redirect('keramba');
        $this->load->view('lib/footer');
    }

    public function edit($keramba_id)
    {
        $where = array('keramba_id' => $keramba_id);
        $data['keramba'] = $this->m_keramba->edit_data($where, 'keramba')->result();
        $this->load->view('user/ubah_keramba', $data);
        $this->load->view('lib/footer');
    }

    public function update()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama-ker', true)),
            'ukuran' => htmlspecialchars($this->input->post('ukuran', true)),
            'tanggal_install' => htmlspecialchars($this->input->post('tggl-install', true))
            ];

        $where = array(
            'keramba_id' => htmlspecialchars($this->input->post('ker-id', true)),
        );

        $this->m_keramba->update_data($where, $data, 'keramba');
        redirect('keramba');
        $this->load->view('lib/footer');
    }
}
