<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">
    <div class="col-xs-12 col-md-12 pad">

        <div class="panel panel-primary">
            <div class="panel-heading header">
                <h3 class="font-size">Thông tin cá nhân</h3>
            </div>
            <div class="panel-body">
                <p>	<table class="table">
                  <?php
                  foreach ($query->result() as $row){
                    if ($row->level==11)$vitri='Tiếp nhận Hồ sơ';
                    else if ($row->level==12)$vitri='Tiếp nhận và trả Hồ sơ'; 
                    else if ($row->level==13)$vitri='Trả Hồ sơ'; 
                    else if ($row->level==21)$vitri='Phòng ban Tư Pháp';
                    else if ($row->level==22)$vitri='Phòng ban Đất đai';
                    else   $vitri='Quản trị';
                        echo '<tr><td>Họ và tên</td>
                                <td>'.$row->hoten.'</td>
                                </tr>
                                <tr><td>Vị trí</td>
                                <td>'.$vitri.'</td>
                               
                                </tr>';

                            }?>
                <tr><td><button type="button" class="btn btn-danger" data-toggle="modal" 
                    data-target="#doiname">Đổi tên đăng nhập</button></td>
                <td><button type="button" class="btn btn-danger" data-toggle="modal" 
                    data-target="#doipass">Đổi mật khẩu</button></td>
                </tr>
                <?php     
                if (isset($error)){
                    echo '<tr><td class="alert alert-danger" role="alert">'.$error.'</td></tr>';
                    }?>
				</table></p>
                  
                </div>
            </div>
        </div>
    </div>        
</div>

<!-- Modal -->
<div class="modal fade" id="doipass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Đổi mật khẩu</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open(''.site_url('Profile/change_pass').'');?>
        <table class="table">
        <?php 
        $data1 = array(
              'name'=>"old",'type'=>"password" ,
              'size'  => '38','placeholder'=>"Nhập mật khẩu cũ");
        $data2 = array(
              'name'=>"new",'type'=>"password" ,
              'size'  => '38','placeholder'=>"Nhập mật khẩu mới");
         $data3 = array(
              'name'=>"renew",'type'=>"password" ,
              'size'  => '38','placeholder'=>"Nhập lại mật khẩu");
        $data = array(
             'error'=>'sai',
             'error'=>'sai',
              
            );

        echo form_hidden($data);
        ?>
      
     <tr>
        <td>Mật khẩu cũ</td>
        <td><?php echo
        form_password($data1);?></td>

    </tr>
     <tr>
        <td>Mật khẩu mới</td>
        <td><?php echo
        form_password($data2);?></td>

    </tr>
     <tr>
        <td>Nhập lại mật khẩu mới</td>
        <td><?php echo
        form_password($data3);?></td>

    </tr>
    <tr>    
        <td></td>
        <td><?php echo
        form_submit('submit','Đổi mật khẩu','class="btn btn-primary"');?></td>
    </tr>
</table>
<?php 
    echo form_close('');?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
    </div>
    </div>
  </div>
</div>


<div class="modal fade" id="doiname" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Đổi Tên</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open(''.site_url('Profile/change_name').'');?>
        <table class="table">
        <?php 
        $data1 = array(
              'name'=>"namenew",'type'=>"text" ,
              'size'  => '38','placeholder'=>"Nhập tên mới");
        ?>
      
     <tr>
        <td>Nhập tên mới</td>
        <td><?php echo
        form_input($data1);?></td>

    </tr>

    <tr>    
        <td></td>
        <td><?php echo
        form_submit('submit','Đổi tên','class="btn btn-primary"');?></td>
    </tr>
</table>
<?php 
    echo form_close('');?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
    </div>
    </div>
  </div>
</div>