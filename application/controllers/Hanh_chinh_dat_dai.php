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
		$data=$this->Map->lay_ten_muc2();
		$num = $this->Map->lay_id2();
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
	/*public function thutuc1()
	{
		$this->load->view('header');
		$this->load->view('menu');
		$data=array(
			'h' => 'Thủ tục cấp đổi giấy chứng nhận quyền sử dụng đất quyền sở hữu nhà ở và tài sản khác gắn liền với đất',
			'h1' => '1. Cấp đổi theo hệ thống bản đồ mới:',
			'h2' => '2. Cấp đổi do người sử dụng đất có nhu cầu đổi giấy chứng nhận quyền sở hữu nhà ở hoặc các loại giấy chứng nhận đã cấp trước ngày 10/12/2009 sang giấy chứng nhận quyền sử dụng đất, quyền sở hữu nhà ở và tài sản khác gắn liền với đất. Đổi giấy chứng nhận quyền sử dụng đất, quyền sở hữu nhà ở và tài sản khác gắn liền với đất do bị ố, nhòe, rách hư hỏng:',
			'p1' => '+ Đơn đề nghị cấp lại, cấp đổi giấy chứng nhận quyền sử dụng đất, quyền sở hữu nhà ở và tài sản khác gắn liền với đất (mẫu số 10/ĐK).<br>
					 + Bản gốc giấy chứng nhận đã cấp.<br>
					 + Trích lục (rích đo) bản đồ địa chính<br>
					 + Biên bản thẩm tra ranh (nếu tăng giảm diện tích)',
			'p2' => '+ Đơn đề nghị cấp lại, cấp đổi giấy chứng nhận quyền sử dụng đất, quyền sở hữu nhà ở và tài sản khác gắn liền với đất (mẫu số 10/ĐK).<br>
					 + Bản gốc giấy chứng nhận đã cấp.<br>
					 + Trích lục bản đồ địa chính.',
		);
		$this->load->view('datdai_chitiet/chitiet1',$data);
		$this->load->view('footer');
	}
	public function thutuc2()
	{
		$this->load->view('header');
		$this->load->view('menu');
		$data=array(
			'h' => 'Thủ tục cấp lại giấy chứng nhận quyền sử dụng đất quyền sở hữu nhà ở và tài sản khác gắn liền với đất do bị mất',
			'p' => '+ Đơn cớ mất có xác nhận của công an.<br>
					+ Giấy xác nhận đăng báo, đài truyền thanh,<br>
					+ Đơn đề nghị cấp lại, cấp đổi giấy chứng nhận quyền sử dụng đất, quyền sở hữu nhà ở và tài sản khác gắn liền với đất( mẫu số 10/ĐK).<br>
					+ Bản sao giấy chứng nhận đã cấp.<br>
					+ Thông báo niêm yết mất giấy của UBND trong thời gian 15 ngày.<br>
					+ Trích lục bản đồ địa chính.',
		);
		$this->load->view('datdai_chitiet/chitiet2',$data);
		$this->load->view('footer');
	}
	public function thutuc3()
	{
		$this->load->view('header');
		$this->load->view('menu');
		$data=array(
			'h' => 'Đăng ký biến động đất đai, tài sản gắn liền với đất do thay đổi thông tin về người được cấp giấy chứng nhận ( CMND, ngày cấp giấy CMND, tên chủ sử dụng đất, xóa hộ ), tăng giảm diện tích thửa đất do sạt lở, sai số thửa, hình thể thửa đất',
			'h1' => '1. Đổi giấy CMND, HK mới:',
			'p1' => '+ Đơn điều chỉnh.<br>
					 + Đơn đăng ký biến động đất đai, tài sản gắn liền với đất( Mẫu số 09/ĐK.',
			'h2' => '2. Sai số CMND, ngày cấp giấy CMND, HK, tên chủ sử dụng:',
			'p2' => '+ Đơn điều chỉnh.<br>
					 + Đơn đăng ký biến động đất đai, tài sản gắn liền với đất( Mẫu số 09/ĐK.<br>
					 + Biên bản sai sót.',
			'h3' => '3. Xóa hộ:',
			'p3' => '+ Văn bản ủy quyền của những thành viên trong hộ khẩu trên 18 tuổi.<br>
					 + Đơn đăng ký biến động đất đai, tài sản gắn liền với đất(Mẫu số 09/ĐK).<br>
					 + Trích lục địa chính.<br>
					 + Tờ khai lệ phí trước bạ.<br>
					 + Tờ khai thuế thu nhập cá nhân.',
			'h4' => '4. Điều chỉnh diện tích, số thửa, hình thể thửa đất:',
			'p4' => '+ Đơn điều chỉnh.<br>
					 + Biên bản sai sót.',
		);
		$this->load->view('datdai_chitiet/chitiet3',$data);
		$this->load->view('footer');
	}
	public function thutuc4()
	{
		$this->load->view('header');
		$this->load->view('menu');
		$data=array(
			'h' => 'Chuyển nhượng, tặng cho, thừa kế quyền sử dụng ',
			'h1' => '1. Chuyển quyền:',
			'p1' => '+ Hợp đồng (5).<br>
					 + Đơn đăng ký biến động đất đai, tài sản gắn liền với đất(Mẫu số 09/ĐK).<br>
					 + 2 tờ khai thuế lệ phí trước bạ (Mẫu số 01/LPTB).<br>
					 + 2 tờ khai thuế thu nhập cá nhân (Mẫu số 11/KK-TNCN).<br>
					 + Bản sao giấy CNQSDĐ.<br>
					 + Trích lục(trích đo) bản đồ địa chính.<br>
					 + Giấy đăng ký kết hôn (giấy xác nhận tình trạng hôn nhân)',
			'h2' => '2. Tặng cho:',
			'p2' => '+ Hợp đồng (5).<br>
					 + Đơn đăng ký biến động đất đai, tài sản gắn liền với đất(Mẫu số 09/ĐK).<br>
					 + 2 tờ khai thuế lệ phí trước bạ (Mẫu số 01/LPTB).<br>
					 + 2 tờ khai thuế thu nhập cá nhân (Mẫu số 11/KK-TNCN).<br>
					 + Bản sao giấy CNQSDĐ.<br>
					 + Trích lục (trích đo) bản đồ địa chính.<br>
					 + Giấy đăng ký kết hôn (giấy xác nhận tình trạng hôn nhân).<br>
					 + Giấy khai sinh (đơn xác nhận mối quan hệ)',
			'h3' => '3. Thừa kế :',
			'p3' => '+ Đơn đăng ký thừ kế (5).<br>
					 + Đơn đăng ký biến động đất đai, tài sản gắn liền với đất(Mẫu số 09/ĐK).<br>
					 + VBPCDS thừa kế (5).<br>
					 + Giấy chứng tử.<br>
					 + 2 tờ khai thuế lệ phí trước bạ (Mẫu số 01/LPTB).<br>
					 + 2 tờ khai thuế thu nhập cá nhân (Mẫu số 11/KK-TNCN).<br>
					 + Bản sao giấy CNQSDĐ.<br>
					 + Trích lục( trích đo) bản đồ địa chính.',
		);
		$this->load->view('datdai_chitiet/chitiet4',$data);
		$this->load->view('footer');
	}
	public function thutuc5()
	{
		$this->load->view('header');
		$this->load->view('menu');
		$data=array(
			'h' => 'Cấp giấy quyền sử dụng đất ban đầu',
			'p' => '+ Đơn đăng ký cấp giấy chứng nhận quyền sử dụng đất, quyền sở hữu nhà ở và tài sản khác gắn liền với đất theo mẫu số 04/ĐK.<br>
					+ Bảng tường trình nguồn gốc đất.<br>
					+ 2 tờ khai lệ phí trước bạ. (Mẫu số 01/LPTB).<br>
					+ 2 tờ khai tiền sử dụng đất.<br>
					+ 1 tờ khai diện tích đất ở.',
		);
		$this->load->view('datdai_chitiet/chitiet2',$data);
		$this->load->view('footer');
	}
	public function thutuc6()
	{
		$this->load->view('header');
		$this->load->view('menu');
		$data=array(
			'h' => 'Bổ sung tài sản gắn liền với đất',
			'p' => '+ Đơn đăng ký cấp giấy chứng nhận quyền sử dụng đất, quyền sở hữu nhà ở và tài sản khác gắn liền với đất theo mẫu số 04/ĐK.(2)<br>
					+ Đơn đăng ký biến động đất đai, tài sản gắn liền với đất (Mẫu số 09/ĐK).<br>
					+ 1 giấy phép xây dựng.<br>
					+ 2 tờ khai lệ phí trước bạ. (Mẫu số 01/LPTB)',
		);
		$this->load->view('datdai_chitiet/chitiet2',$data);
		$this->load->view('footer');
	}*/
}
