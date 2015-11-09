<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thong_ke extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if((!isset($_SESSION['name_user']))||
            (($_SESSION['level']!=12)&&
                ($_SESSION['level']!=13)&&
                ($_SESSION['level']!=21)&&
                ($_SESSION['level']!=22)&&
                ($_SESSION['level']!=100)))
        {
            redirect(base_url('trang_chu'));
        }
    }

    public function index()
    {

        $data['title'] = 'Thống kê - UBND Huyện Bến Lức';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/aside');
        $this->load->view('templates/nav');
        $this->load->model('Ho_so');
        $this->load->model('map');


        $q = $this->db->get('map');



        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[] = $row;
            }

        }

        $data2 = $this->Ho_so->getAll();



        if (($_SESSION['level']==12)||
            ($_SESSION['level']==13)){


            $this->load->view('admin/thong_ke_view'
                ,array(

                    'data2' =>$data2

                ));
        }
        if ($_SESSION['level']==21){

            $this->load->view('admin/thong_ke_tu_phap_view'
                ,array(

                    'data2' =>$data2

                ));
        }

        if ($_SESSION['level']==22){

            $this->load->view('admin/thong_ke_dia_chinh_view'
                ,array(

                    'data2' =>$data2
                ));
        }

        if ($_SESSION['level']==100){

            $this->load->view('admin/thong_ke_chu_tich_view'
                ,array(

                    'data2' =>$data2
                ));
        }


        $this->load->view('templates/footer');

    }



    public  function  quarter_filter(){
        $myQuater = 0;
        if(empty($_POST)){
            $myQuater = 0;
            redirect(base_url('admin/thong_ke'));
        }
        $q = $this->db->get('map');
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[] = $row;
            }

        }
        $node_map = $data;

        $quarter = $_POST["quarter"];
        $namInQuarter = $_POST["yearQuarter"];
        $luaChonInQuater = $_POST["luachonQuarter"];


        /*$this->load->helper('url');*/
        $data['title'] = 'Thống kê - UBND Huyện Bến Lức';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/aside');
        $this->load->view('templates/nav');

        $this->load->model('Ho_so');
        $data2 = $this->Ho_so->getAll();


        if (($_SESSION['level']==12)||
            ($_SESSION['level']==13)){

            $this->load->view('admin/thong_ke_view'
                ,array(
                    'data2' =>$data2
                ,'namInQuarter' =>$namInQuarter
                ,'luaChonInQuarter' =>$luaChonInQuater
                ,'node_map'=>$node_map
                ,'namInQuarter'=>$namInQuarter
                ,'quarter'=>$quarter
                ,'myQuarter'=>$myQuater

                ));
        }
        if ($_SESSION['level']==21){

            $this->load->view('admin/thong_ke_tu_phap_view'
                ,array(
                    'data2' =>$data2
                ,'namInQuarter' =>$namInQuarter
                ,'luaChonInQuarter' =>$luaChonInQuater
                ,'node_map'=>$node_map
                ,'namInQuarter'=>$namInQuarter
                ,'quarter'=>$quarter
                ,'myQuarter'=>$myQuater

                ));
        }

        if ($_SESSION['level']==22){

            $this->load->view('admin/thong_ke_dia_chinh_view'
                ,array(
                    'data2' =>$data2
                ,'namInQuarter' =>$namInQuarter
                ,'luaChonInQuarter' =>$luaChonInQuater
                ,'node_map'=>$node_map
                ,'namInQuarter'=>$namInQuarter
                ,'quarter'=>$quarter
                ,'myQuarter'=>$myQuater

                ));
        }

        if ($_SESSION['level']==100){

            $this->load->view('admin/thong_ke_chu_tich_view'
                ,array(
                    'data2' =>$data2
                ,'namInQuarter' =>$namInQuarter
                ,'luaChonInQuarter' =>$luaChonInQuater
                ,'node_map'=>$node_map
                ,'namInQuarter'=>$namInQuarter
                ,'quarter'=>$quarter
                ,'myQuarter'=>$myQuater

                ));
        }

        $this->load->view('templates/footer');



    }

    public  function  year_filter(){
        $myYear = 0;
        if(empty($_POST)){
            $myYear = 0;
            redirect(base_url('admin/thong_ke'));
        }
        $q = $this->db->get('map');
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[] = $row;
            }

        }
        $node_map = $data;

        $namDaChon = $_POST["year"];
        $lua_chon = $_POST["luachon"];

        $namDaChonForTesting =(int)$namDaChon;

        if($namDaChonForTesting <2000 ||$namDaChonForTesting >3000 ){
            $namDaChon ="Error";
        }else{
            $namDaChon=substr($namDaChon,2,2);
        }


        /*$this->load->helper('url');*/
        $data['title'] = 'Thống kê - UBND Huyện Bến Lức';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/aside');
        $this->load->view('templates/nav');


        $this->load->model('Ho_so');
        $data2 = $this->Ho_so->getAll();


        if (($_SESSION['level']==12)||
            ($_SESSION['level']==13)){

            $this->load->view('admin/thong_ke_view'
                ,array(
                    'data2' =>$data2
                ,'namDaChon' =>$namDaChon
                ,'lua_chon' =>$lua_chon
                ,'node_map'=>$node_map
                ,'myYear'=>$myYear

                ));
        }
        if ($_SESSION['level']==21){

            $this->load->view('admin/thong_ke_tu_phap_view'
                ,array(

                    'data2' =>$data2
                ,'namDaChon' =>$namDaChon
                ,'lua_chon' =>$lua_chon
                ,'node_map'=>$node_map
                ,'myYear'=>$myYear

                ));
        }

        if ($_SESSION['level']==22){

            $this->load->view('admin/thong_ke_dia_chinh_view'
                ,array(

                    'data2' =>$data2
                ,'namDaChon' =>$namDaChon
                ,'lua_chon' =>$lua_chon
                ,'node_map'=>$node_map
                ,'myYear'=>$myYear

                ));
        }

        if ($_SESSION['level']==100){

            $this->load->view('admin/thong_ke_chu_tich_view'
                ,array(

                    'data2' =>$data2
                ,'namDaChon' =>$namDaChon
                ,'lua_chon' =>$lua_chon
                ,'node_map'=>$node_map
                ,'myYear'=>$myYear

                ));
        }

        $this->load->view('templates/footer');



    }

    public function month_filter()
    {
        $myMonth = 0;
        if(empty($_POST)){
            $myMonth = 0;
            redirect(base_url('admin/thong_ke'));
        }
        /*$this->load->helper('url');*/
        $data['title'] = 'Thống kê - UBND Huyện Bến Lức';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/aside');
        $this->load->view('templates/nav');


        $this->load->model('Ho_so');
        $data2 = $this->Ho_so->getAll();

        $q = $this->db->get('map');
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[] = $row;
            }

        }

        $thangDaChon=$_POST["thangName"];
        $namInThang = $_POST["yearName"];
        $luachonInThang = $_POST["luachonName"];

        if (($_SESSION['level']==12)||
            ($_SESSION['level']==13)){

            $this->load->view('admin/thong_ke_view'
                ,array(
                    'data2' =>$data2
                ,'thangDaChon' =>$thangDaChon
                ,'namInThang' =>$namInThang
                ,'luachonInThang' =>$luachonInThang
                ,'myMonth'=>$myMonth
                ,'node_map'=>$data

                ));
        }
        if ($_SESSION['level']==21){

            $this->load->view('admin/thong_ke_tu_phap_view'
                ,array(

                    'data2' =>$data2
                ,'thangDaChon' =>$thangDaChon
                ,'namInThang' =>$namInThang
                ,'luachonInThang' =>$luachonInThang
                ,'myMonth'=>$myMonth
                ,'node_map'=>$data

                ));
        }

        if ($_SESSION['level']==22){

            $this->load->view('admin/thong_ke_dia_chinh_view'
                ,array(


                    'data2' =>$data2
                ,'thangDaChon' =>$thangDaChon
                ,'namInThang' =>$namInThang
                ,'luachonInThang' =>$luachonInThang
                ,'myMonth'=>$myMonth
                ,'node_map'=>$data

                ));
        }


        if ($_SESSION['level']==100){

            $this->load->view('admin/thong_ke_chu_tich_view'
                ,array(


                    'data2' =>$data2
                ,'thangDaChon' =>$thangDaChon
                ,'namInThang' =>$namInThang
                ,'luachonInThang' =>$luachonInThang
                ,'myMonth'=>$myMonth
                ,'node_map'=>$data

                ));
        }

        $this->load->view('templates/footer');

    }

    public function day_filter()
    {

        if(empty($_POST)){
            redirect(base_url('admin/thong_ke'));
        }
        $q = $this->db->get('map');
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[] = $row;
            }

        }
        $node_map = $data;

        /*$this->load->helper('url');*/
        $data['title'] = 'Thống kê - UBND Huyện Bến Lức';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/aside');
        $this->load->view('templates/nav');

        $this->load->model('Ho_so');
        $data2 = $this->Ho_so->getAll();

        $tuNgay  = $_POST["datepicker1"];
        $denNgay = $_POST["datepicker2"];
        $luaChonInDay = $_POST["luachonInDay"];

        $tuNgay = substr($tuNgay,0,2)."-".substr($tuNgay,3,2)."-".substr($tuNgay,6,4);
        $denNgay = substr($denNgay,0,2)."-".substr($denNgay,3,2)."-".substr($denNgay,6,4);



        $step = '+1 day';
        $output_format = 'd/m/Y';
        //Ref--Create a list of dates from A to B
        $dates = array();
        $current = strtotime($tuNgay);
        $last = strtotime($denNgay);

        while( $current <= $last) {

            $dates[] = date($output_format, $current);
            $current = strtotime($step, $current);
        }



        if($tuNgay == null){

            redirect(base_url('admin/thong_ke'));

        }

        if (($_SESSION['level']==12)||
            ($_SESSION['level']==13)){

            $this->load->view('admin/thong_ke_view'
                ,array(

                    'data2' =>$data2
                ,'tuNgay'=>$tuNgay
                ,'denNgay'=>$denNgay
                ,'myListDate'=>$dates
                ,'luaChonInDay'=>$luaChonInDay
                ,'node_map'=>$node_map

                ));
        }
        if ($_SESSION['level']==21){

            $this->load->view('admin/thong_ke_tu_phap_view'
                ,array(

                    'data2' =>$data2
                ,'tuNgay'=>$tuNgay
                ,'denNgay'=>$denNgay
                ,'myListDate'=>$dates
                ,'luaChonInDay'=>$luaChonInDay
                ,'node_map'=>$node_map


                ));
        }
        if ($_SESSION['level']==22){


            $this->load->view('admin/thong_ke_dia_chinh_view'
                ,array(
                    'data2' =>$data2
                ,'tuNgay'=>$tuNgay
                ,'denNgay'=>$denNgay
                ,'myListDate'=>$dates
                ,'luaChonInDay'=>$luaChonInDay
                ,'node_map'=>$node_map

                ));
        }

        if ($_SESSION['level']==100){


            $this->load->view('admin/thong_ke_chu_tich_view'
                ,array(
                    'data2' =>$data2
                ,'tuNgay'=>$tuNgay
                ,'denNgay'=>$denNgay
                ,'myListDate'=>$dates
                ,'luaChonInDay'=>$luaChonInDay
                ,'node_map'=>$node_map

                ));
        }



        $this->load->view('templates/footer');

    }

    public function week_filter()
    {
        if(empty($_POST)){
            redirect(base_url('admin/thong_ke'));
        }
        /*$this->load->helper('url');*/
        $data['title'] = 'Thống kê - UBND Huyện Bến Lức';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/aside');
        $this->load->view('templates/nav');

        $this->load->model('Ho_so');
        $data2 = $this->Ho_so->getAll();

        $q = $this->db->get('map');
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[] = $row;
            }

        }

        $tuanDaChon=$_POST["weekName"];
        $tuanDaChon=substr($tuanDaChon,0,2)."-".substr($tuanDaChon,3,2)."-".substr($tuanDaChon,6,4);
        $yearInWeek = substr($tuanDaChon,6,4);
        $luachonInWeek = $_POST["luachonWeek"];
        $date = new DateTime($tuanDaChon);
        $tuanDaChon  = $date->format("W");

        $week_number = (int)$tuanDaChon;
        $year = (int)($yearInWeek);
        $myDateArray =[];

        for($day=1; $day<=7; $day++)
        {
            array_push($myDateArray, date('dmy', strtotime($year."W".$week_number.$day)));
        }



        if (($_SESSION['level']==12)||
            ($_SESSION['level']==13)){

            $this->load->view('admin/thong_ke_view'
                ,array(
                    'data2' =>$data2
                ,'luachonInWeek' =>$luachonInWeek
                ,'node_map'=>$data
                ,'myDateOfWeekArray'=>$myDateArray
                ,'tuanDaChon'=>$tuanDaChon

                ));
        }
        if ($_SESSION['level']==21){

            $this->load->view('admin/thong_ke_tu_phap_view'
                ,array(

                    'data2' =>$data2
                ,'luachonInWeek' =>$luachonInWeek
                ,'node_map'=>$data
                ,'myDateOfWeekArray'=>$myDateArray
                ,'tuanDaChon'=>$tuanDaChon

                ));
        }

        if ($_SESSION['level']==22){

            $this->load->view('admin/thong_ke_dia_chinh_view'
                ,array(

                    'data2' =>$data2
                ,'luachonInWeek' =>$luachonInWeek
                ,'node_map'=>$data
                ,'myDateOfWeekArray'=>$myDateArray
                ,'tuanDaChon'=>$tuanDaChon


                ));
        }

        if ($_SESSION['level']==100){

            $this->load->view('admin/thong_ke_chu_tich_view'
                ,array(

                    'data2' =>$data2
                ,'luachonInWeek' =>$luachonInWeek
                ,'node_map'=>$data
                ,'myDateOfWeekArray'=>$myDateArray
                ,'tuanDaChon'=>$tuanDaChon


                ));
        }

        $this->load->view('templates/footer');

    }


}