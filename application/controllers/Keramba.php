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
        $keramba_id = $this->input->post('ker-id');
        $nama_ker = $this->input->post('nama-ker');
        $ukuran = $this->input->post('ukuran');
        $tggl_install = $this->input->post('tggl-install');

        $data = array(
            'nama' => $nama_ker,
            'ukuran' => $ukuran,
            'tanggal_install' => $tggl_install,
            'user_id' => htmlspecialchars($this->db->insert('user', 'user_id'))
        );

        $where = array(
            'keramba_id' => $keramba_id
        );

        $this->m_keramba->update_data($where, $data, 'keramba');
        redirect('keramba');
        $this->load->view('lib/footer');
    }
}
