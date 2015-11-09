<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo base_url('trang_chu'); ?>"><i class="fa fa-home"></i> Trang chủ</a>
        </li>

        <li class="active">
            <i class="fa fa-file-o"></i> Chỉnh sửa hồ sơ
        </li>
    </ol>
    <h3 class="page-header marTop"><i class="fa fa-file-o"></i> Chỉnh sửa hồ sơ</h3>
    <?php
        $so_ngay_giai_quyet=explode('-', $details->mshs);
        $sngq = substr($so_ngay_giai_quyet[3],0,2);
    //Lấy dữ liệu từ $thanh_phan_data truyen qua de dung cho viec ho so dinh kem
    if(isset($message)){

        echo "<script type='text/javascript'>alert('Thông tin đã được nhập!'); window.location = '/Demo-2/trang_chu';</script>";
   }
   ?>

    <div class="panel-body">
        <h4 class="page-header marTop">Cập nhật thông tin của người làm hồ sơ</h4>
        <div class="panel-body">

            <form class="form-horizontal"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <!--Name Field-->
                <div class="form-group">
                    <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Họ và tên  </label>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <input class="form-control" id="dname" type="text" name="dname" value = "<?php echo $details->name; ?>" <br />
                    </div>
                    <div class="error"><span class="error">* <?php echo form_error('dname'); ?><br /</span></div>
                </div>
                <!--Id field-->
                <div class="form-group">
                    <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Số CMND </label>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <input  class="form-control" id="inputCMND" type="text" name="dcmnd" value = "<?php echo $details->cmnd; ?>" >

                    </div>
                    <div class="error"><span class="error">* <?php echo form_error('dcmnd'); ?></span></div>

                </div>


                <div class="form-group">
                    <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Số điện thoại </label>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <input class="form-control" id="inputPhone" type="text" name="dmobile" value = "<?php echo $details->sdt; ?>">

                    </div>
                    <div class="error"><span class="error">* <?php echo form_error('dmobile'); ?></span></div>

                </div>


                <div class="form-group">
                    <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Địa chỉ  </label>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <input class="form-control"  type="text" name="diachi" value = "<?php echo $details->dia_chi; ?>" >

                    </div>


                </div>

                <div class="form-group">
                    <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Số ngày giải quyết </label>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <input class="form-control" id="songay"  type="lable" name="songay"value = "<?php echo $sngq; ?>" >

                    </div>
                    <div class="error"><span class="error">* <?php echo form_error('songay'); ?></span></div>

                </div>

                <div class="form-group">
                    <ul class="container-fluid">
                        <li class="row">
                            <label class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label">Ghi chú  </label>
                            <div class="col-sm-5  col-xs-5  col-md-5  col-lg-5">
                                <textarea class="form-control "  name="note"  cols="50" rows="4"><?php echo $details->note; ?></textarea>
                            </div>

                        </li>
                        <li class="row">

                        </li>
                    </ul>
                </div>
                <!-- For saving purpose-->
                <input type="text" id="ma_Ho_So" name="ma_Ho_So" value="<?php echo $details->mshs; ?>"  style="visibility: hidden" >

                <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <input type="submit"  onclick="compileInputs();" class="btn btn-success btn-lg btn-block" id = 'submit'name="submit" value="Cập nhật hồ sơ">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <input type="button" onclick="confirm('Bạn có muốn xoá hồ sơ này?')?location.href='<?php  echo base_url('admin/ho_so_da_tao/deleteRow/'.$details->id); ?>':alert(2)" id="delete" class="btn btn-danger btn-lg btn-block"  value="Xoá hồ sơ ">
                </div>
                </div>
                <!-- When time is ok
                <style>
                    .modal-footer {background:#66512c}
                    .modal-body{background:#66512c;}
                </style>
                <a class="alert" href=#>Alesrt!</a>
                -->
            </form><!-- End form -->
        </div><!--Panel body-->
    </div><!--End body-->
    <script type="text/javascript">
        //Prevent user from entering characters
/*  For later used
        $(document).on("click", ".alert", function(e) {

            bootbox.alert("Hello, Bạn muốn thay đổi thông tin ");

        });
*/
        function compileInputs(){
            var theString = document.getElementById("ma_Ho_So").value;
            var soNgay =parseInt(document.getElementById("songay").value);
            if(soNgay < 10){
                value = "0"+soNgay;
            }else{
                value = soNgay;
            }
            theString = theString.substr(0,19)+value;
            document.getElementById("ma_Ho_So").value = theString;
            //OK
        }
        </script>
