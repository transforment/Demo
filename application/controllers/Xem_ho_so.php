<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xem_ho_so extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		session_start();

	}
	public function index()
	{
		$this->load->model('ho_so');
		$this->load->model('map');
	//	$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
	//	if(!is_numeric($page)){$page = 0;}
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->library('table');
		//$config1['base_url'] = base_url('Xem_ho_so/index');
		//$this->map->set_pagination($config1);

		//$query1 = $this->ho_so->search_ho_so_all($this->input->post('num_search'));
		$query = $this->ho_so->search_ho_so($this->input->post('num_search'),
			100,0);
		if($query){
			//$config1['total_rows'] =$query1;
			
			//$this->pagination->initialize($config1);
 	//		$data = $this->Ho_so->loc_mshs($this->input->post('num_search'));
			$this->load->view('ho_so_view',array('query'=>$query,));
			}
		$this->load->view('footer');

	}
}
