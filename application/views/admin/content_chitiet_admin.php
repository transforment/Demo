<div class="col-lg-12">
    <ol class="breadcrumb">
        <li class="cursor back">
            <i class="fa fa-arrow-left"></i>
        </li>
        <li>
            <a href="<?php echo base_url('trang_chu'); ?>"><i class="fa fa-home"></i> Trang chủ</a>
        </li>
        <li>
            <a href="<?php echo base_url('tu_phap'); ?>"><i class="fa fa-files-o"></i> Hành chính tư pháp</a>
        </li>
        <li>
            <?php
            $dataname=array('Chứng thực','Khai sinh','Khai tử','Kết hôn','Giám hộ','Hộ tịch','Các thủ tục còn lại','Tìm kiếm');
            if (($aname<1)||($aname>8))$aname=7;
            echo '
            <a href="'.base_url('phan_muc/'.$aname.'').'">
                <i class="fa fa-file-o"></i> '.$dataname[$aname-1].'
            </a>
            ';?>
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

    <?php
    $attributes = array('class'=>'form-horizontal');
    echo form_open(''.base_url().'Trang_chi_tiet', $attributes);?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">Thông tin của người làm hồ sơ </h4>
        </div>
            <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <label>Họ và tên</label>
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <input class="form-control" id="dname" type="text" name="dname">
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="error">* <?php echo form_error('dname'); ?><br ></div>
                        </div>
                    </div>
                    <label></label>
                    <div class="row">
                        <div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <label>Số CMND </label>
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <input  class="form-control" id="inputCMND" type="text" name="dcmnd" >
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="error">* <?php echo form_error('dcmnd'); ?></div>
                        </div>
                    </div>
                    <label></label>
                    <div class="row">
                        <div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <label>Số điện thoại </label>
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <input class="form-control" id="inputPhone" type="text" name="dmobile" >
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="error">* <?php echo form_error('dmobile'); ?></div>
                        </div>
                    </div>
                    <label></label>
                    <div class="row">
                        <div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <label>Địa chỉ </label>
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <input class="form-control"  type="text" name="diachi" >
                        </div>

                    </div>
                    <label></label>
                    <div class="row">
                        <div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <label>Số ngày giải quyết </label>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <input class="form-control" id="songay" onBlur="doMacBookPro();" type="lable" name="songay" >
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="error"><span class="error">* <?php echo form_error('songay'); ?></span></div>
                        </div>


                    </div>
                <label></label>
                <div class="row">

                    <div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label>Ngày trả dự kiến:</label>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label id="time_info"></label>
                    </div>
                </div>


                </label>
                <!-- For saving purpose-->
                <input type="text" id="ma_Ho_So" name="ma_Ho_So"   style="visibility: hidden" >

                </div><!--Panel body-->
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">Giấy tờ kèm theo </h4>
        </div>
        <div class="panel-body">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th><input id="yingcheckbox" type="checkbox"  onclick="checkbox();" ></th>
                    <th>Loại giấy tờ </th>
                    <th>Số lượng </th>
                </tr>
                </thead>
                <tbody>

            <?php for ($i = 1; $i <= count($arrayThutuc); $i+=1) { ?>
                <?php if ($i < count($arrayThutuc)) {?>

                    <?php
                    $checkBox = "chk".$i;
                    $number = "myNumber".$i;
                    ?>
                                <tr id="2015">
                                    <td class=" col-md-1"><input class="lovecheckbox"type="checkbox"  name="chk_group" id= <?php echo $checkBox?> onclick="display(<?php echo $i ?>)" value="<?php echo $arrayThutuc[$i];?>"></td>
                                    <td class="col-md-9"><label style="font-weight: normal;"><?php echo $arrayThutuc[$i]?></label></td>
                                    <td class="col-md-2"><input  class=" lovetextbox form-control"  id = <?php echo $number ?> type="number" min="0" max="30" step="1" value="0" size="1"></td>
                                </tr>
                <?php } ?>
            <?php } ?>

                </tbody>

            </table>

        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">Ghi chú đính kèm   </h4>
        </div>
        <div class="panel-body">
            <textarea class="form-control"   name="note" ></textarea>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">Lệ phí   </h4>
        </div>
        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label>Lệ phí một bản:</label>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <input  onBlur="checkLePhi();" onfocus="if(this.value=='400.000') this.value='';" class="form-control" value="<?php echo $le_phi; ?>" id="lephi" type="text"  readonly>
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label>Số bản:</label>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <input  class="form-control" id="sobang" name="sobang" onBlur="doMath();" type="text"  placeholder="Nhập số bản  ">
                     </div>

                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <div class="error"><span class="error">* <?php echo form_error('sobang'); ?></span></div>
                    </div>

                 </div>
                <label></label>
                <div class="row">

                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label>Thành tiền :  </label>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <input  class="form-control" id="tongcong" name ="tong_cong" type="text"  readonly <br />
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        <label>đồng </label>
                    </div>
                </div>

            </div>
            <!--List of temporary textboxs-->
            <input type="text" id="ying_ho_so_da_nhan" name = "dying" style="visibility: hidden" >
            <!--YingLo-->
            <input type="text" id="today_1"  value="<?php echo date("His",time()+1) ; ?>" style="visibility: hidden" >
            <input type="text" id="today_2" value="<?php echo date("dmy"); ?>" style="visibility: hidden" >
            <input type="text" id="so_ngay" value="<?php echo $so_ngay; ?>" style="visibility: hidden" >
            <input type="text" id="node_id" value="<?php echo $node_map->node_id; ?>" style="visibility: hidden" >

            <input type="submit"  onclick="compileInputs();" class="btn btn-success btn-lg btn-block" id = 'submit'name="submit" value="Nhập hồ sơ">
        </div>

    </div>

    </form><!-- End form -->
</div>


