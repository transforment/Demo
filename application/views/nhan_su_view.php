<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">
    <div class="col-xs-12 col-md-12 pad">

        <div class="panel panel-primary">
            <div class="panel-heading header">
                <h3 class="font-size">Thông tin nhân sự</h3>
            </div>
            <div class="panel-body">
                <div class="panel panel-info">
                <div class="panel-heading">
                <h3 class="panel-title">Tiếp nhận Hồ sơ</h3>
                </div>
                    <div class="panel-body"> 
                  <?php
                  foreach ($query->result() as $row){
                    if ($row->level==11)$vitri='Tiếp nhận Hồ sơ';
                    if ($row->level==12)$vitri='Tiếp nhận và trả Hồ sơ'; 
                    if ($row->level==13)$vitri='Trả Hồ sơ'; 
                    if ($row->level==21)$vitri='Phòng ban Tư Pháp';
                    if ($row->level==12)$vitri='Phòng ban Đất đai';
                   if ($row->level==11)
                        echo '
                        <p> <table class="table">
                        <tr>
                            <td>'.$row->hoten.'</td>
                            <td><button type="button" class="btn btn-danger" data-toggle="modal" 
                             data-target="#doiname">Đổi vị trí</button></td> 
                            <td><button type="button" class="btn btn-danger" data-toggle="modal" 
                            data-target="#doipass">Xóa tài khoản</button></td>
                        </tr>
                        </table></p>';
                        }?>
                      
                
                <?php     
                if (isset($error)){
                    echo '<tr><td></td><td class="error">'.$error.'</td></tr>';
                    }?>
				</div>
                  
                </div>
                <div class="panel panel-info">
                <div class="panel-heading">
                <h3 class="panel-title">Tiếp nhận và trả Hồ sơ</h3>
                </div>
                    <div class="panel-body"> 
                  <?php
                  foreach ($query->result() as $row){
                   if ($row->level==12)
                        echo '
                        <p> <table class="table">
                        <tr>
                            <td>'.$row->hoten.'</td>
                            <td><button type="button" class="btn btn-danger" data-toggle="modal" 
                             data-target="#doiname">Đổi vị trí</button></td> 
                            <td><button type="button" class="btn btn-danger" data-toggle="modal" 
                           data-yourParameter="107"  data-target="#doipass">Xóa tài khoản</button></td>
                        </tr>
                        </table></p>';
                        }?>
                </div>
   
                </div>

                <div class="panel panel-info">
                <div class="panel-heading">
                <h3 class="panel-title">Trả Hồ sơ</h3>
                </div>
                    <div class="panel-body"> 
                  <?php
                  foreach ($query->result() as $row){
                   if ($row->level==13)
                        echo '
                        <p> <table class="table">
                        <tr>
                            <td>'.$row->hoten.'</td>
                            <td><button type="button" class="btn btn-danger" data-toggle="modal" 
                             data-target="#doiname">Đổi vị trí</button></td> 
                            <td><button type="button" class="btn btn-danger" data-toggle="modal" 
                            data-target="#doipass">Xóa tài khoản</button></td>
                        </tr>
                        </table></p>';
                        }?>
                </div>
   
                </div>
                <div class="panel panel-info">
                <div class="panel-heading">
                <h3 class="panel-title">Phòng ban Tư Pháp</h3>
                </div>
                    <div class="panel-body"> 
                  <?php
                  foreach ($query->result() as $row){
                   if ($row->level==21)
                        echo '
                        <p> <table class="table">
                        <tr>
                            <td>'.$row->hoten.'</td>
                            <td><button type="button" class="btn btn-danger" data-toggle="modal" 
                             data-target="#doiname">Đổi vị trí</button></td> 
                            <td><button type="button" class="btn btn-danger" data-toggle="modal" 
                            data-target="#doipass">Xóa tài khoản</button></td>
                        </tr>
                        </table></p>';
                        }?>
                </div>
   
                </div>


                 <div class="panel panel-info">
                <div class="panel-heading">
                <h3 class="panel-title">Phòng ban Đất đai</h3>
                </div>
                    <div class="panel-body"> 
                  <?php
                  foreach ($query->result() as $row){
                   if ($row->level==22)
                        echo '
                        <p> <table class="table">
                        <tr>
                            <td>'.$row->hoten.'</td>
                            <td><button type="button" class="btn btn-danger" data-toggle="modal" 
                             data-target="#doiname">Đổi vị trí</button></td> 
                            <td><button type="button" class="btn btn-danger" data-toggle="modal" 
                            data-target="#doipass">Xóa tài khoản</button></td>
                        </tr>
                        </table></p>';
                        }?>
                </div>
   
                </div>              


            </div>
        </div>
    </div>        
</div>

<div class="modal fade" id="doipass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
   <button type="button" class="btn btn-primary">Save changes</button>
    </div>
    </div>
  </div>
</div>
<script>
$('#doipass').on('show.bs.modal', function(e) {
  var yourParameter = e.relatedTarget.dataset.yourParameter;
  $('#doipass').modal('show');
});
</script>