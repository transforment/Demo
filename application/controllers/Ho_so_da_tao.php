<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ho_so_da_tao extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		session_start();
		if((!isset($_SESSION['name_user']))||
			(($_SESSION['level']!=12)&&
			($_SESSION['level']!=11)))
		{
			redirect('home');
		}
	}
	public function index(){
	$this->load->model('Ho_so');


	$this->load->library('table');
	$this->load->view('header');
	$this->load->view('menu');
 	//$data = $this->Ho_so->lay_ten_muc(0);
 	//$num = $this->Ho_so->lay_id(0); 
 	$query = $this->db->get_where('ho_so', array('status' => 0));
	//$com = array_combine($num, $data);
//$issue=new Ho_so();

	$this->load->view('tiep_nhan_view',array('query'=>$query,));
	$this->load->view('footer');

	}
	public function edit($id=3){


	}
	public function edit_stt($id=3){
	$this->load->model('Ho_so');
	$this->load->library('table');
	$this->db->where('id', $id);
	$this->db->update('ho_so',  array(
               'status' => 1,

            ));
	redirect('Ho_so_da_tao');
	}

}