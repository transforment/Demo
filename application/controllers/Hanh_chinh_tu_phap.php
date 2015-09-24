<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hanh_chinh_tu_phap extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		session_start();

	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('menu');
		$data=array(
			'ct' => 'Chứng thực',
			'ks' => 'Khai sinh',
			'kt' => 'Khai tử',
			'kh' => 'Kết hôn',
			'gh' => 'Giám hộ',
			'ht' => 'Hộ tịch',
		);
		$this->load->view('content_hanhchinh',$data);
		$this->load->view('footer');

	}
}
