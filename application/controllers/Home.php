<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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
			$this->load->library('table');
 			$data = $this->Map->lay_ten_muc();
 			$num = $this->Map->lay_id(); 
			$com = array_combine($num, $data);

		//	$this->load->view('select',array('com'=>$com,));
			$this->load->view('footer');

	}
}
