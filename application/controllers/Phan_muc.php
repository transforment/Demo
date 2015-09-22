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
				$f="Khai sinh";
				break;
			case '3':
				$f="Khai tử";
				break;
			case '4':
				$f="Kết hôn";
				break;
			case '5':
				$f="Giám hộ";
				break;
			case '6':
				$f="Hộ tịch";
				break;
			case '7':
				$f=$this->input->post('key_search');;
				break;

			default:
				$f=" ";
				break;
		}
		$data1=array(
			 'Chứng thực',
			'khai sinh',
			 'khai tử',
			'kết hôn',
			'giám hộ',
			'hộ tịch'
		);
		//$f="Chứng thực";
		if($f==" "){
			$data = $this->Map->loc_ten_left($data1);
			$num = $this->Map->loc_id_left($data1);
			$com = array_combine($num, $data);
		}else{
			$data = $this->Map->loc_ten($f);
			$num = $this->Map->loc_id($f);
			$com = array_combine($num, $data);
		}

$text = mb_convert_encoding(' có cục ', 'UTF-8', 'UTF-8');
$cleaner_input = trim(strip_tags(' ea bó  j . '));
//echo 'dd'.$text.'dd';
//echo 'aa'.$cleaner_input.'dd';
		$this->load->view('content_phan_muc',array(
					'com'=>$com,
					));
		$this->load->view('footer');
	}

}




