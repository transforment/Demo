<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trang_chi_tiet extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->library('breadcrumbs');
		$this->breadcrumbs->push('Section', '/section');
		$this->breadcrumbs->push('Page', '/section/page');
		$this->breadcrumbs->unshift('Home', '/');
		$this->breadcrumbs->show();
	}
	public function index($str='',$number=2)
	{
	header('Content-Type: text/html; charset=utf-8');
	ini_set('default_charset', 'utf-8');
	$this->load->view('header');
	$this->load->view('menu');
	$this->load->model('Map');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->model('Ho_so');

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
	//$str=str_replace("%20"," ",$str);
	if ($str=='Ch%E1%BB%A9ng%20th%E1%BB%B1c')$str='Chứng thực';
	else if ($str=='Khai%20sinh')$str='Khai sinh';
	else if ($str=='Khai%20t%E1%BB%AD')$str='Khai tử';
	else if ($str=='K%E1%BA%BFt%20h%C3%B4n')$str='Kết hôn';
	else if ($str=='Gi%C3%A1m%20h%E1%BB%99')$str='Giám hộ';
	else if ($str=='H%E1%BB%99%20t%E1%BB%8Bch')$str='Hộ tịch';
	else if ($str=='Search')$str='Kết quả tìm kiếm';
	else $str='Mục còn lại';

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
		
		if((!isset($_SESSION['name_user']))||
			(($_SESSION['level']!=12)&&
			($_SESSION['level']!=11))){
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
		,'str'=>$str

		));
		} else{

	//$this->form_validation->set_rules('name','','required');
//	$this->form_validation->set_rules('cmnd','','callback_is_num');
		$config = array(
        array(
                'field' => 'name',
                'label' => 'Username',
                'rules' => 'required',

                 'errors' => array(
                 'required' => 'Không được để trống ',
                ),
        ),
        array(
                'field' => 'cmnd',
                'label' => 'Password',
                'rules' => 'required|callback_is_num',
                'errors' => array(
                 'required' => 'Không được để trống ',
                ),
        ),

	);

	$this->form_validation->set_rules($config);

	if($this->form_validation->run()){

	$date_f= $this->input->post('date_f');
	$list=$this->Ho_so->lay_note($date_f); 
	$p_id=$this->input->post('p_id');
	$node_id=$this->input->post('node_id');
	$p_id=$this->Ho_so->format_num($p_id); 
	$node_id=$this->Ho_so->format_num($node_id); 
	if (($list[3]=='pm')&&($list[0]!=12)) $list[0]=$list[0]+12;
	$mshs=$list[0];
	for ($i=1;$i<count($list);$i++){
	if($i!=3)
	$mshs=$mshs.''. $list[$i].'';}
	$mshs=$mshs.''. $node_id.'';
	$mshs=$mshs.''. $p_id.'';
	$data = array(
   'mshs' => $mshs,
   'name' => $this->input->post('name'),
   'cmnd' => $this->input->post('cmnd'),
   'date' => $this->input->post('date'),  
   'status' => '0',
  	'note' => $this->input->post('note')  
	);
	$this->Ho_so->add_ho_so($data); 
	redirect('Ho_so_da_tao');
	}



	$this->load->view('content_chitiet_admin'
			,array(
				'node_map'=>$node_map
				,'le_phi_data'=>$le_phi_data
				,'thanh_phan_data'=>$thanh_phan_data
				,'thanh_phan_data_1'=>$thanh_phan_data_1
				,'str'=>$str
		));
		}

		$this->load->view('footer');
	}
	public function is_num($input){

			if(!is_numeric($input)){
				$this->form_validation->set_message('is_num','CMND phải là số');
				return FALSE;
			}
			return TRUE;

		}
	
}