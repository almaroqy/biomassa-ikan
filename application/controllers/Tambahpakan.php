<?php
class Tambahpakan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('user/tambah_pakan');
    }

    public function registration()
    {
        $this->form_validation->set_rules('nama-pak', 'Nama-pak', 'required|trim', [
            'required' => 'Nama pakan harus diisi'
        ]);
        $this->form_validation->set_rules('id-user-pakan', 'Id-user-pakan', 'required|trim', [
            'required' => 'ID yang menambahkan pakan harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('user/tambah_pakan');
        } else {

            $data = [
                'jenis_pakan' => htmlspecialchars($this->input->post('nama-pak', true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'user_id' => htmlspecialchars($this->input->post('id-user-pakan', true))
            ];

            $this->db->insert('pakan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info">Anda berhasil melakukan perubahan!</div>');
            redirect('pakan');
            return true;
        }
    }
}
