<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quan_ly_nhan_su extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		session_start();
		if(!isset($_SESSION['name_user'])){

			redirect('home');
		} else{

		}
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->model('user');
		$this->load->helper('form');
		$this->load->library('form_validation');		
		$query = $this->db->get('user');



		$this->load->view('nhan_su_view',array(
			'query'=>$query,
		
			));
		$this->load->view('footer');

	}
}