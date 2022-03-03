<?php
class Pengukuranikan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('user/pengukuran_ikan');
    }

    public function registration()
    {
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim', [
            'required' => 'Jenis biota harus diisi'
        ]);
        $this->form_validation->set_rules('bobot', 'Bobot', 'required|trim|decimal', [
            'required' => 'Bobot ikan harus diisi',
            'decimal' => 'Bilangan harus desimal'
        ]);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|integer', [
            'required' => 'Jumlah ikan harus diisi'
        ]);
        $this->form_validation->set_rules('panjang', 'Panjang', 'required|trim|decimal', [
            'required' => 'Panjang ikan harus diisi',
            'decimal' => 'Bilangan harus desimal',
            'integer' => 'Masukan harus angka'
        ]);
        $this->form_validation->set_rules('tggl-panen', 'Tggl-panen', 'required|trim', [
            'required' => 'Tanggal panen harus diisi'
        ]);
        $this->form_validation->set_rules('asl-keramba', 'Asl-keramba', 'required|trim|integer', [
            'required' => 'Panjang ikan harus diisi',
            'integer' => 'Masukan harus angka'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('user/tambah_biota');
        } else {
            $data = [
                'jenis_biota' => htmlspecialchars($this->input->post('jenis', true)),
                'bobot' => htmlspecialchars($this->input->post('bobot', true)),
                'panjang' => htmlspecialchars($this->input->post('panjang', true)),
                'jumlah_bibit' => htmlspecialchars($this->input->post('jumlah', true)),
                'tanggal_tebar' => htmlspecialchars($this->input->post('tggl_tbr', true)),
                'tanggal_panen' => htmlspecialchars($this->input->post('tggl_panen', true)),
                'keramba_id' => htmlspecialchars($this->input->post('asl-keramba', true))
            ];

            $this->db->insert('biota', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Anda berhasil melakukan perubahan!</div>');
            redirect('biota');
            return true;
        }
    }
}
