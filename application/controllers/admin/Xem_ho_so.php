<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xem_ho_so extends CI_Controller {

	public function index()
	{
		$this->load->model('ho_so');
		$this->load->model('map');
		//	$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		//	if(!is_numeric($page)){$page = 0;}
		$data['title'] = 'Thông tin chi tiết hồ sơ - UBND Huyện Bến Lức';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/aside');
		$this->load->view('templates/nav');
		/*$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->library('table');*/
		//$config1['base_url'] = base_url('Xem_ho_so/index');
		//$this->map->set_pagination($config1);

		$details = $this->db->get('ho_so')->row();

		$mshs = $details->mshs;
		$tp1 = substr($mshs,7,2);//day
		$tp2 = substr($mshs,9,2);//month
		$tp3 = substr($mshs,11,2);//year
		$ngay_nhan = $tp2."/".$tp1."/20".$tp3;
		$time = strtotime($ngay_nhan);
		$ngay_nhan = date('d/m/Y',$time);//Ngay_nhan_cuoi_cung

		$ngay_nhan_function = date('Y-m-d');


		$ngay_tra = date('d/m/Y', strtotime($ngay_nhan_function."+".$details->so_ngay_giai_quyet." days"));//ngay_tra_cuoi_cung

		//$query1 = $this->ho_so->search_ho_so_all($this->input->post('num_search'));
		$query = $this->ho_so->search_ho_so($this->input->post('num_search'),
			100,0);




		if($query){
			//$config1['total_rows'] =$query1;

			//$this->pagination->initialize($config1);
			//		$data = $this->Ho_so->loc_mshs($this->input->post('num_search'));



			$this->load->view('admin/ho_so_view',array(
					'query'=>$query
					,'ngay_nhan'=>$ngay_nhan
					,'ngay_tra' =>$ngay_tra
				));
		}else{
			redirect(base_url('trang_chu'));//Ying
		}
		$this->load->view('templates/footer');

	}
	public function details($id=10)
	{
		$this->load->model('ho_so');
		$data['title'] = 'Thông tin chi tiết hồ sơ - UBND Huyện Bến Lức';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/aside');
		$this->load->view('templates/nav');
		//Get the name of procedure

		$q = $this->db->get('map');



		if($q->num_rows()>0){
			foreach($q->result() as $row){
				$data[] = $row;
			}

		}

		$this->db->where('id', $id);
		$details = $this->db->get('ho_so')->row();
		if (!isset($details)) {
			redirect(base_url('trang_chu'));
		}
		$mshs = $details->mshs;
		$tp1 = substr($mshs,7,2);//day
		$tp2 = substr($mshs,9,2);//month
		$tp3 = substr($mshs,11,2);//year
		$ngay_nhan = $tp2."/".$tp1."/20".$tp3;
		$time = strtotime($ngay_nhan);
		$ngay_nhan = date('d/m/Y',$time);//Ngay_nhan_cuoi_cung

		$ngay_nhan_function = date('Y-m-d');


		$ngay_tra = date('d/m/Y', strtotime($ngay_nhan_function."+".$details->so_ngay_giai_quyet." days"));//ngay_tra_cuoi_cung

		$this->load->view('admin/ho_so_chi_tiet',array(
		'details'=>$details
		,'node_map'=>$data
		,'ngay_nhan'=>$ngay_nhan
		,'ngay_tra' =>$ngay_tra
		));
		$this->load->view('templates/footer');

	}
}
