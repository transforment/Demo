
<?php //For initiation
$myDay = 0;
$myMonth = 0;
$myQuarter = 0;
$myYear = 0;
$myWeek = 0;
$luaChon = 0;
$myListDate = [];
$myDateOfWeekArray = [];
$quarter = 0;
$nam = 0;
$thangDaChon = 0;

$q = $this->db->get('map');
if($q->num_rows()>0){
    foreach($q->result() as $row){
        $data[] = $row;
    }

}
$node_map = $data;
?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="demo" id="demo-one">
        <nav class="subnav tabs">
            <ul>
                <li ><a href="#panel-1">Theo ngày </a></li>
                <li ><a href="#panel-2">Theo tuần</a></li>
                <li ><a href="#panel-3">Theo tháng</a></li>
                <li ><a href="#panel-4">Theo quý </a></li>
                <li ><a href="#panel-5">Theo năm </a></li>
            </ul>
        </nav><!--end nav-->
        <div class="panel" id="panel-1">

            <input type="hidden" id="phpVarDay" value="<?php echo $myDay; ?>">

            <form class="container-fluid" action="<?php echo base_url('admin/thong_ke/day_filter') ?>" method="post">
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
                        <lable style="font-weight: bold">Từ ngày</lable>
                        <input  class="form-control" readonly type="text" id ="datepicker1" name="datepicker1">
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <lable style="font-weight: bold">Đến ngày</lable>
                        <input class="form-control" readonly type="text" id ="datepicker2" name="datepicker2">
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <lable style="font-weight: bold" >Chọn thủ tục muốn xem </lable>

                        <select  name="luachonInDay" class="selectpicker "  data-style="btn-success rm-relish ">

                            <option value="all">Xem tất cả các thủ tục</option>
                            <?php
                            if($_SESSION['level']==12||$_SESSION['level']==13||$_SESSION['level']==100){
                                for($i = 1; $i<=count($node_map);$i++){

                                    if($i != 31){
                                        $myThing = $node_map[$i]->node_id-1;
                                        echo '<option value="'.$myThing.' ">'.$node_map[$i]->node_name.'</option>';
                                    }

                                }
                            }

                            if($_SESSION['level']==21){
                                for($i = 1; $i<31;$i++){

                                    $myThing = $node_map[$i]->node_id-1;

                                    echo '<option value="'.$myThing.' ">'.$node_map[$i]->node_name.'</option>';
                                }
                            }

                            if($_SESSION['level']==22){
                                for($i = 32; $i<count($node_map);$i++){
                                    $myThing = $node_map[$i]->node_id-1;
                                    echo '<option value="'.$myThing.' ">'.$node_map[$i]->node_name.'</option>';
                                }
                            }


                            ?>
                        </select>

                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                        <label></label>
                        <input class="form-control btn-info" type="submit" value="Xem thông tin" data-style="btn-primary"  >
                    </div>
                </div>
            </form>

        </div><!-- .panel-1-Ngay-->
        <div class="panel" id="panel-2">
            <input type="hidden" id="phpVarWeek" value="<?php echo $myWeek; ?>">

            <form class="row" action="<?php echo base_url('admin/thong_ke/week_filter') ?>" method="post">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                        <lable style="font-weight: bold">Chọn ngày trong tuần </lable>
                        <input  class="form-control" readonly type="text" id ="datepickerWeek" name="weekName"  >
                    </div>
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 ">
                    <lable style="font-weight: bold">Chọn thủ tục muốn xem  </lable>

                        <select  name="luachonWeek" class="selectpicker "  data-style="btn-success rm-relish ">

                            <option value="all">Xem tất cả các thủ tục</option>
                            <?php
                            if($_SESSION['level']==12||$_SESSION['level']==13||$_SESSION['level']==100){
                                for($i = 1; $i<=count($node_map);$i++){

                                    if($i != 31){
                                        $myThing = $node_map[$i]->node_id-1;
                                        echo '<option value="'.$myThing.' ">'.$node_map[$i]->node_name.'</option>';
                                    }

                                }
                            }

                            if($_SESSION['level']==21){
                                for($i = 1; $i<31;$i++){

                                    $myThing = $node_map[$i]->node_id-1;

                                    echo '<option value="'.$myThing.' ">'.$node_map[$i]->node_name.'</option>';
                                }
                            }

                            if($_SESSION['level']==22){
                                for($i = 32; $i<count($node_map);$i++){
                                    $myThing = $node_map[$i]->node_id-1;
                                    echo '<option value="'.$myThing.' ">'.$node_map[$i]->node_name.'</option>';
                                }
                            }


                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                    <label></label>
                    <input class="form-control btn-info" type="submit" value="Xem thông tin" data-style="btn-primary"  >
                </div>

            </form>
        </div><!-- End panel-2-Tuan -->
        <div class="panel" id="panel-3">
            <input type="hidden" id="phpVarMonth" value="<?php echo $myMonth; ?>">
            <div >
                <form class="row" action="<?php echo base_url('admin/thong_ke/month_filter') ?>" method="post">

                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <lable style="font-weight: bold">Chọn tháng</lable>
                            <select name="thangName" class="selectpicker " data-style="btn-success rm-relish " >
                                <option value='01'>Tháng 1</option>
                                <option value='02'>Tháng 2</option>
                                <option value='03'>Tháng 3</option>
                                <option value='04'>Tháng 4</option>
                                <option value='05'>Tháng 5</option>
                                <option value='06'>Tháng 6</option>
                                <option value='07'>Tháng 7</option>
                                <option value='08'>Tháng 8</option>
                                <option value='09'>Tháng 9</option>
                                <option value='10'>Tháng 10</option>
                                <option value='11'>Tháng 11</option>
                                <option value='12'>Tháng 12</option>
                            </select>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                            <lable style="font-weight: bold">Nhập năm </lable>
                            <input  class="form-control"  type="text" id ="myYearMonth" name="yearName" value="2015" >
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <lable style="font-weight: bold">Chọn thủ tục muốn xem </lable>
                            <select  name="luachonName" class="selectpicker "  data-style="btn-success rm-relish ">

                                <option value="all">Xem tất cả các thủ tục</option>
                                <?php
                                if($_SESSION['level']==12||$_SESSION['level']==13||$_SESSION['level']==100){
                                    for($i = 1; $i<=count($node_map);$i++){

                                        if($i != 31){
                                            $myThing = $node_map[$i]->node_id-1;
                                            echo '<option value="'.$myThing.' ">'.$node_map[$i]->node_name.'</option>';
                                        }

                                    }
                                }

                                if($_SESSION['level']==21){
                                    for($i = 1; $i<31;$i++){

                                        $myThing = $node_map[$i]->node_id-1;

                                        echo '<option value="'.$myThing.' ">'.$node_map[$i]->node_name.'</option>';
                                    }
                                }

                                if($_SESSION['level']==22){
                                    for($i = 32; $i<count($node_map);$i++){
                                        $myThing = $node_map[$i]->node_id-1;
                                        echo '<option value="'.$myThing.' ">'.$node_map[$i]->node_name.'</option>';
                                    }
                                }


                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                        <label></label>
                        <input class="form-control btn-info" type="submit" value="Xem thông tin" data-style="btn-primary"  >
                    </div>


                </form>
            </div>
        </div><!-- end panel-3Thang-->
        <div class="panel" id="panel-4">
            <input type="hidden" id="phpVarQuarter" value="<?php echo $myQuarter; ?>">
            <div>
                <form class="row" action="<?php echo base_url('admin/thong_ke/quarter_filter') ?>" method="post">
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 ">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                            <lable style="font-weight: bold">Chọn Quý </lable>
                     <select name="quarter" class="selectpicker " data-style="btn-success rm-relish " >
                            <option value='1'>Quý I</option>
                            <option value='2'>Quý II</option>
                            <option value='3'>Quý III</option>
                            <option value='4'>Quý IV</option>
                        </select>
                        </div>

                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                            <lable style="font-weight: bold">Nhập năm </lable>
                            <input  class="form-control"  type="text" id ="myYearQuarter" name="yearQuarter" value="2015" >
                        </div>


                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 ">
                            <lable style="font-weight: bold">Chọn thủ tục muốn xem  </lable>
                            <select  name="luachonQuarter" class="selectpicker "  data-style="btn-success rm-relish ">

                                <option value="all">Xem tất cả các thủ tục</option>
                                <?php
                                if($_SESSION['level']==12||$_SESSION['level']==13||$_SESSION['level']==100){
                                    for($i = 1; $i<=count($node_map);$i++){

                                        if($i != 31){
                                            $myThing = $node_map[$i]->node_id-1;
                                            echo '<option value="'.$myThing.' ">'.$node_map[$i]->node_name.'</option>';
                                        }

                                    }
                                }

                                if($_SESSION['level']==21){
                                    for($i = 1; $i<31;$i++){

                                        $myThing = $node_map[$i]->node_id-1;

                                        echo '<option value="'.$myThing.' ">'.$node_map[$i]->node_name.'</option>';
                                    }
                                }

                                if($_SESSION['level']==22){
                                    for($i = 32; $i<count($node_map);$i++){
                                        $myThing = $node_map[$i]->node_id-1;
                                        echo '<option value="'.$myThing.' ">'.$node_map[$i]->node_name.'</option>';
                                    }
                                }


                                ?>
                            </select>
                        </div>


                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                        <label></label>
                        <input class="form-control btn-info" type="submit" value="Xem thông tin" data-style="btn-primary"  >
                    </div>


                </form>
            </div>

        </div><!-- end panel-4-Quy -->
        <div class="panel" id="panel-5"><!-- .panel-4 -->

            <input type="hidden" id="phpVarYear" value="<?php echo $myYear; ?>">

            <form  action="<?php echo base_url('admin/thong_ke/year_filter') ?>" method="post">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                                <lable style="font-weight: bold">Nhập năm </lable>
                                <input  class="form-control"  type="text" id ="myYear" name="year" >
                        </div>

                        <div class="col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
                            <lable style="font-weight: bold">Chọn thủ tục muốn xem </lable>
                            <select  name="luachon" class="selectpicker "  data-style="btn-success rm-relish ">

                                <option value="all">Xem tất cả các thủ tục</option>
                                <?php
                                if($_SESSION['level']==12||$_SESSION['level']==13||$_SESSION['level']==100){
                                    for($i = 1; $i<=count($node_map);$i++){

                                        if($i != 31){
                                            $myThing = $node_map[$i]->node_id-1;
                                            echo '<option value="'.$myThing.' ">'.$node_map[$i]->node_name.'</option>';
                                        }

                                    }
                                }

                                if($_SESSION['level']==21){
                                    for($i = 1; $i<31;$i++){

                                        $myThing = $node_map[$i]->node_id-1;

                                        echo '<option value="'.$myThing.' ">'.$node_map[$i]->node_name.'</option>';
                                    }
                                }

                                if($_SESSION['level']==22){
                                    for($i = 32; $i<count($node_map);$i++){
                                        $myThing = $node_map[$i]->node_id-1;
                                        echo '<option value="'.$myThing.' ">'.$node_map[$i]->node_name.'</option>';
                                    }
                                }


                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                        <label></label>
                        <input class="form-control btn-info" type="submit" value="Xem thông tin" data-style="btn-primary"  >
                    </div>

                </div>

            </form>

        </div><!--end panel 5-Nam-->
    </div><!--end Demo-->
