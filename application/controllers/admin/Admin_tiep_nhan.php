<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_tiep_nhan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if((!isset($_SESSION['name_user']))||
			(($_SESSION['level']!=12)&&
				($_SESSION['level']!=11)))
		{
			redirect(base_url('trang_chu'));
		}

	}
	public function index(){
		$this->load->model('Ho_so');
		//$this->load->model('Map');
		//$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		//if(!is_numeric($page)){$page = 0;}
		$data['title'] = 'Hồ sơ đã nhận - UBND Huyện Bến Lức';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/aside');
		$this->load->view('templates/nav');

	//	$config_pagination['base_url'] = base_url('admin/Admin_tiep_nhan');
	//	$this->Map->set_pagination($config_pagination);

		$query = $this->Ho_so->lay_ho_so_all($_SESSION['ma_can_bo'], 11);
		//$query1 = $this->Ho_so->lay_ho_so($_SESSION['ma_can_bo'], $_SESSION['level'],$config_pagination['per_page'],$page);
		if($query){
			//$config_pagination['total_rows'] =$query->num_rows();
			//$this->pagination->initialize($config_pagination);
			$this->load->view('admin/tiep_nhan_view',array(
				'query'=>$query
				));
		}

		$this->load->view('templates/footer');
	}
	public function edit_stt($id=3){
		$this->load->model('Ho_so');
		/*$this->load->library('table');*/
		$this->db->where('id', $id);
		$this->db->update('ho_so',  array(
			'status' => 1,
		));
		redirect('admin/admin_tiep_nhan');
	}
	public function  deleteRow($id=2){
		$this->db->delete('ho_so',array('id'=>$id));
		redirect('admin/admin_tiep_nhan');
	}
	public function edit($id=2){
		$this->db->where('node_id', $id);
		$node_map = $this->db->get('map')->row();
		if (!isset($node_map)) {
			$this->db->where('node_id', 2);
			$node_map = $this->db->get('map')->row();
		}
		$this->db->where('id', $id);
		$details = $this->db->get('ho_so')->row();

		$this->form_validation->set_message('required', '%s chưa cập nhật.');
		$this->form_validation->set_message('min_length', '%s: It nhất là %s kí tự.');
		$this->form_validation->set_message('max_length', '%s: Nhiều nhất là %s kí tự.');
		$this->form_validation->set_message('regex_match', ' Số %s có 9 chữ số.');

		$this->form_validation->set_error_delimiters('<div class="error">','</div>');

		$this->form_validation->set_rules('dname', 'Tên người dân ', 'required|min_length[3]|max_length[20]');
		$this->form_validation->set_rules('dcmnd', 'CMND', 'required|regex_match[/^[0-9]{9}$/]');
		$this->form_validation->set_rules('dmobile', 'Số điện thoại ', 'required|min_length[10]|max_length[11]');
		$this->form_validation->set_rules('songay', 'Số ngày', 'required');

		$data['title'] = 'Hồ sơ đã nhận - UBND Huyện Bến Lức';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/aside');
		$this->load->view('templates/nav');
		if($this->form_validation->run() == false) {
			$this->load->view('admin/sua_ho_so_view', array(
				'details' => $details,
				'node_map' => $node_map,

			));
		}else{

			$this->load->model('Ho_so');
			$this->db->where('id', $id);
			$this->db->update('ho_so',  array(
				'name' => $this->input->post('dname'),
				'cmnd' => $this->input->post('dcmnd'),
				'sdt' => $this->input->post('dmobile'),
				'mshs' => $this->input->post('ma_Ho_So'),
				'dia_chi'=>$this->input->post('diachi'),

				'note'=>$this->input->post('note')

			));
			redirect('admin/admin_tiep_nhan');
		}
		$this->load->view('templates/footer');
	}
}