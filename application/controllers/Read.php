<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read extends CI_Controller {

	public function read_file($filename='Phiếu_yêu_cầu_chứng_thực_(mẫu_số_31PYC).pdf'){
		//$filename="Phiếu yêu cầu chứng thực (mẫu số 31PYC).pdf";
		//$name = trim(strip_tags($name));
		$file=''.base_url().'doc/'.$filename.'';
		//$filename=$name;
header('Content-Type: application/pdf');
//header('Content-Type: application/octet-stream');
header('Content-Disposition: inline; filename="' . $filename . '"');
//header ('Content-Transfer-Encoding:binary');
//header('Accept-Ranges:bytes');

readfile($file);

}
}