<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trang_chi_tiet extends CI_Controller {
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

	$this->load->model('trinh_tu');//1
	$this->load->model('thoi_gian');//
	$this->load->model('cach_thuc');
	$this->load->model('thanh_phan');
	$this->load->model('giai_quyet');
	$this->load->model('doi_tuong');
	$this->load->model('co_quan');
	$this->load->model('ket_qua');
	$this->load->model('le_phi');
	$this->load->model('mau_don');
	$this->load->model('yeu_cau');
	$this->load->model('can_cu');


	$this->load->library('table');
	//$ret = $query->row($number);
	$this->db->where('node_id', $number);
   	$node_map = $this->db->get('map')->row();
	$list_chi_tiet=$this->Map->lay_note($number); 

	$trinh_tu_data=$this->trinh_tu->array_trans($list_chi_tiet[0]);
	$thoi_gian_data=$this->thoi_gian->array_trans($list_chi_tiet[1]);
	$cach_thuc_data=$this->cach_thuc->array_trans($list_chi_tiet[2]);
	$thanh_phan_data=$this->thanh_phan->array_trans($list_chi_tiet[3]);
	$thanh_phan_data_1=$this->thanh_phan->array_trans_1($list_chi_tiet[3]);

	$giai_quyet_data=$this->giai_quyet->array_trans($list_chi_tiet[4]);
	$doi_tuong_data=$this->doi_tuong->array_trans($list_chi_tiet[5]);	
	$co_quan_data=$this->co_quan->array_trans($list_chi_tiet[6]);
	$ket_qua_data=$this->ket_qua->array_trans($list_chi_tiet[7]);	
	$le_phi_data=$this->le_phi->array_trans($list_chi_tiet[8]);
	$mau_don_data=$this->mau_don->array_trans($list_chi_tiet[9]);	
	$yeu_cau_data=$this->yeu_cau->array_trans($list_chi_tiet[10]);
	$can_cu_data=$this->can_cu->array_trans($list_chi_tiet[11]);


$mau_don_after = trim(strip_tags($mau_don_data));
$mau_don_after=str_replace(".","",$mau_don_after);
$mau_don_array=explode('+', $mau_don_after);

if(count($mau_don_array)>1){
//	for ($i=1;$i<count($mau_don_array),$i++)
}
//echo html_escape($mau_don_array[1]);
		$data=array(

			'h1' => '1/ Trình tự thực hiện:',
			'h2'=>'2/ Thời gian tiếp nhận hồ sơ và trả kết quả:',
			'h3' => '3/ Cách thức thực hiện:',
			'h4' => '4/ Thành phần, số lượng hồ sơ:',
			'h4_1' => 'a) Thành phần hồ sơ bao gồm:',
			'h4_2' => 'b) Số lượng hồ sơ:',
			'h5' => '5/ Thời hạn giải quyết:',
			'h6' => '6/ Đối tượng thực hiện thủ tục hành chính:',
			'h7' => '7/ Cơ quan thực hiện thủ tục hành chính:',
			'h8' => '8/ Kết quả thực hiện thủ tục hành chính:',
			'h9' => '9/ Phí, lệ phí:',
			'h10' => '10/ Tên mẫu đơn, mẫu tờ khai:',
			'h11' => '11/ Yêu cầu, điều kiện thực hiện thủ tục hành chính:',
			'h12' => '12/ Căn cứ pháp lý của thủ tục hành chính:',
	
		);
		if (!isset($_SESSION['name_user'])){
		$this->load->view('content_chitiet',array(
		'node_map'=>$node_map
		
		,'trinh_tu_data'=>$trinh_tu_data
		,'thoi_gian_data'=>$thoi_gian_data
		,'cach_thuc_data'=>$cach_thuc_data
		,'thanh_phan_data'=>$thanh_phan_data
		,'thanh_phan_data_1'=>$thanh_phan_data_1
		,'giai_quyet_data'=>$giai_quyet_data
		,'doi_tuong_data'=>$doi_tuong_data
		,'co_quan_data'=>$co_quan_data
		,'ket_qua_data'=>$ket_qua_data
		,'le_phi_data'=>$le_phi_data
		,'mau_don_array'=>$mau_don_array
		,'yeu_cau_data'=>$yeu_cau_data
		,'can_cu_data'=>$can_cu_data
		,'data'=>$data
		));
		} else{
		$this->load->view('content_chitiet_admin'
			,array(
				'node_map'=>$node_map
				,'data'=>$data
				,'le_phi_data'=>$le_phi_data
		,'thanh_phan_data'=>$thanh_phan_data
		,'thanh_phan_data_1'=>$thanh_phan_data_1
		));
		}

	$this->load->view('footer');
	}

	
}