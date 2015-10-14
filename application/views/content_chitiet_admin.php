<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">
    <div class="col-xs-12 col-md-12 pad">

        <div class="panel panel-primary">
            <div class="panel-heading header">
                <h3 class="font-size"><?php echo html_escape($node_map->node_name); ?></h3>
            </div>
            <div class="panel-body">



                <div class="panel panel-info ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thông tin của người làm hồ sơ:</h3>
                    </div>


                    <div class="panel-body">


                        <form class="form-horizontal"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <?php echo form_open('Trang_chi_tiet');?>
                            <?php if (isset($message)) { ?>
                                <h5 style="color:blueviolet;"><em>Thông tin hồ sơ đã được nhập, nhập thông tin cho người tiếp theo!</em></h5><br>
                            <?php } ?>





                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tên người dân </label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="dname" type="text" name="dname" <br />

                                </div>
                                <div class="error"><span class="error">* <?php echo form_error('dname'); ?><br /</span></div>

                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">CMND của người dân  </label>
                                <div class="col-sm-6">
                                    <input id = "inputCmnd" class="form-control" id="dcmnd" type="text" name="dcmnd" <br />

                                </div>
                                <div class="error"><span class="error">* <?php echo form_error('dcmnd'); ?><br /</span></div>

                            </div>

                            <div class="form-group">
                                <div>
                                    <label class="col-sm-2 control-label">Thời hạn giải quyết thủ tục</label>
                                    <input type="radio" name="choice-animals" id="choice-animals-dogs" onclick="updateThutuc(this.value)" value="00" required>
                                    <label for="choice-animals-dogs">Trong ngày</label>




                                    <input type="radio" name="choice-animals" id="choice-animals-cats" onclick="updateThutuc(this.value)" value="00">
                                    <label for="choice-animals-cats">Ngày hôm sau</label>

                                    <div class="reveal-if-active">
                                        <div class="form-group">
                                            <div></div>
                                            <label class="col-sm-2 control-label"><h6>Sđt của người dân</h6></label>
                                            <div class="col-sm-3">
                                                <input class="form-control" id="inputPhone" type="text" name="dmobile"  <br />

                                            </div>
                                            <div class="error"><span class="error">* <?php echo form_error('dmobile'); ?><br /></span></div>

                                            <div id>

                                                <label class="col-sm-2 controll"><h6>Số ngày giải quyết </h6></label>
                                                <div class="col-sm-1">
                                                    <input class="form-control" id="inputDate" type="text" name="dsongay" value="<?php echo $node_map->so_ngay ?>"  <br />

                                                </div>
                                                <div class="error"><span class="error">* <?php echo form_error('dsongay'); ?><br /></span></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-sm-2 control-label">Thời hạn giải quyết </label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="thoi_Han" type="text" name="dthoi_Han" value="--" readonly <br />

                                </div>


                            </div>





                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ngày hẹn trả </label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="dhentra" type="text" name="dhentra" value="Sáng từ 07:00 đến 11:30. Chiều từ 13h30 đến 17h00" readonly <br />

                                </div>


                            </div>





                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mã hồ sơ </label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="ma_Ho_So"  type="text" name="ma_Ho_So"  readonly value = "---" <br />

                                </div>


                            </div>






                            <?php
                            date_default_timezone_set("Asia/Ho_Chi_Minh");

                            $today_1 =  date("Ymd");

                            ?>

                            <br>
                            <div>

                                <?php


                                $pizza  = $node_map->loai_giay_to;
                                $arrayThutuc = explode("+", $pizza);




                                ?>



                                <!--Tài liệu kèm theo đơn -->
                                <fieldset class="group">
                                    <legend><h3>Tài liệu kèm theo đơn</h3></legend>


                                    <div class="form-group">
                                        <div class="col-xs-10">

                                            <?php for ($i = 1; $i <= count($arrayThutuc); $i+=1) { ?>
                                                <?php if ($i < count($arrayThutuc)) {?>

                                                    <ul class="checkbox">
                                                        <li><input type="checkbox" name="chk_group" value="<?php echo $arrayThutuc[$i];?>" /> <?php echo $arrayThutuc[$i];?>

                                                              <div class="reveal-if-active">

                                                                      <label class="col-sm-2 controll"><h6>Số lượng </h6></label>
                                                                      <input type="text" id="inputSoLuong" value="1" size="4">




                                                                </div>


                                                        </li>



                                                    </ul>


                                            <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </fieldset>

                            </div>



                            <br>


                            <fieldset class="form-horizontal">
                                <legend><h3>Lệ phí</h3></legend>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Lệ phí một bản:  </label>
                                    <div class="col-sm-3">
                                        <input  class="form-control" value="<?php echo $node_map->le_phi; ?>" id="lephi" type="text"  readonly <br />

                                    </div>
                                    <div class="error"><span class="error"> <label class="col-sm-2 control-label">Số bản:  </label>
                                    <div class="col-sm-2">
                                        <input  class="form-control" id="sobang" onBlur="doMath();" type="text"  placeholder="Nhập số bản  " <br />

                                    </div><br /</span></div>


                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Thành tiền :  </label>
                                    <div class="col-sm-3">
                                        <input  class="form-control" id="tongcong" name ="tong_cong" type="text"  readonly <br />

                                    </div>
                                    <div ><b>đồng</b><br /></div>

                                </div>





                            </fieldset>



                          <!-- <input type="checkbox" onclick="myCheckboxFunction();"> -->


                            <input type="submit"  onclick="compileInputs();" class="btn btn-info btn-lg btn-block align_form center-block" id = 'submit'name="submit" value="Nhập hồ sơ"">



                        </form>



                        <form method="post" action="#">

                            <style>



                                li {list-style-type: none;}
                                .reveal-if-active {
                                    opacity: 0;
                                    max-height: 0;
                                    overflow: hidden;
                                    font-size: 16px;
                                    -webkit-transform: scale(0.8);
                                    -ms-transform: scale(0.8);
                                    transform: scale(0.8);
                                    -webkit-transition: 0.5s;
                                    transition: 0.5s;
                                }
                                .reveal-if-active label {
                                    display: block;
                                    margin: 0 0 3px 0;
                                }

                                input[type="radio"]:checked ~ .reveal-if-active, input[type="checkbox"]:checked ~ .reveal-if-active {
                                    opacity: 1;
                                    max-height: 100px;
                                    padding: 10px 20px;
                                    -webkit-transform: scale(1);
                                    -ms-transform: scale(1);
                                    transform: scale(1);
                                    overflow: visible;
                                }


                                form > div {
                                    margin: 0 0 20px 0;
                                }
                                form > div label {
                                    font-weight: bold;
                                }
                                form > div > div {
                                    padding: 5px;
                                }
                                form > h4 {
                                    color: green;
                                    font-size: 24px;
                                    margin: 0 0 10px 0;
                                    border-bottom: 2px solid green;
                                }


                                * {
                                    box-sizing: border-box;
                                }

                            </style>



                        <script src="<?php echo base_url(); ?>js/jquery-2.1.4.min.js"></script>



                        <script language="JavaScript" type="text/javascript">


                            function doMath() {
                                var lephi = parseInt(document.getElementById('lephi').value);
                                var sobang = parseInt(document.getElementById('sobang').value);



                                var total =lephi * sobang;



                                document.getElementById('tongcong').value = total;
                            }




                            $("#inputCmnd,#inputDate,#inputPhone,#inputSoLuong").keypress(function(e) {
                                var a = [];
                                var k = e.which;



                                if (e.which < 48 || e.which > 57  ) {
                                    e.preventDefault();
                                }



                            });










                            var FormStuff = {

                                init: function() {
                                    this.applyConditionalRequired();
                                    this.bindUIActions();
                                },

                                bindUIActions: function() {
                                    $("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
                                },

                                applyConditionalRequired: function() {

                                    $(".require-if-active").each(function() {
                                        var el = $(this);
                                        if ($(el.data("require-pair")).is(":checked")) {
                                            el.prop("required", true);
                                        } else {
                                            el.prop("required", false);
                                        }
                                    });

                                }

                            };

                            FormStuff.init();



                            function compileInputs() {



                                var isCheck = document.getElementsByName('choice-animals');



                                if(isCheck[1].checked){
                                    var showForm
                                }

                                if (!isCheck[0].checked && !isCheck[1].checked) {

                                    alert("Kiểm tra lại thời hạn giải quyết thủ tục");
                                    event.preventDefault();
                                } else {

                                    var inputs = new Array();

                                    $(':checkbox').each(function () {
                                        if ($(this).is(':checked')) {
                                            inputs.push($(this).val());
                                        }
                                    });

                                    if(inputs.length == 0){
                                        var isPhoneFilled = document.getElementsByName('dmobile');
                                        if(isPhoneFilled[0].value.length <10 || isPhoneFilled[0].value.length >11){
                                         alert("Kiểm tra lại thông tin số điện thoại");
                                         document.getElementById("choice-animals-cats").checked = true;
                                            event.preventDefault();

                                         }

                                    }else{
                                        if (confirm("Bạn đã nhận các thủ tục sau: \n\n" + inputs.join('\n\n'))) {
                                            var isPhoneFilled = document.getElementsByName('dmobile');
                                            if(isPhoneFilled[0].value.length <10 || isPhoneFilled[0].value.length >11){
                                                alert("Kiểm tra lại thông tin số điện thoại");
                                                document.getElementById("choice-animals-cats").checked = true;

                                            }
                                        } else {

                                            var isPhoneFilled = document.getElementsByName('dmobile');
                                            if(isPhoneFilled[0].length <10 || isPhoneFilled[0].length >11){
                                                alert("Kiểm tra lại thông tin số điện thoại");
                                                document.getElementById("choice-animals-cats").checked = true;

                                        }
                                            event.preventDefault();
                                        }

                                    }



                                }
                            }

                            function updateThutuc(formID) {
                                var otherValue = document.getElementsByName('choice-animals');
                                var addCode = 2010;
                                if (otherValue[0].checked) {
                                    addCode = otherValue[0].value;
                                } else {
                                    addCode = otherValue[1].value;
                                }

                                <?php $today_1 =  date("his",time()+1) ;
                                $today_2 = date("dmy");
                                 ?>
                                var string_1 = "TP0";
                                var string_2 = "TP";


                                document.getElementById('ma_Ho_So').value = "<?php echo $today_1?>" + "-" + "<?php echo $today_2?>" + "-" + string_2 + "<?php echo $node_map->ak_id; ?>" + "-" + addCode;
                                document.getElementById('thoi_Han').value = "<?php if($node_map->so_ngay == 1){
                                    echo "Trong ";

                                    }else{
                                   echo $node_map->so_ngay;}?>" + " ngày";
                                var k = "<?php echo $node_map->so_ngay ?>";

                                if (k==1) {

                                    document.getElementById("choice-animals-cats").disabled = true;
                                    document.getElementById("choice-animals-dogs").checked = true;
                                }else{
                                    document.getElementById("choice-animals-cats").checked = true;
                                }


                            }







                        </script>


                    </div><!--panel-body-->
                </div><!--panel-->
            </div><!--col-xs-12-->

        </div>