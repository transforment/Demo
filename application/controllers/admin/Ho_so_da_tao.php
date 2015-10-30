<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ho_so_da_tao extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if((!isset($_SESSION['name_user']))||
			(($_SESSION['level']!=12)&&
				($_SESSION['level']!=11)))
		{
			redirect(base_url('trang_chu'));
		}

	}

	public function index(){
		$this->load->model('Ho_so');
		$this->load->model('Map');
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		if(!is_numeric($page)){$page = 0;}
		$data['title'] = 'Hồ sơ đã nhận - UBND Huyện Bến Lức';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/aside');
		$this->load->view('templates/nav');
		/*$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->library('table');*/
		$config['base_url'] = base_url('admin/ho_so_da_tao');
		$this->Map->set_pagination($config);

		$query1 = $this->Ho_so->lay_ho_so_all($_SESSION['ma_can_bo'], $_SESSION['level']);
		$query = $this->Ho_so->lay_ho_so($_SESSION['ma_can_bo'], $_SESSION['level'],$config['per_page'],$page);
		if($query){
			$config['total_rows'] =$query1->num_rows();
			$this->pagination->initialize($config);
			$this->load->view('admin/tiep_nhan_view',array('query'=>$query,));
		}

		$this->load->view('templates/footer');
	}
	public function edit_stt($id=3){
		$this->load->model('Ho_so');
		/*$this->load->library('table');*/
		$this->db->where('id', $id);
		$this->db->update('ho_so',  array(
			'status' => 1,

		));
		redirect('admin/ho_so_da_tao');
	}

}