<?php
class Tambahkeramba extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('user/tambah_keramba');
    }

    public function registration()
    {
        $this->form_validation->set_rules('nama-ker', 'Nama-ker', 'required|trim', [
            'required' => 'Nama keramba harus diisi'
        ]);
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required|trim|decimal', [
            'required' => 'Ukuran keramba harus diisi',
            'decimal' => 'Ukuran keramba harus desimal'
        ]);
        $this->form_validation->set_rules('tggl-install', 'Tggl-install', 'required|trim', [
            'required' => 'Tanggal instalasai keramba harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('user/tambah_keramba');
        } else {

            $data = [
                'nama' => htmlspecialchars($this->input->post('nama-ker', true)),
                'ukuran' => htmlspecialchars($this->input->post('ukuran', true)),
                'tanggal_install' => htmlspecialchars($this->input->post('tggl-install', true)),
                'user_id' => htmlspecialchars($this->db->insert('user', 'username'))
            ];

            $this->db->insert('keramba', $data);
            
            $this->session->set_flashdata('message', '<div class="alert alert-info">Anda berhasil melakukan perubahan!</div>');
            redirect('keramba');
            return true;
        }
    }
}
