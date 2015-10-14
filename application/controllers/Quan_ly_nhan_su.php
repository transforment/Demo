<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quan_ly_nhan_su extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		session_start();
		if((!isset($_SESSION['name_user']))||
			($_SESSION['level']!=100))
		{

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
	public function add_nhan_su($id=1){
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->model('user');
		$query = $this->db->get('user');

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">','</div>');
		$this->form_validation->set_message('required', '%s chưa nhập.');
		$this->form_validation->set_rules('hoten','Họ và tên','required');
		$this->form_validation->set_rules('name','Tên đăng nhập','required');
	//	$this->form_validation->set_rules('pass','Password','required');
		$this->form_validation->set_rules('mcb', 
			'Mã cán bộ', 'required');

		if($this->form_validation->run()){
			if ($this->user->check_name($this->input->post('name'))){
				if ($this->user->check_mcb($this->input->post('ma_can_bo'))){
					$data = array(
   					'name' => $this->input->post('name'),
   					'hoten' => $this->input->post('hoten') ,
   					'pass' => 'e727d1464ae12436e899a726da5b2f11d8381b26' ,
   					'ma_can_bo' => $this->input->post('mcb'),
   					'level' => $this->input->post('vitri')
						);

					$this->db->insert('user', $data);

		
					redirect('Quan_ly_nhan_su');
				}else{
					$error="Mã cán bộ trùng";
    				$this->load->view('nhan_su_view',array(
					'query'=>$query,'error'=>$error));
				}	
			}else{
				$error="Đã có người sử dụng tên này";
    			$this->load->view('nhan_su_view',array(
					'query'=>$query,'error'=>$error));				}
		}else{
		
		$this->load->view('nhan_su_view',array(
			'query'=>$query,));
			}
		$this->load->view('footer');

	}
}