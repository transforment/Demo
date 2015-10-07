<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
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
		$query = $this->db->get_where('user',
			array('name' => $_SESSION['name_user']),1,0);



		$this->load->view('profile_view',array(
			'query'=>$query,
		
			));
		$this->load->view('footer');

	}
	public function change_pass()
	{
		$this->load->model('user');
		$this->load->helper('form');
			$this->load->library('form_validation');
		$query = $this->db->get_where('user',
			array('name' => $_SESSION['name_user']),1,0);
		$res=$this->user->
				verify($_SESSION['name_user'],$this->input->post('old'));
		if($res!==FALSE){
			if ($this->input->post('new')!=$this->input->post('renew')){
				$error=1;
    			redirect(site_url('Profile/errorview/'.$error.''));
			}else{
				$newpass=sha1($this->input->post('new'));
				$data = array(
               'pass' => $newpass

            );

			$this->db->where('name', $_SESSION['name_user']);
			$this->db->update('user', $data);
			 $error=3;
			redirect(site_url('Profile/errorview/'.$error.''));
			}
		}else{
			$error=2;
    		redirect(site_url('Profile/errorview/'.$error.''));
		}


	}
	public function change_name()
	{
		$this->load->model('user');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data = array(
               'name' => $this->input->post('namenew')

            );

			$this->db->where('name', $_SESSION['name_user']);
			$this->db->update('user', $data);
			 $error=4;
			  $_SESSION['name_user']= $this->input->post('namenew');
			redirect(site_url('Profile/errorview/'.$error.''));
		


	}
	public function errorview($e=1)
	{
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->model('user');

		$this->load->helper('form');
		$this->load->library('form_validation');		
		$query = $this->db->get_where('user',
			array('name' => $_SESSION['name_user']),1,0);
		if($e==2)$error="Sai mật khẩu";	
		if($e==1)$error="Mật khẩu mới không trùng nhau";	
		if($e==3)$error="Đã đổi mật khẩu";	
		if($e==4)$error="Đã đổi tên";
		$this->load->view('profile_view',array(
			'query'=>$query,
			'error'=>$error,
			));
		$this->load->view('footer');

	}	
}