</div>


<?php //Tính tiền tháng năm nếu bấm nút xem thông tin


if (isset($tuNgay)){
    $myDay = 1;
    $myMonth = 0;
    $myQuarter = 0;
    $myYear = 0;
    $myWeek = 0;
    $myListDate = $myListDateCaseDay;
    $luaChon = $luaChonCaseDay;
}

if(isset($tuanDaChon)){
    $myDay = 0;
    $myMonth = 0;
    $myQuarter = 0;
    $myYear = 0;
    $myWeek = 1;
    $myDateOfWeekArray = $myDateOfWeekArrayCaseWeek;
    $luaChon = $luaChonCaseWeek;
    echo '<input type="text" id="myWeekLove" style="visibility: hidden" value = "1">';
}

if (isset($monthSet)){

    $myDay = 0;
    $myMonth = 1;
    $myQuarter = 0;
    $myYear = 0;
    $myWeek = 0;
    $thangDaChon = $thangDaChonCaseMonth;
    $luaChon = $luaChonCaseMonth;
    $nam = $namCaseMonth;
    echo '<input type="text" id="myMonthLove" style="visibility: hidden" value = "1">';
}

if(isset($quarterSet)){
    $myDay = 0;
    $myMonth = 0;
    $myQuarter = 1;
    $myYear = 0;
    $myWeek = 0;
    $quarter = $quarterCaseQuarter;
    $luaChon = $luaChonCaseQuarter;
    $nam   = $namCaseQuarter;
    echo '<input type="text" id="myQuarterLove" style="visibility: hidden" value = "1">';
}

