
<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">
    <div class="col-xs-12 col-md-12 pad">



        <div class="demo" id="demo-one">

            <nav class="subnav tabs">
                <ul>
                    <li class="active"><a href="#panel-0">Chọn ngày </a></li>
                    <li ><a href="#panel-1">Theo ngày  </a></li>
                    <li><a href="#panel-2">Theo tuần</a></li>
                    <li><a href="#panel-3">Theo tháng</a></li>
                    <li><a href="#panel-4">Theo năm </a></li>

                </ul>
            </nav>
            <class ="panels">

            <div class="panel clearfix" id="panel-0">






                <div class="form-group">

                <form action="<?php echo site_url('Thong_ke/day_filter') ?>" method="post">
                    <p >Nhập ngày: <input class="form-control" type="text" name ="datepicker" id="datepicker"></p>
                    <input class="form-control" type="submit" value="Xem thông tin">
                </form>
                <br>
                </div>

                <?php

if (isset($chonNgay)){
                // $chonNgay; -->Bien duoc truyen qua



                preg_match_all('!\d+!', $chonNgay, $matches);
                $myDayString = $matches[0][0].$matches[0][1].substr($matches[0][2],2,2) ;




                $tongTienThuTrongNgayDaChon = 0;

                for ( $i = 0; $i <count($data2);$i++){

                    if($data2[$i]->ma_so_can_bo_thu_tien==$_SESSION['ma_can_bo'] && substr($data2[$i]->mshs, 7, 6) == $myDayString ){
                        $tongTienThuTrongNgayDaChon = $tongTienThuTrongNgayDaChon+ $data2[$i]->tien_thu;
                    }

                }
}
                ?>

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
if (isset($chonNgay)){

                    $k = 1;
                    for ( $i = 0; $i <count($data2);$i++){


                        if($data2[$i]->ma_so_can_bo_thu_tien==$_SESSION['ma_can_bo'] && substr($data2[$i]->mshs, 7, 6) == $myDayString ){
                            echo '<tr>

                                <td>'.$k.'</td>
                                <td>'.$data2[$i]->mshs.'</td>
                                <td>'.$data2[$i]->name.'</td>
                                <td>'.$data2[$i]->cmnd.'</td>
                                <td> '.$data2[$i]->tien_thu.' </td>

                            </tr>';
                            $k=$k+1 ;
                        }


                    }
                
                    echo '<tr>
                                  <td colspan="3"></td>
                                  <td><b><em>Tổng tiền:</em></b></td>
                                  <td><b style="font-style: italic; color: red" >'.number_format($tongTienThuTrongNgayDaChon, 0, ',', '.').'  <b><em>đồng</em></b></b></td>
                              </tr>';

}

                    ?>



                    </tbody>
                </table>
                </fieldset>





















            </div>







                        <div class="panel clearfix" id="panel-1">

                           <?php
                            $currentDate = date("dmy");
                           $Date = date("d/m/Y");
                           echo $Date;
                            $tongTienThuTrongNgay = 0;

                            for ( $i = 0; $i <count($data2);$i++){

                            if($data2[$i]->ma_so_can_bo_thu_tien==$_SESSION['ma_can_bo'] && substr($data2[$i]->mshs, 7, 6) == $currentDate ){
                            $tongTienThuTrongNgay = $tongTienThuTrongNgay+ $data2[$i]->tien_thu;
                            }

                            }

                            ?>




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
                                for ( $i = 0; $i <count($data2);$i++){


                                    if($data2[$i]->ma_so_can_bo_thu_tien==$_SESSION['ma_can_bo'] && substr($data2[$i]->mshs, 7, 6) == $currentDate ){
                                        echo '<tr>

                                <td>'.$k.'</td>
                                <td>'.$data2[$i]->mshs.'</td>
                                <td>'.$data2[$i]->name.'</td>
                                <td>'.$data2[$i]->cmnd.'</td>
                                <td> '.$data2[$i]->tien_thu.' </td>

                            </tr>';
                                        $k=$k+1 ;
                                    }


                                }
                                echo '<tr>
                                  <td colspan="3"></td>
                                  <td><b><em>Tổng tiền:</em></b></td>
                                  <td><b style="font-style: italic; color: red" >'.number_format($tongTienThuTrongNgay, 0, ',', '.').'  <b><em>đồng</em></b></b></td>
                              </tr>';



                                ?>



                                </tbody>
                            </table>
                            </fieldset>




                        </div><!-- .panel -->

                        <div class="panel" id="panel-2">

                            <fieldset>
                                <legend>Thống kê thông tin hồ sơ trong tuần </legend>
                                <?php




                                $time = strtotime('last monday');
                                $strDateFrom = date('dmy', $time);

                                $time1 = strtotime('now');
                                $strDateTo = date('dmy', $time1);





                                function createDateRangeArray($strDateFrom,$strDateTo)
                                {
                                    // takes two dates formatted as YYYY-MM-DD and creates an
                                    // inclusive array of the dates between the from and to dates.

                                    // could test validity of dates here but I'm already doing
                                    // that in the main script

                                    $aryRange=array();

                                    $iDateFrom=mktime(1,0,0,substr($strDateFrom,2,2),substr($strDateFrom,0,2),substr($strDateFrom,4,2));
                                    $iDateTo=mktime(1,0,0,substr($strDateTo,2,2),     substr($strDateTo,0,2),substr($strDateTo,4,2));

                                    if ($iDateTo>=$iDateFrom)
                                    {
                                        array_push($aryRange,date('dmy',$iDateFrom)); // first entry
                                        while ($iDateFrom<$iDateTo)
                                        {
                                            $iDateFrom+=86400; // add 24 hours
                                            array_push($aryRange,date('dmy',$iDateFrom));
                                        }
                                    }
                                    return $aryRange;
                                }


                                $daysOfTheCurrentWeek = createDateRangeArray($strDateFrom,$strDateTo);





                                            $tongTienTrongTuan = 0;


                                            for ( $i = 0; $i <count($data2);$i++) {
                                                for ($j = 0; $j < count($daysOfTheCurrentWeek); $j++) {

                                                    if ($data2[$i]->ma_so_can_bo_thu_tien == $_SESSION['ma_can_bo'] && substr($data2[$i]->mshs, 7, 6) == $daysOfTheCurrentWeek[$j]) {
                                                        $tongTienTrongTuan = $tongTienTrongTuan + $data2[$i]->tien_thu;


                                                    }


                                                }
                                            }




                                            ?>




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
                                            for ( $i = 0; $i < count($data2);$i++) {
                                                for ($j = 0; $j < count($daysOfTheCurrentWeek); $j++) {
                                                    if ($data2[$i]->ma_so_can_bo_thu_tien == $_SESSION['ma_can_bo'] && substr($data2[$i]->mshs, 7, 6) == $daysOfTheCurrentWeek[$j]) {
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
                                            echo '<tr>
                                  <td colspan="3"></td>
                                  <td><b><em>Tổng tiền:</em></b></td>
                                  <td><b style="font-style: italic; color: red" >'.number_format($tongTienTrongTuan, 0, ',', '.').'  <b><em>đồng</em></b></b></td>
                              </tr>';



                                            ?>



                                            </tbody>
                                        </table>
                            </fieldset>




                        </div><!-- .panel -->

                        <div class="panel" id="panel-3">

                            <?php
                            $currentMonth = date("my");
                            $tongTienThuTrongThang = 0;

                            for ( $i = 0; $i <count($data2);$i++){

                                if($data2[$i]->ma_so_can_bo_thu_tien==$_SESSION['ma_can_bo'] && substr($data2[$i]->mshs, 9, 4) == $currentMonth ){
                                    $tongTienThuTrongThang = $tongTienThuTrongThang+ $data2[$i]->tien_thu;
                                }

                            }

                            ?>




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
                                for ( $i = 0; $i <count($data2);$i++){


                                    if($data2[$i]->ma_so_can_bo_thu_tien==$_SESSION['ma_can_bo'] && substr($data2[$i]->mshs, 9, 4) == $currentMonth ){
                                        echo '<tr>

                                <td>'.$k.'</td>
                                <td>'.$data2[$i]->mshs.'</td>
                                <td>'.$data2[$i]->name.'</td>
                                <td>'.$data2[$i]->cmnd.'</td>
                                <td> '.$data2[$i]->tien_thu.' </td>

                            </tr>';
                                        $k=$k+1 ;
                                    }


                                }
                                echo '<tr>
                                  <td colspan="3"></td>
                                  <td><b><em>Tổng tiền:</em></b></td>
                                  <td><b style="font-style: italic; color: red" >'.number_format($tongTienThuTrongThang, 0, ',', '.').'  <b><em>đồng</em></b></b></td>
                              </tr>';



                                ?>



                                </tbody>
                            </table>
                            </fieldset>










                        </div>

                    <div class="panel" id="panel-4">

                        <?php
                        $currentYear = date("y");
                        $tongTienThuTrongNam = 0;

                        for ( $i = 0; $i <count($data2);$i++){

                            if($data2[$i]->ma_so_can_bo_thu_tien==$_SESSION['ma_can_bo'] && substr($data2[$i]->mshs, 11, 2) == $currentYear ){
                                $tongTienThuTrongNam = $tongTienThuTrongNam+ $data2[$i]->tien_thu;
                            }

                        }

                        ?>




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

                            for ( $i = 0; $i <count($data2);$i++){



                                if($data2[$i]->ma_so_can_bo_thu_tien==$_SESSION['ma_can_bo'] && substr($data2[$i]->mshs, 11, 2) == $currentYear ){
                                    echo '<tr>

                                <td>'.$k.'</td>
                                <td>'.$data2[$i]->mshs.'</td>
                                <td>'.$data2[$i]->name.'</td>
                                <td>'.$data2[$i]->cmnd.'</td>
                                <td> '.$data2[$i]->tien_thu.' </td>

                            </tr>';
                                    $k=$k+1 ;
                                }


                            }
                            echo '<tr>
                                  <td colspan="3"></td>
                                  <td><b><em>Tổng tiền:</em></b></td>
                                  <td><b style="font-style: italic; color: red" >'.number_format($tongTienThuTrongNam, 0, ',', '.').'  <b><em>đồng</em></b></b></td>
                              </tr>';



                            ?>



                            </tbody>
                        </table>
                        </fieldset>



                    </div>






                        </body>
                        </html>









                    </div>






</div>





<script type="text/javascript">













    $(function() {
        $( "#datepicker" ).datepicker();
    });

    jQuery(function ($)
    {
        $.datepicker.regional["vi-VN"] =
        {
            closeText: "Đóng",
            prevText: "Trước",
            nextText: "Sau",
            currentText: "Hôm nay",
            monthNames: ["Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"],
            monthNamesShort: ["Một", "Hai", "Ba", "Bốn", "Năm", "Sáu", "Bảy", "Tám", "Chín", "Mười", "Mười một", "Mười hai"],
            dayNames: ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"],
            dayNamesShort: ["CN", "Hai", "Ba", "Tư", "Năm", "Sáu", "Bảy"],
            dayNamesMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
            weekHeader: "Tuần",
            dateFormat: "dd/mm/yy",
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ""
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

    (function ($) {

        $(document).ready(function () {

            $('.demo').each(function () {

                var tabs = $(this).find('.tabs a'),
                    panels = $(this).find('.panel').hide(),
                    hash = window.location.hash;

                $(this).find('.tabs a:first').addClass('active');
                $(this).find('.panel:first').show();

                tabs.click(function () {
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
            if ($.browser.msie && ($.browser.version < 9.0) ) { } else {
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

    /*-------------------------------------------
     Save Global Variables
     ---------------------------------------------*/

    // Get the URL to this script directory
    var scripts = document.getElementsByTagName('script');
    var lastScript = scripts[scripts.length-1];
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