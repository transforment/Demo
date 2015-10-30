<?php //Tính tiền tháng năm nếu bấm nút xem thông tin
$myDay = 0;
$myMonth = 0;
$myQuarter = 0;
$myYear = 0;
$myWeek = 0;

if (isset($tuNgay)){
    $myDay = 1;
    $myMonth = 0;
    $myYear = 0;
}else{
    $luaChonInDay = 0;
    $myListDate =[];
}

if(isset($tuanDaChon)){
    $myWeek = 1;
    $myDay = 0;
    $myMonth = 0;
    $myQuarter =0;
    $myYear = 0;
}else{
    $myDateOfWeekArray = [];
    $luachonInWeek = 0;

}


if (isset($thangDaChon)){

    $myMonth = 1;
    $myYear = 0;
}else{
    $luachonInThang = 0;
    $namInThang = 0;
    $thangDaChon = 0;
}


if(isset($quarter)){
    $myQuarter = 1;
    $myMonth = 0;
    $myYear = 0;
}else{
    $luaChonInQuarter = 0;
    $quarter = 0;
}

if(isset($namDaChon)){
    $myYear = 1;//Make this always be first :))
    $myMonth = 0;
}else{
    $lua_chon = 0;
    $namDaChon = 0;
}



?>


<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">
    <div class="col-xs-12 col-md-12 pad">
        <div class="demo" id="demo-one">
            <nav class="subnav tabs">
                <ul>
                    <li  ><a href="#panel-1">Theo ngày </a></li>
                    <li ><a href="#panel-2">Theo tuần</a></li>
                    <li ><a href="#panel-3">Theo tháng</a></li>
                    <li ><a href="#panel-4">Theo Quý </a></li>
                    <li ><a href="#panel-5">Theo năm </a></li>
                </ul>
            </nav><!--end nav-->
            <div class="panel" id="panel-1">
                <?php
                //Tinh tien
                $tongTienThuTrongCacNgay = 0;
                $tempForShowingDayCondion = 0;
                if($luaChonInDay == "all") {

                    for ($i = 0; $i < count($data2); $i++) {
                        for ($j = 0; $j < count($myListDate); $j++) {
                            $myTempVarDateString = substr($myListDate[$j],0,2).substr($myListDate[$j],3,2).substr($myListDate[$j],8,2);
                            if ( substr($data2[$i]->mshs, 7, 6) == $myTempVarDateString && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                $tongTienThuTrongCacNgay = $tongTienThuTrongCacNgay + $data2[$i]->tien_thu;
                                $tempForShowingDayCondion++;
                            }
                        }
                    }
                }else{

                    for ($i = 0; $i < count($data2); $i++) {
                        for ($j = 0; $j < count($myListDate); $j++) {
                            $myTempVarDateString = substr($myListDate[$j],0,2).substr($myListDate[$j],3,2).substr($myListDate[$j],8,2);
                            if ( substr($data2[$i]->mshs, 7, 6) == $myTempVarDateString && substr($data2[$i]->mshs, 16, 2)==$luaChonInDay&&$data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                $tongTienThuTrongCacNgay = $tongTienThuTrongCacNgay + $data2[$i]->tien_thu;
                                $tempForShowingDayCondion++;
                            }
                        }
                    }

                }
                ?>

                <input type="hidden" id="phpVarDay" value="<?php echo $myDay; ?>">

                <form class="row" action="<?php echo base_url('admin/thong_ke/day_filter') ?>" method="post">
                    <div class="col-xs-12">
                        <div class="col-xs-3">
                            <lable style="font-weight: bold">Từ ngày</lable>
                            <input  class="form-control" readonly type="text" id ="datepicker1" name="datepicker1">
                        </div>
                        <div class="col-xs-3">
                            <lable style="font-weight: bold">Đến ngày </lable>
                            <input class="form-control" readonly type="text" id ="datepicker2" name="datepicker2">
                        </div>
                        <div class="col-xs-3">
                            <lable style="font-weight: bold" >Chọn thủ tục muốn xem </lable>
                            <select name="luachonInDay" class="selectpicker"  data-style="btn-success rm-relish ">Chọn thủ tục
                                <option value="all">Xem tất cả</option>
                                <?php
                                for($i = 1; $i<count($node_map);$i++){ $i<10?$myThing="0".$node_map[$i]->node_id-1:$node_map[$i]->node_id-1; ?>

                                    <option value="<?php echo $myThing; ?>"><?php echo $node_map[$i]->node_name;  ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-xs-offset-1 col-xs-2">
                            <label></label>
                            <input class="form-control btn-info" type="submit" value="Xem thông tin" data-style="btn-primary"  >
                        </div>

                    </div>

                </form>

                <?php
                if($tempForShowingDayCondion==0){?>
                    <input type="submit" style="background-color: transparent" value="Không có hồ sơ nào" class="btn">
                <?}else {?>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>MSHS</th>
                            <th>Tên</th>
                            <th>CMND</th>
                            <th>Tiền đã thu</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $k = 1;


                        if($luaChonInDay == "all") {

                            for ($i = 0; $i < count($data2); $i++) {
                                for ($j = 0; $j < count($myListDate); $j++) {
                                    $myTempVarDateString = substr($myListDate[$j], 0, 2) . substr($myListDate[$j], 3, 2) . substr($myListDate[$j], 8, 2);
                                    if (substr($data2[$i]->mshs, 7, 6) == $myTempVarDateString && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                        echo '<tr>

                      <td>' . $k . '</td>
                                <td>' . $data2[$i]->mshs . '</td>
                                <td>' . $data2[$i]->name . '</td>
                                <td>' . $data2[$i]->cmnd . '</td>
                                <td> ' . $data2[$i]->tien_thu . ' </td>

                            </tr>';
                                        $k = $k + 1;
                                    }

                                }
                            }
                        }else{

                            for ($i = 0; $i < count($data2); $i++) {
                                for ($j = 0; $j < count($myListDate); $j++) {
                                    $myTempVarDateString = substr($myListDate[$j], 0, 2) . substr($myListDate[$j], 3, 2) . substr($myListDate[$j], 8, 2);
                                    if ( substr($data2[$i]->mshs, 7, 6) == $myTempVarDateString && substr($data2[$i]->mshs, 16, 2) == $luaChonInDay && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                        echo '<tr>

                              <td>' . $k . '</td>
                                        <td>' . $data2[$i]->mshs . '</td>
                                        <td>' . $data2[$i]->name . '</td>
                                        <td>' . $data2[$i]->cmnd . '</td>
                                        <td> ' . $data2[$i]->tien_thu . ' </td>

                                    </tr>';
                                        $k = $k + 1;
                                    }

                                }
                            }
                        }


                        echo '<tr>
                                  <td colspan="3"></td>
                                  <td><b><em>Tổng tiền:</em></b></td>
                                  <td><b style="font-style: italic; color: red" >' . number_format($tongTienThuTrongCacNgay, 0, ',', '.') . '  <b><em>đồng</em></b></b></td>
                              </tr>';
                        ?>


                        </tbody>
                    </table><!--end Table-->
                <?php }?>




            </div><!-- .panel-1-Ngay-->
            <div class="panel" id="panel-2">

                <?php //Tinh tien


                $tempForShowingWeekCondion = 0;
                $tongTienThuTrongTuanDaChon = 0;
                if($luachonInWeek == "all"){//it means It selects all things
                    for ($i = 0; $i < count($data2); $i++) {
                        for($j=0;$j <count($myDateOfWeekArray);$j++){
                            if (substr($data2[$i]->mshs, 7, 6) == $myDateOfWeekArray[$j]  && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                $tongTienThuTrongTuanDaChon = $tongTienThuTrongTuanDaChon + $data2[$i]->tien_thu;
                                $tempForShowingWeekCondion++;
                            }
                        }


                    }
                }else{

                    for ($i = 0; $i < count($data2); $i++) {
                        for($j=0;$j <count($myDateOfWeekArray);$j++){
                            if (substr($data2[$i]->mshs, 7, 6) == $myDateOfWeekArray[$j]&&substr($data2[$i]->mshs, 16, 2)==$luachonInWeek&& $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                $tongTienThuTrongTuanDaChon = $tongTienThuTrongTuanDaChon + $data2[$i]->tien_thu;
                                $tempForShowingWeekCondion++;
                            }
                        }


                    }

                }


                ?>

                <input type="hidden" id="phpVarWeek" value="<?php echo $myWeek; ?>">

                <form class="row" action="<?php echo base_url('admin/thong_ke/week_filter') ?>" method="post">
                    <div class="col-xs-9 col-md-9">
                        <select name="weekName" class="selectpicker col-sm-3" data-style="btn-success rm-relish " >
                            <option value='none'>Chọn tuần</option>
                            <?php
                            for($i = 1;$i<=53;$i++){?>
                                <option value='<?php echo $i; ?>'>Tuần <?php echo $i; ?></option>
                            <?php }?>

                        </select>

                        <select name="yearName" class="selectpicker col-sm-3"  data-style="btn-success rm-relish ">
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                        </select>

                        <select  name="luachonWeek" class="selectpicker col-sm-5"  data-style="btn-success rm-relish ">Chọn thủ tục
                            <option value="all">Xem tất cả</option>
                            <?php
                            for($i = 1; $i<count($node_map);$i++){ $i<10?$myThing="0".$node_map[$i]->node_id-1:$node_map[$i]->node_id-1; ?>

                                <option value="<?php echo $myThing; ?>"><?php echo $node_map[$i]->node_name;  ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-xs-2 col-md-2">
                        <input class="form-control btn-info" type="submit" value="Xem thông tin" data-style="btn-primary"  >
                    </div>


                </form>

                <?php
                if($tempForShowingWeekCondion==0){?>
                    <input type="submit" style="background-color: transparent" value="Không có hồ sơ nào" class="btn">
                <?}else {?>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>MSHS</th>
                            <th>Tên</th>
                            <th>CMND</th>
                            <th>Tiền đã thu</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $k = 1;


                        if($luachonInWeek == "all") {

                            for ($i = 0; $i < count($data2); $i++) {
                                for($j=0;$j <count($myDateOfWeekArray);$j++) {
                                    if (substr($data2[$i]->mshs, 7, 6) == $myDateOfWeekArray[$j] && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                        echo '<tr>

                      <td>' . $k . '</td>
                                <td>' . $data2[$i]->mshs . '</td>
                                <td>' . $data2[$i]->name . '</td>
                                <td>' . $data2[$i]->cmnd . '</td>
                                <td> ' . $data2[$i]->tien_thu . ' </td>

                            </tr>';
                                        $k = $k + 1;
                                    }
                                }
                            }
                        }else{
                            for ($i = 0; $i < count($data2); $i++) {
                                for ($j = 0; $j < count($myDateOfWeekArray); $j++) {
                                    if (substr($data2[$i]->mshs, 7, 6) == $myDateOfWeekArray[$j] && substr($data2[$i]->mshs, 16, 2) == $luachonInWeek && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                        echo '<tr>

                      <td>' . $k . '</td>
                                <td>' . $data2[$i]->mshs . '</td>
                                <td>' . $data2[$i]->name . '</td>
                                <td>' . $data2[$i]->cmnd . '</td>
                                <td> ' . $data2[$i]->tien_thu . ' </td>

                            </tr>';
                                        $k = $k + 1;
                                    }

                                }
                            }
                        }




                        echo '<tr>
                                  <td colspan="3"></td>
                                  <td><b><em>Tổng tiền:</em></b></td>
                                  <td><b style="font-style: italic; color: red" >' . number_format($tongTienThuTrongCacNgay, 0, ',', '.') . '  <b><em>đồng</em></b></b></td>
                              </tr>';
                        ?>


                        </tbody>
                    </table><!--end Table-->
                <?php }?>


            </div><!-- End panel-2-Tuan -->
            <div class="panel" id="panel-3">
                <input type="hidden" id="phpVarMonth" value="<?php echo $myMonth; ?>">
                <div >
                    <form class="row" action="<?php echo base_url('admin/thong_ke/month_filter') ?>" method="post">
                        <div class="col-xs-9 col-md-9">
                            <select name="thangName" class="selectpicker col-sm-3" data-style="btn-success rm-relish " >
                                <option value='none'>Chọn tháng</option>
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

                            <select name="yearName" class="selectpicker col-sm-3"  data-style="btn-success rm-relish ">
                                <option value="15">2015</option>
                                <option value="16">2016</option>
                                <option value="17">2017</option>
                                <option value="18">2018</option>
                            </select>

                            <select  name="luachonName" class="selectpicker col-sm-5"  data-style="btn-success rm-relish ">Chọn thủ tục
                                <option value="all">Xem tất cả</option>
                                <?php
                                for($i = 1; $i<count($node_map);$i++){ $i<10?$myThing="0".$node_map[$i]->node_id-1:$node_map[$i]->node_id-1; ?>

                                    <option value="<?php echo $myThing; ?>"><?php echo $node_map[$i]->node_name;  ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-xs-2 col-md-2">
                            <input class="form-control btn-info" type="submit" value="Xem thông tin" data-style="btn-primary"  >
                        </div>


                    </form>
                </div>
                <?php


                $tempForShowingMonthCondion = 0;
                $tongTienThuTrongThang = 0;
                if($luachonInThang == "all"){//it means It selects all things
                    for ($i = 0; $i < count($data2); $i++) {
                        if ( substr($data2[$i]->mshs, 9, 4) == $thangDaChon.$namInThang  && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                            $tongTienThuTrongThang = $tongTienThuTrongThang + $data2[$i]->tien_thu;
                            $tempForShowingMonthCondion++;
                        }
                    }
                }else{
                    for ($i = 0; $i < count($data2); $i++) {
                        if (substr($data2[$i]->mshs, 9, 4) == $thangDaChon.$namInThang &&substr($data2[$i]->mshs, 16, 2)==$luachonInThang && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                            $tongTienThuTrongThang = $tongTienThuTrongThang + $data2[$i]->tien_thu;
                            $tempForShowingMonthCondion++;
                        }
                    }
                }

                ?>



                <?php
                if($tempForShowingMonthCondion==0){?>
                    <input type="submit" style="background-color: transparent" value="Không có hồ sơ nào" class="btn">
                <?}else {?>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>MSHS</th>
                            <th>Tên</th>
                            <th>CMND</th>
                            <th>Tiền đã thu</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $k = 1;


                        if($luachonInThang == "all") {

                            for ($i = 0; $i < count($data2); $i++) {

                                if ( substr($data2[$i]->mshs, 9, 4) == $thangDaChon.$namInThang  && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                    echo '<tr>

                      <td>' . $k . '</td>
                                <td>' . $data2[$i] -> mshs . '</td>
                                <td>' . $data2[$i] -> name . '</td>
                                <td>' . $data2[$i] -> cmnd . '</td>
                                <td> ' . $data2[$i] -> tien_thu . ' </td>

                            </tr>';
                                    $k = $k + 1;
                                }

                            }
                        }else{
                            for ($i = 0; $i < count($data2); $i++) {
                                if ( substr($data2[$i]->mshs, 9, 4) == $thangDaChon.$namInThang &&substr($data2[$i]->mshs, 16, 2)==$luachonInThang && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                    echo '<tr>

                      <td>' . $k . '</td>
                                <td>' . $data2[$i] -> mshs . '</td>
                                <td>' . $data2[$i] -> name . '</td>
                                <td>' . $data2[$i] -> cmnd . '</td>
                                <td> ' . $data2[$i] -> tien_thu . ' </td>

                            </tr>';
                                    $k = $k + 1;
                                }

                            }
                        }




                        echo '<tr>
                                  <td colspan="3"></td>
                                  <td><b><em>Tổng tiền:</em></b></td>
                                  <td><b style="font-style: italic; color: red" >' . number_format($tongTienThuTrongThang, 0, ',', '.') . '  <b><em>đồng</em></b></b></td>
                              </tr>';
                        ?>


                        </tbody>
                    </table><!--end Table-->
                <?php }?>



            </div><!-- end panel-3Thang-->
            <div class="panel" id="panel-4">
                <input type="hidden" id="phpVarQuarter" value="<?php echo $myQuarter; ?>">
                <div>
                    <form class="row" action="<?php echo base_url('admin/thong_ke/quarter_filter') ?>" method="post">
                        <div class="col-xs-9 col-md-9 ">
                            <select name="quarter" class="selectpicker col-sm-3" data-style="btn-success rm-relish " >
                                <option value='none'>Chọn quý </option>
                                <option value='1'>Quý I</option>
                                <option value='2'>Quý II</option>
                                <option value='3'>Quý III</option>
                                <option value='4'>Quý IV</option>
                            </select>

                            <select name="yearQuarter" class="selectpicker col-sm-3"  data-style="btn-success rm-relish ">
                                <option value="15">2015</option>
                                <option value="16">2016</option>
                                <option value="17">2017</option>
                                <option value="18">2018</option>
                            </select>

                            <select  name="luachonQuarter" class="selectpicker col-sm-5"  data-style="btn-success rm-relish ">Chọn thủ tục
                                <option value="all">Xem tất cả</option>
                                <?php
                                for($i = 1; $i<count($node_map);$i++){ $i<10?$myThing="0".$node_map[$i]->node_id-1:$node_map[$i]->node_id-1; ?>

                                    <option value="<?php echo $myThing; ?>"><?php echo $node_map[$i]->node_name;  ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-xs-2 col-md-2">
                            <input class="form-control btn-info" type="submit" value="Xem thông tin" data-style="btn-primary"  >
                        </div>


                    </form>
                </div>
                <?php


                $tempForShowingQuaterCondion = 0;

                $tongTienThuTrongQuy = 0;
                if($luaChonInQuarter== "all"){//Case All
                    if($quarter == 1){
                        for ($i = 0; $i < count($data2); $i++) {
                            if ( (substr($data2[$i]->mshs, 9, 2) == "01" ||substr($data2[$i]->mshs, 9, 2) == "02"||substr($data2[$i]->mshs, 9, 2) == "03" )&&substr($data2[$i]->mshs, 11, 2)==$namInQuarter  && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                $tongTienThuTrongQuy = $tongTienThuTrongQuy + $data2[$i]->tien_thu;
                                $tempForShowingQuaterCondion ++;
                            }
                        }
                    }

                    if($quarter == 2){
                        for ($i = 0; $i < count($data2); $i++) {
                            if ((substr($data2[$i]->mshs, 9, 2) == "04" ||substr($data2[$i]->mshs, 9, 2) == "05"||substr($data2[$i]->mshs, 9, 2) == "06" )&&substr($data2[$i]->mshs, 11, 2)==$namInQuarter  && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                $tongTienThuTrongQuy = $tongTienThuTrongQuy + $data2[$i]->tien_thu;
                                $tempForShowingQuaterCondion ++;
                            }
                        }
                    }

                    if($quarter == 3){
                        for ($i = 0; $i < count($data2); $i++) {
                            if ( (substr($data2[$i]->mshs, 9, 2) == "07" ||substr($data2[$i]->mshs, 9, 2) == "08"||substr($data2[$i]->mshs, 9, 2) == "09" )&&substr($data2[$i]->mshs, 11, 2)==$namInQuarter  && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                $tongTienThuTrongQuy = $tongTienThuTrongQuy + $data2[$i]->tien_thu;
                                $tempForShowingQuaterCondion ++;
                            }
                        }
                    }

                    if($quarter == 4){
                        for ($i = 0; $i < count($data2); $i++) {
                            if ( (substr($data2[$i]->mshs, 9, 2) == "10" ||substr($data2[$i]->mshs, 9, 2) == "11"||substr($data2[$i]->mshs, 9, 2) == "12" )&&substr($data2[$i]->mshs, 11, 2)==$namInQuarter  && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                $tongTienThuTrongQuy = $tongTienThuTrongQuy + $data2[$i]->tien_thu;
                                $tempForShowingQuaterCondion ++;
                            }
                        }
                    }



                }else{


                    if($quarter == 1){
                        for ($i = 0; $i < count($data2); $i++) {
                            if ((substr($data2[$i]->mshs, 9, 2) == "01" ||substr($data2[$i]->mshs, 9, 2) == "02"||substr($data2[$i]->mshs, 9, 2) == "03" )&&substr($data2[$i]->mshs, 11, 2)==$namInQuarter &&substr($data2[$i]->mshs, 16, 2)==$luachonInQuarter && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                $tongTienThuTrongQuy = $tongTienThuTrongQuy + $data2[$i]->tien_thu;
                                $tempForShowingQuaterCondion ++;
                            }
                        }
                    }   //Quy I

                    if($quarter == 2){
                        for ($i = 0; $i < count($data2); $i++) {
                            if ( (substr($data2[$i]->mshs, 9, 2) == "04" ||substr($data2[$i]->mshs, 9, 2) == "05"||substr($data2[$i]->mshs, 9, 2) == "06" )&&substr($data2[$i]->mshs, 11, 2)==$namInQuarter &&substr($data2[$i]->mshs, 16, 2)==$luachonInQuarter && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                $tongTienThuTrongQuy = $tongTienThuTrongQuy + $data2[$i]->tien_thu;
                                $tempForShowingQuaterCondion ++;
                            }
                        }
                    }   //Quy I

                    if($quarter == 3){
                        for ($i = 0; $i < count($data2); $i++) {
                            if ((substr($data2[$i]->mshs, 9, 2) == "07" ||substr($data2[$i]->mshs, 9, 2) == "08"||substr($data2[$i]->mshs, 9, 2) == "09" )&&substr($data2[$i]->mshs, 11, 2)==$namInQuarter &&substr($data2[$i]->mshs, 16, 2)==$luaChonInQuarter && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                $tongTienThuTrongQuy = $tongTienThuTrongQuy + $data2[$i]->tien_thu;
                                $tempForShowingQuaterCondion ++;
                            }
                        }
                    }   //Quy I

                    if($quarter == 4){
                        for ($i = 0; $i < count($data2); $i++) {
                            if ( (substr($data2[$i]->mshs, 9, 2) == "10" ||substr($data2[$i]->mshs, 9, 2) == "11"||substr($data2[$i]->mshs, 9, 2) == "12" )&&substr($data2[$i]->mshs, 11, 2)==$namInQuarter &&substr($data2[$i]->mshs, 16, 2)==$luaChonInQuarter && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                $tongTienThuTrongQuy = $tongTienThuTrongQuy + $data2[$i]->tien_thu;
                                $tempForShowingQuaterCondion ++;
                            }
                        }
                    }   //Quy I

                }

                ?>



                <?php
                if($tempForShowingQuaterCondion==0){?>
                    <input type="submit" style="background-color: transparent" value="Không có hồ sơ nào" class="btn">
                <?}else {?>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>MSHS</th>
                            <th>Tên</th>
                            <th>CMND</th>
                            <th>Tiền đã thu</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $k = 1;


                        if($luaChonInQuarter == "all") {

                            if($quarter == 1) {
                                for ($i = 0; $i < count($data2); $i++) {
                                    if ( (substr($data2[$i]->mshs, 9, 2) == "01" ||substr($data2[$i]->mshs, 9, 2) == "02"||substr($data2[$i]->mshs, 9, 2) == "03" ) && substr($data2[$i]->mshs, 11, 2) == $namInQuarter && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {


                                        echo '<tr>

                      <td>' . $k . '</td>
                                <td>' . $data2[$i]->mshs . '</td>
                                <td>' . $data2[$i]->name . '</td>
                                <td>' . $data2[$i]->cmnd . '</td>
                                <td> ' . $data2[$i]->tien_thu . ' </td>

                            </tr>';
                                        $k = $k + 1;
                                    }

                                }
                            }

                            if($quarter == 2) {
                                for ($i = 0; $i < count($data2); $i++) {
                                    if ( (substr($data2[$i]->mshs, 9, 2) == "04" ||substr($data2[$i]->mshs, 9, 2) == "05"||substr($data2[$i]->mshs, 9, 2) == "06" ) && substr($data2[$i]->mshs, 11, 2) == $namInQuarter && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {


                                        echo '<tr>

                      <td>' . $k . '</td>
                                <td>' . $data2[$i]->mshs . '</td>
                                <td>' . $data2[$i]->name . '</td>
                                <td>' . $data2[$i]->cmnd . '</td>
                                <td> ' . $data2[$i]->tien_thu . ' </td>

                            </tr>';
                                        $k = $k + 1;
                                    }

                                }
                            }

                            if($quarter == 3) {
                                for ($i = 0; $i < count($data2); $i++) {
                                    if ( (substr($data2[$i]->mshs, 9, 2) == "07" ||substr($data2[$i]->mshs, 9, 2) == "08"||substr($data2[$i]->mshs, 9, 2) == "09" ) && substr($data2[$i]->mshs, 11, 2) == $namInQuarter && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {


                                        echo '<tr>

                      <td>' . $k . '</td>
                                <td>' . $data2[$i]->mshs . '</td>
                                <td>' . $data2[$i]->name . '</td>
                                <td>' . $data2[$i]->cmnd . '</td>
                                <td> ' . $data2[$i]->tien_thu . ' </td>

                            </tr>';
                                        $k = $k + 1;
                                    }

                                }
                            }

                            if($quarter == 4) {
                                for ($i = 0; $i < count($data2); $i++) {
                                    if ((substr($data2[$i]->mshs, 9, 2) == "10" ||substr($data2[$i]->mshs, 9, 2) == "11"||substr($data2[$i]->mshs, 9, 2) == "12" ) && substr($data2[$i]->mshs, 11, 2) == $namInQuarter && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {


                                        echo '<tr>

                      <td>' . $k . '</td>
                                <td>' . $data2[$i]->mshs . '</td>
                                <td>' . $data2[$i]->name . '</td>
                                <td>' . $data2[$i]->cmnd . '</td>
                                <td> ' . $data2[$i]->tien_thu . ' </td>

                            </tr>';
                                        $k = $k + 1;
                                    }

                                }
                            }

                        }else{
                            if($quarter == 1) {
                                for ($i = 0; $i < count($data2); $i++) {
                                    if ( (substr($data2[$i]->mshs, 9, 2) == "01" ||substr($data2[$i]->mshs, 9, 2) == "02"||substr($data2[$i]->mshs, 9, 2) == "03" )&&substr($data2[$i]->mshs, 11, 2)==$namInQuarter &&substr($data2[$i]->mshs, 16, 2)==$luachonInQuater && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {


                                        echo '<tr>

                      <td>' . $k . '</td>
                                <td>' . $data2[$i]->mshs . '</td>
                                <td>' . $data2[$i]->name . '</td>
                                <td>' . $data2[$i]->cmnd . '</td>
                                <td> ' . $data2[$i]->tien_thu . ' </td>

                            </tr>';
                                        $k = $k + 1;
                                    }

                                }
                            }

                            if($quarter == 2) {
                                for ($i = 0; $i < count($data2); $i++) {
                                    if ( (substr($data2[$i]->mshs, 9, 2) == "04" ||substr($data2[$i]->mshs, 9, 2) == "05"||substr($data2[$i]->mshs, 9, 2) == "06" )&&substr($data2[$i]->mshs, 11, 2)==$namInQuarter &&substr($data2[$i]->mshs, 16, 2)==$luachonInQuater && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {


                                        echo '<tr>

                      <td>' . $k . '</td>
                                <td>' . $data2[$i]->mshs . '</td>
                                <td>' . $data2[$i]->name . '</td>
                                <td>' . $data2[$i]->cmnd . '</td>
                                <td> ' . $data2[$i]->tien_thu . ' </td>

                            </tr>';
                                        $k = $k + 1;
                                    }

                                }
                            }

                            if($quarter == 3) {
                                for ($i = 0; $i < count($data2); $i++) {
                                    if ( (substr($data2[$i]->mshs, 9, 2) == "07" ||substr($data2[$i]->mshs, 9, 2) == "08"||substr($data2[$i]->mshs, 9, 2) == "09" )&&substr($data2[$i]->mshs, 11, 2)==$namInQuarter &&substr($data2[$i]->mshs, 16, 2)==$luachonInQuater && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                        echo '<tr>

                      <td>' . $k . '</td>
                                <td>' . $data2[$i]->mshs . '</td>
                                <td>' . $data2[$i]->name . '</td>
                                <td>' . $data2[$i]->cmnd . '</td>
                                <td> ' . $data2[$i]->tien_thu . ' </td>

                            </tr>';
                                        $k = $k + 1;
                                    }

                                }
                            }

                            if($quarter == 4) {
                                for ($i = 0; $i < count($data2); $i++) {
                                    if ( (substr($data2[$i]->mshs, 9, 2) == "10" ||substr($data2[$i]->mshs, 9, 2) == "11"||substr($data2[$i]->mshs, 9, 2) == "12" )&&substr($data2[$i]->mshs, 11, 2)==$namInQuarter &&substr($data2[$i]->mshs, 16, 2)==$luachonInQuater && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {


                                        echo '<tr>

                      <td>' . $k . '</td>
                                <td>' . $data2[$i]->mshs . '</td>
                                <td>' . $data2[$i]->name . '</td>
                                <td>' . $data2[$i]->cmnd . '</td>
                                <td> ' . $data2[$i]->tien_thu . ' </td>

                            </tr>';
                                        $k = $k + 1;
                                    }

                                }
                            }
                        }


                        echo '<tr>
                                  <td colspan="3"></td>
                                  <td><b><em>Tổng tiền:</em></b></td>
                                  <td><b style="font-style: italic; color: red" >' . number_format($tongTienThuTrongQuy, 0, ',', '.') . '  <b><em>đồng</em></b></b></td>
                              </tr>';
                        ?>


                        </tbody>
                    </table><!--end Table-->
                <?php }?>






            </div><!-- end panel-4-Quy -->
            <div class="panel" id="panel-5"><!-- .panel-4 -->
                <?php

                $tongTienThuTrongNam = 0;
                $tempForShowingCondion = 0;
                if($lua_chon == "all") {

                    for ($i = 0; $i < count($data2); $i++) {

                        if ( substr($data2[$i]->mshs, 11, 2) == $namDaChon && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                            $tongTienThuTrongNam = $tongTienThuTrongNam + $data2[$i]->tien_thu;
                            $tempForShowingCondion++;
                        }

                    }
                }else{
                    for ($i = 0; $i < count($data2); $i++) {
                        if (substr($data2[$i]->mshs, 11, 2) == $namDaChon &&substr($data2[$i]->mshs, 16, 2)==$lua_chon&& $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                            $tongTienThuTrongNam = $tongTienThuTrongNam + $data2[$i]->tien_thu;
                            $tempForShowingCondion++;
                        }

                    }
                }
                ?>




                <input type="hidden" id="phpVarYear" value="<?php echo $myYear; ?>">

                <form class="row" action="<?php echo base_url('admin/thong_ke/year_filter') ?>" method="post">

                    <div class="col-xs-8 col-md-8">
                        <select name="year" class="selectpicker"  data-style="btn-success rm-relish ">
                            <option value="none">Chọn năm</option>
                            <option value="15">2015</option>
                            <option value="16">2016</option>
                            <option value="17">2017</option>
                            <option value="18">2018</option>
                        </select>


                        <select  name="luachon" class="selectpicker"  data-style="btn-success rm-relish ">Chọn thủ tục
                            <option value="all">Xem tất cả</option>
                            <?php
                            for($i = 1; $i<count($node_map);$i++){ $i<10?$myThing="0".$node_map[$i]->node_id-1:$node_map[$i]->node_id-1; ?>

                                <option value="<?php echo $myThing; ?>"><?php echo $node_map[$i]->node_name;  ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-xs-3 col-md-3">
                        <button type="submit" class="btn btn-info">Xem thông tin</button>
                    </div>

                </form>


                <?php
                if($tempForShowingCondion==0){?>
                    <input type="submit" style="background-color: transparent" value="Không có hồ sơ nào" class="btn">
                <?}else {?>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>MSHS</th>
                            <th>Tên</th>
                            <th>CMND</th>
                            <th>Tiền đã thu</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php

                        $k = 1;


                        if($lua_chon == "all") {

                            for ($i = 0; $i < count($data2); $i++) {

                                if ( substr($data2[$i]->mshs, 11, 2) == $namDaChon && $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                    echo '<tr>

                      <td>' . $k . '</td>
                                <td>' . $data2[$i] -> mshs . '</td>
                                <td>' . $data2[$i] -> name . '</td>
                                <td>' . $data2[$i] -> cmnd . '</td>
                                <td> ' . $data2[$i] -> tien_thu . ' </td>

                            </tr>';
                                    $k = $k + 1;
                                }

                            }
                        }else{
                            for ($i = 0; $i < count($data2); $i++) {
                                if (substr($data2[$i]->mshs, 11, 2) == $namDaChon &&substr($data2[$i]->mshs, 16, 2)==$lua_chon&& $data2[$i]->status == 5&&substr($data2[$i]->mshs, 14, 2)=="TP") {
                                    echo '<tr>

                      <td>' . $k . '</td>
                                <td>' . $data2[$i] -> mshs . '</td>
                                <td>' . $data2[$i] -> name . '</td>
                                <td>' . $data2[$i] -> cmnd . '</td>
                                <td> ' . $data2[$i] -> tien_thu . ' </td>

                            </tr>';
                                    $k = $k + 1;
                                }

                            }
                        }




                        echo '<tr>
                                  <td colspan="3"></td>
                                  <td><b><em>Tổng tiền:</em></b></td>
                                  <td><b style="font-style: italic; color: red" >' . number_format($tongTienThuTrongNam, 0, ',', '.') . '  <b><em>đồng</em></b></b></td>
                              </tr>';
                        ?>


                        </tbody>
                    </table><!--end Table-->
                <?php }?>


            </div><!--end panel 5-Nam-->
        </div><!--end Demo-->
    </div><!--end pad 12-->
</div><!--end chi tiet-->




<script type="text/javascript">


    $(function() {
        $("#datepicker1").datepicker();
        $("#datepicker2").datepicker();
    });

    jQuery(function($) {
        $.datepicker.regional["vi-VN"] = {
            closeText : "Đóng",
            prevText : "Trước",
            nextText : "Sau",
            currentText : "Hôm nay",
            monthNames : ["Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"],
            monthNamesShort : ["Một", "Hai", "Ba", "Bốn", "Năm", "Sáu", "Bảy", "Tám", "Chín", "Mười", "Mười một", "Mười hai"],
            dayNames : ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"],
            dayNamesShort : ["CN", "Hai", "Ba", "Tư", "Năm", "Sáu", "Bảy"],
            dayNamesMin : ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
            weekHeader : "Tuần",
            dateFormat : "dd/mm/yy",
            firstDay : 1,
            isRTL : false,
            showMonthAfterYear : false,
            yearSuffix : ""
        };

        $.datepicker.setDefaults($.datepicker.regional["vi-VN"]);
    });

    /*
     *************************************************

     SEBASTIAN NITU
     User Interface Functionality for BaseDemo

     Created by Sebastian Nitu
     http://www.sebnitu.com

     *************************************************
     */

    /*-------------------------------------------
     When Document is Ready (no conflict mode)
     ---------------------------------------------*/

    (function($) {

        $(document).ready(function() {

            $('.demo').each(function() {

                var tabs = $(this).find('.tabs a'),
                    panels = $(this).find('.panel').hide(),
                    hash = window.location.hash;
                $(".tabs li:eq(0)").addClass("active").show(); //Activate second tab
                $(".panel:eq(0)").show(); //Show second tab content


                if($('#phpVarWeek').val()==1){

                    tabs.parent().removeClass('active');
                    $(".panel:eq(0)").hide();
                    $(".tabs li:eq(1)").addClass("active").show(); //Activate second tab
                    $(".panel:eq(1)").show();

                }

                if($('#phpVarDay').val()==1){

                    tabs.parent().removeClass('active');

                    $(".tabs li:eq(0)").addClass("active").show(); //Activate second tab
                    $(".panel:eq(0)").show();

                }




                if($('#phpVarMonth').val()==1){

                    tabs.parent().removeClass('active');
                    // Toggle active class
                    $(".panel:eq(0)").hide();

                    //$(this).parent().addClass('active');
                    $(".tabs li:eq(2)").addClass("active").show(); //Activate second tab
                    $(".panel:eq(2)").show();

                }


                if($('#phpVarYear').val()==1){

                    tabs.parent().removeClass('active');
                    // Toggle active class
                    $(".panel:eq(0)").hide();

                    //$(this).parent().addClass('active');
                    $(".tabs li:eq(4)").addClass("active").show(); //Activate second tab
                    $(".panel:eq(4)").show();

                }

                if($('#phpVarQuarter').val()==1){

                    tabs.parent().removeClass('active');
                    // Toggle active class
                    $(".panel:eq(0)").hide();

                    //$(this).parent().addClass('active');
                    $(".tabs li:eq(3)").addClass("active").show(); //Activate second tab
                    $(".panel:eq(3)").show();

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

            var nav = $('.nav'),
                footer = $('.footer');

            nav.find('.download a').prepend('<img src="' + myScriptSrc + 'bd.download.png">');

            // For some reason IE 8 and below does not like this rule
            if ($.browser.msie && ($.browser.version < 9.0)) {
            } else {
                footer.append('<p>Powered by <a href="https://github.com/sebnitu/BaseDemo">BaseDemo</a>. Code responsibly.</p>');
            }

        });

    })(jQuery);

    /*-------------------------------------------
     Fin
     ---------------------------------------------*/

    /*
     *************************************************

     SEBASTIAN NITU
     baseDemo Bootstrapping

     Created by Sebastian Nitu
     http://www.sebnitu.com

     *************************************************
     */


    // Get the URL to this script directory
    var scripts = document.getElementsByTagName('script');
    var lastScript = scripts[scripts.length - 1];
    var myScript = lastScript.src;
    var myScriptSrc = myScript.replace(/bootstrap.js/, '');

    /*-------------------------------------------
     File Includes
     ---------------------------------------------*/

    // Include baseDemo styles
    document.write(unescape('%3Clink rel="stylesheet" media="all" href="' + myScriptSrc + 'bd.styles.css"%3E'));
    // Check if jQuery exists and include local version if not
    !window.jQuery && document.write(unescape('%3Cscript src="' + myScriptSrc + 'bd.jquery.min.js"%3E%3C/script%3E'));
    // Included baseDemo JavaScript
    document.write(unescape('%3Cscript src="' + myScriptSrc + 'bd.ui.js"%3E%3C/script%3E'));
    // Mobile viewport optimized
    document.write(unescape('%3Cmeta name="viewport" content="width=device-width, initial-scale=1.0"%3E'));

    /*-------------------------------------------
     Fin
     ---------------------------------------------*/

</script>




