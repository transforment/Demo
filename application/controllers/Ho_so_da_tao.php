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
		$this->load->model('ho_so');
		$this->load->model('map');
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		if(!is_numeric($page)){$page = 0;}
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->library('table');
		$config['base_url'] = base_url('ho_so_da_tao');
		$this->map->set_pagination($config);

		$query1 = $this->ho_so->lay_ho_so_all($_SESSION['ma_can_bo'], $_SESSION['level']);
		$query = $this->ho_so->lay_ho_so($_SESSION['ma_can_bo'], $_SESSION['level'],$config['per_page'],$page);
		if($query){
		$config['total_rows'] =$query1->num_rows();
		$this->pagination->initialize($config);
		$this->load->view('tiep_nhan_view',array('query'=>$query,));
		}

		$this->load->view('footer');
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