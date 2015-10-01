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
			$this->form_validation->set_rules('name','Email','required');
			$this->form_validation->set_rules('pass','Password','required');
			if($this->form_validation->run()){
				
			$this->load->model('user');
			$res=new user();
			$res=$this->user->
				verify($this->input->post('name'),$this->input->post('pass'));
				if($res!==FALSE){
				$_SESSION['name_user']=$this->input->post('name');
				$query = $this->db->get('user');

    			foreach($query->result_array() as $row){
    			if ($row['name']==$_SESSION['name_user'])
        		$level = $row['level']; 
        		}
				$_SESSION['level']=$level;
				if($level==2)redirect('admin_phong_ban');
					else if($level==3)
						redirect('admin_tra_ho_so');
							else redirect('home');
				
				}else{

					$data["error"]="Sai tên đang nhập hoặc sai mật khẩu";
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
}