<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hanh_chinh_dat_dai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		session_start();

	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->model('Map');
		$data=$this->Map->lay_ten_muc(32);
		$num = $this->Map->lay_id(32);
		$com = array_combine($num, $data);

		$this->load->view('content_datdai',array('com'=>$com));
		$this->load->view('footer');
	}

}
