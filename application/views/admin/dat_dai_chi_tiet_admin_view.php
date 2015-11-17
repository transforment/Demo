<div class="col-lg-12">
    <ol class="breadcrumb">
        <li class="cursor back">
            <i class="fa fa-arrow-left"></i>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>trang_chu"><i class="fa fa-home"></i> Trang chủ</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>dat_dai"><i class="fa fa-files-o"></i> Hành chính trong lĩnh vực đất đai</a>
        </li>
    </ol>
    <h3 class="page-header marTop"><i class="fa fa-file-o"></i> <?php echo html_escape($node_map->node_name); ?></h3>

    <?php
    $today_1 =  date("Ymd");
    //Lấy dữ liệu từ $thanh_phan_data truyen qua de dung cho viec ho so dinh kem
    $arrayThutuc = explode("+", $thanh_phan_data);
    if(isset($message)){

        echo "<script type='text/javascript'>alert('Thông tin đã được nhập!'); window.location = '/Demo-2/trang_chu';</script>";

    }
    ?>

            <form class="form-horizontal"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">Thông tin của người làm hồ sơ</h4>
                    </div>
                    <div class="panel-body">
                        <!--Name Field-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Họ và tên  </label>
                            <div class="col-sm-6">
                                <input class="form-control" id="dname" type="text" name="dname" <br />

                            </div>
                            <div class="error">* <?php echo form_error('dname'); ?><br></div>

                        </div>
                        <!--Id field-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Số CMND </label>
                            <div class="col-sm-6">
                                <input  class="form-control" id="inputCMND" type="text" name="dcmnd" >

                            </div>
                            <div class="error">* <?php echo form_error('dcmnd'); ?></div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Số điện thoại </label>
                            <div class="col-sm-6">
                                <input class="form-control" id="inputPhone" type="text" name="dmobile" >

                            </div>
                            <div class="error">* <?php echo form_error('dmobile'); ?></div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Địa chỉ  </label>
                            <div class="col-sm-6">
                                <input class="form-control"  type="text" name="diachi" >

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Số ngày giải quyết </label>
                            <div class="col-sm-2">
                                <input class="form-control" id="songay"  onBlur="doMacBook();" type="lable" name="dsongay" >

                            </div>
                            <div class="error">* <?php echo form_error('dsongay'); ?></div>

                        </div>

                        <!-- For saving purpose-->
                        <input type="text" id="ma_Ho_So" name="ma_Ho_So"   style="visibility: hidden" >
                    </div>

                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">Giấy tờ kèm theo</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <b style="color:Red;">Loại giấy tờ</b>
                            </div>
                             <div class="col-md-4 col-md-offset-2">
                                <b style="color:Red;">Số lượng</b>
                            </div>
                           

                        </div>

                        <?php for ($i = 1; $i <= count($arrayThutuc); $i+=1) { ?>
                            <?php if ($i < count($arrayThutuc)) {?>

                                <?php
                                $checkBox = "chk".$i;
                                $form = "myDiv".$i;
                                $number = "myNumber".$i;
                                ?>
                                <ul class="container-fluid">
                                    <li class="row" >
                                        <div class="col-sm-offset-1 col-sm-6 col-md-offset-1 col-md-6 col-lg-offset-1 col-lg-6"  > <?php echo $arrayThutuc[$i];?></div>
                                        <p class="col-sm-2 col-md-2 col-xs-2 "  id = <?php echo $form  ?> >

                                            <input  id = <?php echo $number ?> type="number" min="1" max="30" step="1" value="1" size="1">
                                        </p>
                                        <input class="col-sm-1 col-md-1 col-xs-1"  type="checkbox"  name="chk_group" id= <?php echo $checkBox?> onclick="display_(<?php echo $i ?>)" value="<?php echo $arrayThutuc[$i];?>">


                                    </li>

                                </ul>
                            <?php } ?>
                        <?php } ?>


                    </div>

                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">Ghi chú đính kèm   </h4>
                    </div>
                    <div class="panel-body">
                        <textarea class="form-control"   name="note" ></textarea>
                        <!--List of temporary textboxs-->
                        <input type="text" id="ying_ho_so_da_nhan" name = "dying" style="visibility: hidden" >

                        <!--YingLo-->

                        <input type="text" id="today_1"  value="<?php echo date("His",time()+1) ; ?>" style="visibility: hidden" >
                        <input type="text" id="today_2" value="<?php echo date("dmy"); ?>" style="visibility: hidden" >
                        <input type="text" id="so_ngay" value="<?php echo 0; ?>" style="visibility: hidden" >
                        <input type="text" id="node_id" value="<?php echo $node_map->node_id; ?>" style="visibility: hidden" >


                        <!-- <input type="checkbox" onclick="myCheckboxFunction();"> -->
                        <input type="submit"  onclick="compileInputs();" class="btn btn-success btn-lg btn-block" id = 'submit'name="submit" value="Nhập hồ sơ">
                    </div>
                </div>




            </form><!-- End form -->



    </div>
    <script type="text/javascript">

        function compileInputs() {
            var inputsThanhPhan = new Array();
            var inputsSoLuong = new Array();
            $(':checkbox').each(function () {
                if ($(this).is(':checked')) {
                    var thenum = this.id.match(/\d+/)[0];
                    var soLuong = document.getElementById("myNumber" + thenum);
                    inputsSoLuong.push(soLuong);
                    inputsThanhPhan.push( $(this).val());

                }
            });
            for (i = 0; i < inputsSoLuong.length; i++) {
                inputsThanhPhan[i] = inputsThanhPhan[i]+"+"+"<b>"+inputsSoLuong[i].value+"</b>"+"+";
            }
            document.getElementById("ying_ho_so_da_nhan").value = inputsThanhPhan;
        }

        var string_1 = "DD";
        var myDayVar = document.getElementById("songay").value;
        var theLifeOfWolf = 0;
        var theLifeOfYing = 0;

        document.getElementById("songay").value = myDayVar;
        var node_id = parseInt(document.getElementById('node_id').value);

        if(node_id >1){
            theLifeOfWolf = node_id -1;
            if(theLifeOfWolf < 10){
                theLifeOfYing = "0"+theLifeOfWolf;
            }else{
                theLifeOfYing = theLifeOfWolf;
            }
        }

        var theString = document.getElementById("today_1").value + "-" + document.getElementById("today_2").value + "-" + string_1 + theLifeOfYing + "-" ;
        var addCode = 2015;
        if( myDayVar == 0){
            addCode = "00";
        }else{
            addCode = document.getElementById("songay").value;
        }

        theString = theString + addCode;

        document.getElementById("ma_Ho_So").value = theString;
        //OK
        function doMacBook(){
            var myDayVar = document.getElementById("songay").value;
            var string_1 = "DD";
            var theLifeOfWolf = 0;
            var theLifeOfYing = 0;
            document.getElementById("songay").value = myDayVar;
            var node_id = parseInt(document.getElementById('node_id').value);

            if(node_id >1){
                theLifeOfWolf = node_id -1;
                if(theLifeOfWolf < 10){
                    theLifeOfYing = "0"+theLifeOfWolf;
                }else{
                    theLifeOfYing = theLifeOfWolf;
                }
            }
            var theString = document.getElementById("today_1").value + "-" + document.getElementById("today_2").value + "-" + string_1 + theLifeOfYing + "-" ;
            var addCode = 2015;
            if( myDayVar == 0){
                addCode = "00";
            }else{
                addCode = document.getElementById('songay').value;
            }
            theString = theString + addCode;
            document.getElementById("ma_Ho_So").value = theString;
        }
    </script>
