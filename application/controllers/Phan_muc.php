<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phan_muc extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		session_start();

	}
	public function index($n=1)
	{
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->model('Map');
		$this->load->library('table');
		switch ($n) {
			case '1':
				$f="Chứng thực";

				break;
			case '2':
				$f="khai sinh";
				break;
			case '3':
				$f="khai tử";
				break;
			case '4':
				$f="kết hôn";
				break;
			case '5':
				$f="giám hộ";
				break;
			case '6':
				$f="hộ tịch";
				break;


			default:
				$f=" ";
				break;
		}
		//$f="Chứng thực";
 		$data = $this->Map->loc_ten($f); 
 		$num = $this->Map->loc_id($f); 
		$com = array_combine($num, $data);
		$this->load->view('content_phan_muc',array(
					'com'=>$com,
					));
		$this->load->view('footer');
	}

}




