<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dat_dai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['title'] = 'Hành chính trong lĩnh vực đất đai - UBND Huyện Bến Lức';
		$this->load->view('templates/header', $data);
        $this->load->view('templates/aside');
        $this->load->view('templates/nav');
        $this->load->model('Map');
			$data=$this->Map->lay_ten_muc(32);
			$num = $this->Map->lay_id(32);
			$com = array_combine($num, $data);
		$this->load->view('content_datdai',array('com'=>$com));
		$this->load->view('templates/sideright');
        $this->load->view('templates/footer');
		
	}

}
