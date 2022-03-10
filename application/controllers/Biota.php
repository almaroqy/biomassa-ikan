<?php
class Biota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_biota');
		$this->load->helper('url');
        $this->load->view('lib/header');
        
    }

    public function index()
    {
        $data['biota'] = $this->m_biota->tampil_data()->result();
        $this->load->view('user/biota', $data);
        $this->load->view('lib/footer');
    }

    public function hapus($biota_id)

    {
        $where = array('biota_id' => $biota_id);
        $this->m_biota->hapus_data($where, 'biota');
        redirect('biota');
        $this->load->view('lib/footer');
    }

    public function edit($biota_id)
    {
        $where = array('biota_id' => $biota_id);
        $data['biota'] = $this->m_biota->edit_data($where, 'biota')->result();
        $this->load->view('user/ubah_biota', $data);
        $this->load->view('lib/footer');
    }

    public function update()
    {
        $data = [
            'jenis_biota' => htmlspecialchars($this->input->post('jenis', true)),
            'bobot' => htmlspecialchars($this->input->post('bobot', true)),
            'jumlah_bibit' => htmlspecialchars($this->input->post('jumlah', true)),
            'panjang' => htmlspecialchars($this->input->post('panjang', true)),
            'tanggal_tebar' => htmlspecialchars($this->input->post('tggl-tbr', true)),
            'tanggal_panen' => htmlspecialchars($this->input->post('tggl-panen', true)),
            'keramba_id' => htmlspecialchars($this->input->post('asl-keramba', true))
            ];

        $where = array(
            'biota_id' => htmlspecialchars($this->input->post('biota_id', true))
        );

        $this->m_biota->update_data($where, $data, 'biota');
        redirect('biota');
        $this->load->view('lib/footer');
    }
}
