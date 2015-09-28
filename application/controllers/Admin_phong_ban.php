<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_phong_ban extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		session_start();
		if((!isset($_SESSION['name_user']))||
			($_SESSION['level']!=2)){
			redirect('home');
		}
	}
	public function index()
	{

			$this->load->view('header');
			$this->load->view('menu');

		$this->load->view('phong_ban_view');
		$this->load->view('footer');
	}
}