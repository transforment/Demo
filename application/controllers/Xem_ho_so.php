<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xem_ho_so extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		session_start();

	}
	public function index()
	{
			$this->load->view('header');
			$this->load->view('menu');
			$this->load->model('Ho_so');
			$this->load->library('table');
 			$data = $this->Ho_so->loc_mshs($this->input->post('num_search'));
			$this->load->view('ho_so_view',array('data'=>$data));
			$this->load->view('footer');

	}
}
