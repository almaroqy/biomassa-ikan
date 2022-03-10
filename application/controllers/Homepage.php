<?php
class Homepage extends CI_Controller
{
	public function index()
	{
		$this->load->view('visitor/dashboard_visitor');
		$this->load->view('lib/header_visitor');
	}
}