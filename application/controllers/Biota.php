<?php
class Biota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_biota');
    }

    public function index()
    {
        $data['biota'] = $this->m_biota->tampil_data()->result();
        $this->load->view('user/biota', $data);
    }

    public function hapus($biota_id)

    {
        $where = array('biota_id' => $biota_id);
        $this->m_biota->hapus_data($where, 'biota');
        redirect('biota');
    }

    public function edit($biota_id)
    {
        $where = array('biota_id' => $biota_id);
        $data['biota'] = $this->m_biota->edit_data($where, 'biota')->result();
        $this->load->view('user/ubah_biota', $data);
    }

    public function update()
    {
        $biota_id = $this->input->post('biota_id');
        $jenis = $this->input->post('jenis');
        $bobot = $this->input->post('bobot');
        $jumlah = $this->input->post('jumlah');
        $panjang = $this->input->post('panjang');
        $tggl_tbr = $this->input->post('tggl_tbr');
        $tggl_panen = $this->input->post('tggl_panen');

        $data = array(
            'jenis_biota' => $jenis,
            'bobot' => $bobot,
            'panjang' => $panjang,
            'jumlah_bibit' => $jumlah,
            'tanggal_tebar' => $tggl_tbr,
            'tanggal_panen' => $tggl_panen,
            'keramba_id' => htmlspecialchars($this->input->post('asl-keramba'))
        );

        $where = array(
            'biota_id' => $biota_id
        );

        $this->m_biota->update_data($where, $data, 'biota');
        redirect('biota');
    }
}
