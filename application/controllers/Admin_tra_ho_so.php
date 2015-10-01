<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_tra_ho_so extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		session_start();
		if((!isset($_SESSION['name_user']))||
			($_SESSION['level']!=3)){
			redirect('home');
		}
	}

	public function index()
	{
		$this->load->model('Ho_so');
		$this->load->library('table');
		$this->load->view('header');
		$this->load->view('menu');
 		$query = $this->db->get_where('ho_so', array('status' => 3));
 		$query2 = $this->db->get_where('ho_so', array('status' => 4));
		$this->load->view('tra_hs_view',array('query'=>$query,'query2'=>$query2,));
		$this->load->view('footer');
	}
	public function edit($id=3){
	$this->load->model('Ho_so');
	$this->load->library('table');
	$this->db->where('id', $id);
	$this->db->update('ho_so',  array(
               'status' => 4,

            ));
	redirect('Admin_tra_ho_so');
	}
	public function edit_stt($id=3){
	$this->load->model('Ho_so');
	$this->load->library('table');
	$this->db->where('id', $id);
	$this->db->update('ho_so',  array(
               'status' => 5,

            ));
	redirect('Admin_tra_ho_so');
	}
}