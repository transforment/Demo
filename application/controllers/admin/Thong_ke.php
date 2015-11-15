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
            ($_SESSION['level']==13)||
            ($_SESSION['level']==21)||
            ($_SESSION['level']==22)||
            ($_SESSION['level']==100)){


            $this->load->view('admin/thong_ke_view'
                ,array(

                    'data2' =>$data2

                ));
        }
        $this->load->view('templates/footer');

    }

public  function  quarter_filter(){
        $myQuater = 0;
        $q = $this->db->get('map');
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[] = $row;
            }

        }
        $node_map = $data;

        $quarter = $_POST["quarter"];
        $quarterSet = $_POST["quarter"];
        $nam = $_POST["yearQuarter"];
        $luaChon = $_POST["luachonQuarter"];

        $namDaChonForTesting = (int)$nam;

        if ($namDaChonForTesting < 2000 || $namDaChonForTesting > 3000) {
            $nam = "Error";
        } else {
            $nam = substr($nam, 2, 2);
        }


        /*$this->load->helper('url');*/
        $data['title'] = 'Thống kê - UBND Huyện Bến Lức';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/aside');
        $this->load->view('templates/nav');

        $this->load->model('Ho_so');
        $data2 = $this->Ho_so->getAll();


        if (($_SESSION['level']==12)||
            ($_SESSION['level']==13)||
            ($_SESSION['level']==21)||
            ($_SESSION['level']==22)||
            ($_SESSION['level']==100)){

            $this->load->view('admin/thong_ke_view'
                ,array(
                    'data2' =>$data2
                ,'namCaseQuarter' =>$nam
                ,'luaChonCaseQuarter' =>$luaChon
                ,'node_map'=>$node_map
                ,'quarterCaseQuarter'=>$quarter
                ,'myQuarter'=>$myQuater
                    ,'quarterSet'=>$quarterSet

                ));
        }

        $this->load->view('templates/footer');
    }
public  function  year_filter()
    {
        $myYear = 0;

        $q = $this->db->get('map');
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
        }
        $node_map = $data;
        $yearSet = $_POST["year"];
        $nam = $_POST["year"];
        $luaChon = $_POST["luachon"];

        $namDaChonForTesting = (int)$nam;

        if ($namDaChonForTesting < 2000 || $namDaChonForTesting > 3000) {
            $nam = "Error";
        } else {
            $nam = substr($nam, 2, 2);
        }

        $data['title'] = 'Thống kê - UBND Huyện Bến Lức';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/aside');
        $this->load->view('templates/nav');
        $this->load->model('Ho_so');
        $data2 = $this->Ho_so->getAll();


        if (($_SESSION['level'] == 12) ||
            ($_SESSION['level'] == 13) ||
            ($_SESSION['level'] == 21) ||
            ($_SESSION['level'] == 22) ||
            ($_SESSION['level'] == 100)
        ) {

            $this->load->view('admin/thong_ke_view'
                , array(
                    'data2' => $data2
                , 'namCaseYear' => $nam
                , 'luaChonCaseYear' => $luaChon
                , 'node_map' => $node_map
                , 'myYear' => $myYear
                ,'yearSet'=>$yearSet

                ));
        }

        $this->load->view('templates/footer');
    }

    public function month_filter()
    {
        $myMonth = 0;
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
        $monthSet = $_POST["thangName"];
        $nam= $_POST["yearName"];
        $luachon = $_POST["luachonName"];
        $namDaChonForTesting = (int)$nam;

        if ($namDaChonForTesting < 2000 || $namDaChonForTesting > 3000) {
            $nam = "Error";
        } else {
            $nam = substr($nam, 2, 2);
        }

        if (($_SESSION['level']==12)||
            ($_SESSION['level']==13)||
            ($_SESSION['level']==21)||
            ($_SESSION['level']==22)||
            ($_SESSION['level']==100)){
            $this->load->view('admin/thong_ke_view'
                ,array(
                    'data2' =>$data2
                ,'thangDaChonCaseMonth' =>$thangDaChon
                ,'namCaseMonth' =>$nam
                ,'luaChonCaseMonth' =>$luachon
                ,'myMonth'=>$myMonth
                ,'node_map'=>$data
                    ,'monthSet'=>$monthSet

                ));
        }
        $this->load->view('templates/footer');
    }
    public function day_filter()
    {
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
        $luaChon = $_POST["luachonInDay"];

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
            ($_SESSION['level']==13)||
            ($_SESSION['level']==21)||
            ($_SESSION['level']==22)||
            ($_SESSION['level']==100)){

            $this->load->view('admin/thong_ke_view'
                ,array(

                    'data2' =>$data2
                ,'tuNgay'=>$tuNgay
                ,'denNgay'=>$denNgay
                ,'myListDateCaseDay'=>$dates
                ,'luaChonCaseDay'=>$luaChon
                ,'node_map'=>$node_map

                ));
        }

        $this->load->view('templates/footer');

    }

    public function week_filter()
    {

        if(empty($_POST['weekName'])){
            redirect('admin/thong_ke');
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
            ($_SESSION['level']==13)||
            ($_SESSION['level']==21)||
            ($_SESSION['level']==22)||
            ($_SESSION['level']==100)){

            $this->load->view('admin/thong_ke_view'
                ,array(
                 'data2' =>$data2
                ,'luaChonCaseWeek' =>$luachonInWeek
                ,'node_map'=>$data
                ,'myDateOfWeekArrayCaseWeek'=>$myDateArray
                ,'tuanDaChon'=>$tuanDaChon

                ));
        }


        $this->load->view('templates/footer');

    }


}