if(isset($yearSet)){
    $myDay = 0;
    $myMonth = 0;
    $myQuarter = 0;
    $myYear = 1;
    $myWeek = 0;
    $nam = $namCaseYear;
    $luaChon = $luaChonCaseYear;
    echo '<input type="text" id="myYearLove" style="visibility: hidden" value = "1">';


}

//Calculations

function dieuKienChoTraVe($data2,$i){

    return (($_SESSION['level']==12 || $_SESSION['level']==13 )&&$data2[$i]->mcb == $_SESSION['ma_can_bo']  && $data2[$i]->status == 5);
}
function dieuKienChoPhongBanTuPhap($data2,$i){

    return ($_SESSION['level']==21 && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP");
}
function dieuKienChoPhongBanDatDai($data2,$i){

    return ($_SESSION['level']==22  && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="DD");
}
function dieuKienChoPhongBanChuTich($data2,$i){

    return ($_SESSION['level']==100 && $data2[$i]->status == 5);
}
function dieuKienChoThongKeNgay($data2,$i,$myTempVarDateString){

    return substr($data2[$i]->mshs, 7, 6) == $myTempVarDateString;
}
function dieuKienCoLuaChon($data2,$i,$luaChon){
    $luaChon = (int)($luaChon);
    $myString = (int)(substr($data2[$i]->mshs, 16, 2));
return ($luaChon == $myString);
}
function showContentOfTable($data2,$i,$k){
    echo '<tr>
                      <td>' . $k . '</td>
                                <td>' . $data2[$i]->mshs . '</td>
                                <td>' . $data2[$i]->name . '</td>
                                <td>' . $data2[$i]->cmnd . '</td>
                                <td> ' . $data2[$i]->tien_thu . ' </td>

                            </tr>';

}
function dieuKienChoThongKeTuan($data2,$i,$j,$myDateOfWeekArray){
  return substr($data2[$i]->mshs, 7, 6) == $myDateOfWeekArray[$j];
}
function dieuKienChoThongKeThang($data2,$i,$thangDaChon,$nam){
    return substr($data2[$i]->mshs, 9, 4) == $thangDaChon.$nam;
}
function dieuKienChoThongKeQuy($data2,$i,$nam,$quarter){

    return (
        ((substr($data2[$i]->mshs, 9, 2) == "01" ||substr($data2[$i]->mshs, 9, 2) == "02"||substr($data2[$i]->mshs, 9, 2) == "03" )
            &&(substr($data2[$i]->mshs, 11, 2)==$nam)
            &&$quarter==1)
        ||
        ((substr($data2[$i]->mshs, 9, 2) == "04" ||substr($data2[$i]->mshs, 9, 2) == "05"||substr($data2[$i]->mshs, 9, 2) == "06" )
            &&(substr($data2[$i]->mshs, 11, 2)==$nam)
            &&$quarter==2)
        ||
        ((substr($data2[$i]->mshs, 9, 2) == "07" ||substr($data2[$i]->mshs, 9, 2) == "08"||substr($data2[$i]->mshs, 9, 2) == "09" )
            &&(substr($data2[$i]->mshs, 11, 2)==$nam)
            &&$quarter==3)
        ||
        ((substr($data2[$i]->mshs, 9, 2) == "10" ||substr($data2[$i]->mshs, 9, 2) == "11"||substr($data2[$i]->mshs, 9, 2) == "12" )
            &&(substr($data2[$i]->mshs, 11, 2)==$nam)
            &&$quarter==4));
}
function dieuKienChoThongKeNam($data2,$i,$nam){
    return substr($data2[$i]->mshs, 11, 2) == $nam;
}

function dieuKienPhongBan($data2,$i){
    return (dieuKienChoTraVe($data2,$i)||
        dieuKienChoPhongBanTuPhap($data2,$i)||
        dieuKienChoPhongBanDatDai($data2,$i)||
        dieuKienChoPhongBanChuTich($data2,$i));
}

$tempForShowingCondion = 0;
$tongSoTienThuDuoc = 0;


    for ($i = 0; $i < count($data2); $i++){
        if($luaChon=='all'){
            //TODO
            if(isset($tuNgay)){

                for ($j = 0; $j < count($myListDate); $j++) {

                    $myTempVarDateString = substr($myListDate[$j],0,2).substr($myListDate[$j],3,2).substr($myListDate[$j],8,2);
                    if(dieuKienPhongBan($data2,$i)&&
                        dieuKienChoThongKeNgay($data2,$i,$myTempVarDateString)){
                        $tongSoTienThuDuoc = $tongSoTienThuDuoc + $data2[$i]->tien_thu;
                        $tempForShowingCondion++;
                    }

                }
            }

            if(isset($tuanDaChon)){
                for($j=0;$j <count($myDateOfWeekArray);$j++){
                    if(dieuKienPhongBan($data2,$i)&& //I am here
                        dieuKienChoThongKeTuan($data2,$i,$j,$myDateOfWeekArray)){
                        $tongSoTienThuDuoc = $tongSoTienThuDuoc + $data2[$i]->tien_thu;
                        $tempForShowingCondion++;
                    }
                }
            }

            if(isset($monthSet)) {
                if(dieuKienPhongBan($data2,$i)&&
                    dieuKienChoThongKeThang($data2,$i,$thangDaChon,$nam)){
                    $tongSoTienThuDuoc = $tongSoTienThuDuoc + $data2[$i]->tien_thu;
                    $tempForShowingCondion++;
                }
            }

            if(isset($quarterSet)){
                if(dieuKienPhongBan($data2,$i)&&
                    dieuKienChoThongKeQuy($data2,$i,$nam,$quarter)){
                    $tongSoTienThuDuoc = $tongSoTienThuDuoc + $data2[$i]->tien_thu;
                    $tempForShowingCondion++;
                }

            }

            if(isset($yearSet)){
                if(dieuKienPhongBan($data2,$i)&&
                    dieuKienChoThongKeNam($data2,$i,$nam)){

                    $tongSoTienThuDuoc = $tongSoTienThuDuoc + $data2[$i]->tien_thu;
                    $tempForShowingCondion++;
                }

            }

        }else{
            //TODO-Else
            if(isset($tuNgay)){
                for ($j = 0; $j < count($myListDate); $j++) {
                    $myTempVarDateString = substr($myListDate[$j],0,2).substr($myListDate[$j],3,2).substr($myListDate[$j],8,2);
                    if(dieuKienPhongBan($data2,$i)&&
                        dieuKienChoThongKeNgay($data2,$i,$myTempVarDateString)&&dieuKienCoLuaChon($data2,$i,$luaChon)){
                        $tongSoTienThuDuoc = $tongSoTienThuDuoc + $data2[$i]->tien_thu;
                        $tempForShowingCondion++;
                    }
                }
            }

            if(isset($tuanDaChon)){
                for($j=0;$j <count($myDateOfWeekArray);$j++){
                    if(dieuKienPhongBan($data2,$i)&&
                        dieuKienChoThongKeTuan($data2,$i,$j,$myDateOfWeekArray)&&dieuKienCoLuaChon($data2,$i,$luaChon)){
                        $tongSoTienThuDuoc = $tongSoTienThuDuoc + $data2[$i]->tien_thu;
                        $tempForShowingCondion++;
                    }
                }

            }

            if(isset($monthSet)) {
                if(dieuKienPhongBan($data2,$i)&&
                    dieuKienChoThongKeThang($data2,$i,$thangDaChon,$nam)&&dieuKienCoLuaChon($data2,$i,$luaChon)){
                    $tongSoTienThuDuoc = $tongSoTienThuDuoc + $data2[$i]->tien_thu;
                    $tempForShowingCondion++;
                }
            }

            if(isset($quarterSet)){
                if(dieuKienPhongBan($data2,$i)&&
                    dieuKienChoThongKeQuy($data2,$i,$nam,$quarter)&&dieuKienCoLuaChon($data2,$i,$luaChon)){
                    $tongSoTienThuDuoc = $tongSoTienThuDuoc + $data2[$i]->tien_thu;
                    $tempForShowingCondion++;
                }

            }

            if(isset($yearSet)){
                if(dieuKienPhongBan($data2,$i)&&
                    dieuKienChoThongKeNam($data2,$i,$nam)&&dieuKienCoLuaChon($data2,$i,$luaChon)){
                    $tongSoTienThuDuoc = $tongSoTienThuDuoc + $data2[$i]->tien_thu;
                    $tempForShowingCondion++;
                }

            }

        }

    }

    //Show table

    if($tempForShowingCondion==0){
        echo'<p style="color: red;font-style: italic ">Không có hồ sơ nào</p>';
    } else {

        echo '<table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>MSHS</th>
                        <th>Tên</th>
                        <th>CMND</th>
                        <th>Tiền đã thu</th>
                    </tr>
                    </thead>
                    <tbody>';

        $k = 1;

        for ($i = 0; $i < count($data2); $i++) {
            if ($luaChon == 'all') {

                //TODO

                if (isset($tuNgay)) {
                    $myDay = 1;
                    for ($j = 0; $j < count($myListDate); $j++) {
                        $myTempVarDateString = substr($myListDate[$j], 0, 2) . substr($myListDate[$j], 3, 2) . substr($myListDate[$j], 8, 2);
                        if (dieuKienPhongBan($data2,$i) &&
                            dieuKienChoThongKeNgay($data2, $i, $myTempVarDateString)
                        ) {
                            showContentOfTable($data2, $i, $k);
                            $k = $k + 1;
                        }
                    }
                }

                if (isset($tuanDaChon)) {

                    for ($j = 0; $j < count($myDateOfWeekArray); $j++) {
                        if (dieuKienPhongBan($data2,$i) &&
                            dieuKienChoThongKeTuan($data2, $i, $j, $myDateOfWeekArray)
                        ) {
                            showContentOfTable($data2, $i, $k);
                            $k++;
                        }
                    }
                }

                if (isset($monthSet)) {
                    if (dieuKienPhongBan($data2,$i) &&
                        dieuKienChoThongKeThang($data2, $i, $thangDaChon, $nam)
                    ) {
                        showContentOfTable($data2, $i, $k);
                        $k++;
                    }
                }

                if (isset($quarterSet)) {
                    if (dieuKienPhongBan($data2,$i) &&
                        dieuKienChoThongKeQuy($data2, $i, $nam, $quarter)
                    ) {
                        showContentOfTable($data2, $i, $k);
                        $k++;
                    }

                }

                if (isset($yearSet)) {
                    if (dieuKienPhongBan($data2,$i) &&
                        dieuKienChoThongKeNam($data2, $i, $nam)
                    ) {
                        showContentOfTable($data2, $i, $k);
                        $k++;
                    }

                }

            } else {
                //TODO
                if (isset($tuNgay)) {
                    for ($j = 0; $j < count($myListDate); $j++) {
                        $myTempVarDateString = substr($myListDate[$j], 0, 2) . substr($myListDate[$j], 3, 2) . substr($myListDate[$j], 8, 2);
                        if (dieuKienPhongBan($data2,$i) &&
                            dieuKienChoThongKeNgay($data2, $i, $myTempVarDateString) && dieuKienCoLuaChon($data2, $i, $luaChon)
                        ) {
                            showContentOfTable($data2, $i, $k);
                            $k = $k + 1;
                        }
                    }
                }

                if (isset($tuanDaChon)) {
                    for ($j = 0; $j < count($myDateOfWeekArray); $j++) {
                        if (dieuKienPhongBan($data2,$i) &&
                            dieuKienChoThongKeTuan($data2, $i, $j, $myDateOfWeekArray) && dieuKienCoLuaChon($data2, $i, $luaChon)
                        ) {
                            showContentOfTable($data2, $i, $k);
                            $k = $k + 1;
                        }
                    }

                }

                if (isset($monthSet)) {
                    if (dieuKienPhongBan($data2,$i) &&
                        dieuKienChoThongKeThang($data2, $i, $thangDaChon, $nam) && dieuKienCoLuaChon($data2, $i, $luaChon)
                    ) {
                        showContentOfTable($data2, $i, $k);
                        $k = $k + 1;
                    }
                }

                if (isset($quarterSet)) {
                    if (dieuKienPhongBan($data2,$i) &&
                        dieuKienChoThongKeQuy($data2, $i, $nam, $quarter) && dieuKienCoLuaChon($data2, $i, $luaChon)
                    ) {
                        showContentOfTable($data2, $i, $k);
                        $k = $k + 1;
                    }

                }

                if (isset($yearSet)) {
                    if (dieuKienPhongBan($data2,$i) &&
                        dieuKienChoThongKeNam($data2, $i, $nam) && dieuKienCoLuaChon($data2, $i, $luaChon)
                    ) {
                        showContentOfTable($data2, $i, $k);
                        $k = $k + 1;
                    }

                }

            }
        }

            //For the same purspose

            echo '<tr>
                                  <td colspan="3"></td>
                                  <td><b><em>Tổng tiền:</em></b></td>
                                  <td><b style="font-style: italic; color: red" >' . number_format($tongSoTienThuDuoc, 0, ',', '.') . '  <b><em>đồng</em></b></b></td>
                              </tr>';

            echo '</tbody></table>';
    }

?>


<script type="text/javascript">

    $(function() {
    $("#datepicker1").datepicker();
    $("#datepicker2").datepicker();
    $("#datepickerWeek").datepicker();
  });


  (function($) {

    $(document).ready(function() {

      $('.demo').each(function() {

          var tabs = $(this).find('.tabs a'),
              panels = $(this).find('.panel').hide();
          $(".tabs li:eq(0)").addClass("active").show(); //Activate second tab
          $(".panel:eq(0)").show(); //Show second tab content



          if($('#phpVarDay').val()==1){
              tabs.parent().removeClass('active');

              $(".tabs li:eq(0)").addClass("active").show(); //Activate second tab
              $(".panel:eq(0)").show();

          }

          if($('#phpVarWeek').val()==1||$('#myWeekLove').val()==1){

              tabs.parent().removeClass('active');
              $(".panel:eq(0)").hide();
              $(".tabs li:eq(1)").addClass("active").show(); //Activate second tab
              $(".panel:eq(1)").show();

          }

          if($('#phpVarMonth').val()==1||$('#myMonthLove').val()==1){

              tabs.parent().removeClass('active');
              // Toggle active class
              $(".panel:eq(0)").hide();

              //$(this).parent().addClass('active');
              $(".tabs li:eq(2)").addClass("active").show(); //Activate second tab
              $(".panel:eq(2)").show();

          }

          if($('#phpVarQuarter').val()==1||$('#myQuarterLove').val()==1){

              tabs.parent().removeClass('active');
              // Toggle active class
              $(".panel:eq(0)").hide();

              //$(this).parent().addClass('active');
              $(".tabs li:eq(3)").addClass("active").show(); //Activate second tab
              $(".panel:eq(3)").show();

          }

          if($('#phpVarYear').val()==1||$('#myYearLove').val()==1){

              tabs.parent().removeClass('active');
              // Toggle active class
              $(".panel:eq(0)").hide();

              //$(this).parent().addClass('active');
              $(".tabs li:eq(4)").addClass("active").show(); //Activate second tab
              $(".panel:eq(4)").show();

          }

          tabs.click(function() {
          var active = $(this).attr("href");

          // Toggle active class
          tabs.parent().removeClass('active');
          $(this).parent().addClass('active');

          // Toggle selected panel
          panels.hide();
          $(active).show();

          // Prevent default behavior
          return false;
        });


      });



    });

  })(jQuery);

</script>

