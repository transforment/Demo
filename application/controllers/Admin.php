<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		session_start();

	}
	public function index()
	{

			$this->load->view('header');
			$this->load->view('menu');
		if (isset($_SESSION['name_user'])){
			redirect('add');
		}
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name','Email','required');
			$this->form_validation->set_rules('pass','Password','required');
			if($this->form_validation->run()){
				
			$this->load->model('user');
			$res=new user();
			$res=$this->user->
				verify($this->input->post('name'),$this->input->post('pass'));
				if($res!==FALSE){
				$_SESSION['name_user']=$this->input->post('name');
				echo $res->name;
				redirect('add');
				}else{

					//echo 'hhhhhh';
				}		



			}else{

			}


			$this->load->view('login_form');
			$this->load->view('footer');

	}
		public function logout()
	{
			$this->load->view('header');
			$this->load->view('menu');
			$this->load->helper('form');
		session_destroy();
		redirect('home');
	}
}