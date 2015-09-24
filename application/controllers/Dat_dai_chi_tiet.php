<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dat_dai_chi_tiet extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		session_start();

	}
	public function index($number=2)
	{
	$this->load->view('header');
	$this->load->view('menu');
	$this->load->model('Map');

	$this->load->model('thanh_phan');

	$this->load->library('table');
	//$ret = $query->row($number);
	$this->db->where('node_id', $number);
   	$node_map = $this->db->get('map')->row();
	$list_chi_tiet=$this->Map->lay_note($number); 
	$thanh_phan_data=$this->thanh_phan
	->array_trans($list_chi_tiet[0]);
	$this->load->view('dat_dai_chi_tiet_view',array(
		'node_map'=>$node_map
		

		,'thanh_phan_data'=>$thanh_phan_data

		));
	$this->load->view('footer');
	}

	

}