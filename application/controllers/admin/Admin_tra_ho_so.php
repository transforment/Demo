<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_tra_ho_so extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if((!isset($_SESSION['name_user']))||
			(($_SESSION['level']!=12)&&
				($_SESSION['level']!=13))){
			redirect(base_url('trang_chu'));
		}
	}

	public function index()
	{
		$this->load->model('Ho_so');
		/*$this->load->library('table');*/
		$data['title'] = 'Hồ sơ trả dân - UBND Huyện Bến Lức';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/aside');
		$this->load->view('templates/nav');
		//$query = $this->db->get_where('ho_so', array('status' => 3));
		//$query2 = $this->db->get_where('ho_so', array('status' => 4));
		$query = $this->Ho_so->lay_ho_so_all($_SESSION['ma_can_bo'], $_SESSION['level']);
		$this->load->view('admin/tra_hs_view',array(
			'query'=>$query,

		));
		$this->load->view('templates/footer');
	}
	public function edit($id=3){
		$this->load->model('Ho_so');
		/*$this->load->library('table');*/
		$this->db->where('id', $id);
		$this->db->update('ho_so',  array(
			'status' => 4,
			'ma_so_can_bo_thu_tien'=>$_SESSION['ma_can_bo'],

		));
		redirect(base_url('admin/admin_tra_ho_so'));
	}
	public function edit_stt($id=3){
		$this->load->model('Ho_so');
		/*$this->load->library('table');*/
		$this->db->where('id', $id);
		$this->db->update('ho_so',  array(
			'status' => 5,
			'ma_so_can_bo_thu_tien'=>$_SESSION['ma_can_bo'],
		));
		redirect(base_url('admin/admin_tra_ho_so'));
	}
}