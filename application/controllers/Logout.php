<?php
class Logout extends CI_Controller
{
    public function index()
    {
        $this->load->view('login/logout');
    }

    public function signout()
    {
        $this->session->sess_destroy();
        redirect(base_url('homepage'));
    }
}
