<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tu_phap extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}	
	public function index()
	{
		$data['title'] = 'Hành chính tư pháp - UBND Huyện Bến Lức';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/aside');
		$this->load->view('templates/nav');
		$dataname=array(
			 'Chứng thực',
			'Khai sinh',
			 'Khai tử',
			'Kết hôn',
			'Giám hộ',
			'Hộ tịch',
			'Các thủ tục còn lại'
		);
		$this->load->view('content_tuphap',array(
			'dataname'=>$dataname,));
		$this->load->view('templates/sideright');
        $this->load->view('templates/footer');
	}
}
