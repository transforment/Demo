<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_tra_ho_so extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		session_start();
		if((!isset($_SESSION['name_user']))||
			($_SESSION['level']!=3)){
			redirect('home');
		}
	}
	public function index()
	{

			$this->load->view('header');
			$this->load->view('menu');

		$this->load->view('tra_hs_view');
		$this->load->view('footer');
	}
}