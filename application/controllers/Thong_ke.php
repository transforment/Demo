<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thong_ke extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        session_start();
        if((!isset($_SESSION['name_user']))||
            (($_SESSION['level']!=12)&&
            ($_SESSION['level']!=13)&&
           ($_SESSION['level']!=21)&& 
           ($_SESSION['level']!=22) ))
        {
            redirect('home');
        }
    }

    public function index()
    {

        $this->load->view('header');
        $this->load->view('menu');
        $this->load->model('Ho_so');

        $data2 = $this->Ho_so->getAll();
        if (($_SESSION['level']==12)||
            ($_SESSION['level']==13)){

        $this->load->view('Thong_ke_view'
            ,array(

                'data2' =>$data2
            ));
        }
        if ($_SESSION['level']==21){

        $this->load->view('Thong_ke_tu_phap_view'
            ,array(

                'data2' =>$data2
            ));
        }
        $this->load->view('footer');

    }
    
    public function day_filter()
    {
         $this->load->helper('url');
        $this->load->view('header');
        $this->load->view('menu');

        $this->load->model('Ho_so');
        $data2 = $this->Ho_so->getAll();

         $chonNgay=$_POST['datepicker'];

        if (($_SESSION['level']==12)||
            ($_SESSION['level']==13)){

        $this->load->view('Thong_ke_view'
            ,array(

            'data2' =>$data2
                ,'chonNgay' =>$chonNgay

            ));
        }
        if ($_SESSION['level']==21){

        $this->load->view('Thong_ke_tu_phap_view'
            ,array(

            'data2' =>$data2
                ,'chonNgay' =>$chonNgay

            ));
        }
        $this->load->view('footer');

    }
}