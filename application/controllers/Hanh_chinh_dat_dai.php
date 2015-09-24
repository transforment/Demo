<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hanh_chinh_dat_dai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		session_start();

	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->model('Map');
		$data=$this->Map->lay_ten_muc(32);
		$num = $this->Map->lay_id(32);
		$com = array_combine($num, $data);
		/*$data=array(
			't1' => 'Thủ tục cấp đổi giấy chứng nhận quyền sử dụng đất quyền sở hữu nhà ở và tài sản khác gắn liền với đất',
			't2' => 'Thủ tục cấp lại giấy chứng nhận quyền sử dụng đất quyền sở hữu nhà ở và tài sản khác gắn liền với đất do bị mất',
			't3' => 'Đăng ký biến động đất đai, tài sản gắn liền với đất do thay đổi thông tin về người được cấp giấy chứng nhận (CMND, ngày cấp giấy CMND, tên chủ sử dụng đất, xóa hộ), tăng giảm diện tích thửa đất do sạt lở, sai số thửa, hình thể thửa đất',
			't5' => 'Cấp giấy quyền sử dụng đất ban đầu',
			't6' => 'Bổ sung tài sản gắn liền với đất',
			't4' => 'Chuyển nhượng, tặng cho, thừa kế quyền sử dụng đất',
		);*/
		$this->load->view('content_datdai',array('com'=>$com));
		/*$this->load->view('content_datdai',$data);*/
			$this->load->view('footer');
	}

}
