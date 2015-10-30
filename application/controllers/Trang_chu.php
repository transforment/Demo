<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Trang_chu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $data['title'] = 'UBND Huyện Bến Lức';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/aside');
        $this->load->view('templates/nav');
        $this->load->model('Map');
        /*$this->load->library('table');*/
        $data = $this->Map->lay_ten_muc(0);
        $num = $this->Map->lay_id(0);
        $com = array_combine($num, $data);
        $this->load->view('container',array('com'=>$com));
        $this->load->view('templates/sideright');
        $this->load->view('templates/footer');
    }
}