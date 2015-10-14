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
			redirect('Home');
		}
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">','</div>');
			$this->form_validation->set_rules('name','Email','required');
			$this->form_validation->set_rules('pass','Password','required');
			$this->form_validation->set_message('required', '%s chưa nhập.');
			if($this->form_validation->run()){
				
			$this->load->model('user');
			$res=new user();
			$res=$this->user->
				verify($this->input->post('name'),$this->input->post('pass'));
				if($res!==FALSE){
				$_SESSION['name_user']=$this->input->post('name');
				$query = $this->db->get('user');

    			foreach($query->result_array() as $row){
    			if ($row['name']==$_SESSION['name_user']) {
					$level = $row['level'];
					$ma_can_bo = $row['ma_can_bo'];

				}
        		}
				$_SESSION['level']=$level;
				$_SESSION['ma_can_bo'] = $ma_can_bo;

				redirect('home');

				
				}else{

					$data["error"]="Sai tên đăng nhập hoặc sai mật khẩu";
    				$this->load->view('login_form',$data);
				}		

			}else{

			}
			$this->load->view('login_form');
			$this->load->view('footer');

	}
		public function logout()
	{
		session_destroy();
		redirect('home');
	}
		public function delete($id=1)
	{
		if((!isset($_SESSION['name_user']))
			||($_SESSION['level']!=100)){
			redirect('Home');
		}
		$this->load->model('user');
		$this->db->delete('user', array('id' => $id)); 
		redirect('Quan_ly_nhan_su');
	}
	public function del($id=1)
	{

	}
}