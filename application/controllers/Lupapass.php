<?php
class Lupapass extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('login/lupa_password');
    }

    public function registration()
    {
        $this->form_validation->set_rules('user', 'User', 'required|trim', [
            'required' => 'Username harus diisi'
        ]);
        $this->form_validation->set_rules('newpass1', 'Newpass1', 'required|trim|min_length[3]|matches[pass2]', [
            'required' => 'Password harus diisi',
            'matches' => 'Password tidak sama',
            'min_length' => 'Maukan minimal 3 karakter'
        ]);
        $this->form_validation->set_rules('newpass2', 'Newpass2', 'required|trim|min_length[3]|matches[pass1]', [
            'required' => 'Password harus diisi',
            'matches' => 'Password tidak sama',
            'min_length' => 'Maukan minimal 3 karakter'
        ]);

        // if ($this->form_validation->run() == false) {
        //     $this->load->view('login/lupa_password');
        // } else {

        //     $data = [
        //         'password' => md5($this->input->post('pass1'))
        //     ];


        //     $this->db->update()('user', $data);
        //     $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Selamat! Anda berhasil mendaftarkan akun, silahkan login.</div>');
        //     redirect('login');
        //     return true;
        // }
    }
}
