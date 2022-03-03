<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('login/signin');
	}

	public function registration()
	{
		$this->form_validation->set_rules('user', 'User', 'required|trim', [
			'required' => 'Username harus diisi'
		]);
		$this->form_validation->set_rules('pass', 'Pass', 'required|trim', [
			'required' => 'Password harus diisi'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('login/signin');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$user = $this->input->post('user', true);
		$pass = $this->input->post('pass', true);
		$where = [
			'username' => $user,
			'password' => md5($pass)
		];

		$cek = $this->m_login->cek_login('user', $where)->num_rows();
		if ($cek > 0) {
			//jika user ada
			if (md5($pass)) {
				$data_session = [
					'username' => $user
				];
				$this->session->set_userdata($data_session);
				redirect('homepage_user');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pengguna belum terdaftar</div>');
			redirect('login');
		}
	}
}
