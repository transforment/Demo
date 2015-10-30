<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_phong_ban extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if((!isset($_SESSION['name_user']))||
			(($_SESSION['level']!=21)&&
			($_SESSION['level']!=22))){
			redirect(base_url('trang_chu'));
		}
	}
	public function index()
	{
		$this->load->model('Ho_so');
		/*$this->load->library('table');*/
		$data['title'] = 'Hồ sơ xử lý - UBND Huyện Bến Lức';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/aside');
		$this->load->view('templates/nav');
 		$query = $this->db->get_where('ho_so', array('status' => 1));
 		$query2 = $this->db->get_where('ho_so', array('status' => 2));
		$this->load->view('admin/phong_ban_view',array('query'=>$query,'query2'=>$query2,));
		$this->load->view('templates/footer');
	}
	public function edit($id=3){
	$this->load->model('Ho_so');
	/*$this->load->library('table');*/
	$this->db->where('id', $id);
	$this->db->update('ho_so',  array(
               'status' => 2,

            ));
	redirect(base_url('admin/admin_phong_ban'));
	}
	public function edit_stt($id=3){
	$this->load->model('Ho_so');
	/*$this->load->library('table');*/
	$this->db->where('id', $id);
	$this->db->update('ho_so',  array(
               'status' => 3,

            ));
	redirect(base_url('admin/admin_phong_ban'));
	}
}