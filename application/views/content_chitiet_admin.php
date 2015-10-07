<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">
    <ul id="breadcrumb">
        <?php 
        echo'
        <li><a href="'.site_url('home').'"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a> </li>
        <li><a href="'.site_url('hanh_chinh_tu_phap').'"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Hành chính tư pháp</a></li>
        <li><a href=""><span class="glyphicon glyphicon-file" aria-hidden="true"></span> '. $str.'</a></li>
    ';?>
    </ul>
    <div class="col-xs-12 col-md-12 pad">

        <div class="panel panel-primary">
            <div class="panel-heading header">
                <h3 class="font-size"><?php echo html_escape($node_map->node_name); ?></h3>
            </div>
            <div class="panel-body">

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thành phần, số lượng hồ sơ:</h3>
                    </div>
                    <div class="panel-body">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">a) Thành phần hồ sơ bao gồm:</h3>
                            </div>
                            <div class="panel-body">
                                <p><?php echo $thanh_phan_data; ?></p>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">b) Số lượng hồ sơ:</h3>
                            </div>
                            <div class="panel-body">
                                <p><?php echo $thanh_phan_data_1; ?></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="panel panel-info ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Phí, lệ phí:</h3>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $le_phi_data; ?></p>
                    </div>
                </div>


                <div class="panel panel-info ">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thông tin của người làm hồ sơ:</h3>
                    </div>
                    <div class="panel-body">
<?php 
    echo form_open(''.base_url().'Trang_chi_tiet');?>
<table class="table">
    <tr>    
        <td>Tên</td>
        <td><?php 
        $data1 = array(
              'name'=>"name",'type'=>"text" ,
              'cols' => "40",'rows' => '1','placeholder'=>"Nhập tên");
        $data2 = array(
              'name'=>"cmnd",'type'=>"text" ,
              'cols' => "40",'rows' => '1','placeholder'=>"Nhập ");
        $data3 = array(
              'name'=>"note",'type'=>"text" ,
              'cols' => "40",'rows' => '3','placeholder'=>"Nhập ");        
        echo form_textarea($data1);?></td>
        <td><span class="error"><?php echo form_error('name'); ?></span></td>
    </tr>   
    <tr>    
        <td>Số CMND</td>
        <td><?php echo
        form_textarea($data2);?></td> 
        <td><span class="error"><?php echo form_error('cmnd'); ?></span></td>

    </tr>
    <tr>    
        <td>Ghi chú đính kèm</td>
        <td><?php echo
        form_textarea($data3);?></td>

    </tr>
    <tr>    
        <td></td>
        <td><?php 
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $data = array(
             'node_id'=>''.$node_map->node_id.'',
             'p_id'=>''.$node_map->p_id.'',
              'date_f'   => ''.date("h/i/s/a/d/m/Y").'',
              'date'   => ''.date("h:i:sa d/m/Y").''
            );

        echo form_hidden($data);
 
        echo form_submit('submit','Nhận hồ sơ','class="btn btn-primary"');?></td>
        <td></td>
    </tr>
</table>
<?php 
    echo form_close('');?>


                </div>
             </div>
            </div><!--panel-body-->
        </div><!--panel-->
    </div><!--col-xs-12-->

</div>