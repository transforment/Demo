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
		$this->load->model('Ho_so');
		$this->load->library('table');
		$this->load->view('header');
		$this->load->view('menu');
 		$query = $this->db->get_where('ho_so', array('status' => 1));
 		$query2 = $this->db->get_where('ho_so', array('status' => 2));
		$this->load->view('phong_ban_view',array('query'=>$query,'query2'=>$query2,));
		$this->load->view('footer');
	}
	public function edit($id=3){
	$this->load->model('Ho_so');
	$this->load->library('table');
	$this->db->where('id', $id);
	$this->db->update('ho_so',  array(
               'status' => 2,

            ));
	redirect('Admin_phong_ban');
	}
	public function edit_stt($id=3){
	$this->load->model('Ho_so');
	$this->load->library('table');
	$this->db->where('id', $id);
	$this->db->update('ho_so',  array(
               'status' => 3,

            ));
	redirect('Admin_phong_ban');
	}
}