<!--div class="col-xs-9 col-md-10 pad2" id="chi_tiet">

<table class="table">
	<tr>   
		<td>Mã số hồ sơ</td> 
        <td>Tên</td>
        <td>Số CMND</td>
        <td>Trạng thái</td>
        <td></td>
    </tr>
        

<php
 			 foreach ($query->result() as $row){
				if($row->status==0) $arr='Đang ở bàn tiếp nhận';
					else if($row->status==1)  $arr='Đang chờ xử lý';
					else if($row->status==2)  $arr='Đang xử lý';
					else if($row->status==3)  $arr='Đã xử lý';
					else if($row->status==4)  $arr='Đang ở bàn trả dân';
					else $arr='Hồ sơ hoàn tất';
    			echo '<div class="row col-xs-9 col-md-10 pad2"><tr>
    					<td> '.$row->mshs.'</td>
    					<td> '.$row->name.'</td>
    					<td>'.$row->cmnd.'</td>
    					<td><button type="button" class="btn btn-warning" 
       					 onclick=location.href="'.base_url().'Ho_so_da_tao/edit/'.$row->id.'">Chỉnh sửa</button></td>
    					<td><button type="button" class="btn btn-danger" 
       					 onclick=location.href="'.base_url().'Ho_so_da_tao/edit_stt/'.html_escape($row->id).'">Chuyển phòng ban</button></td>
    					</tr></div>';

          
			}
 
</table>

</div-->
<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">
  <section class="panel">
  <table class="table">
    <tr>
      <th>Mã số hồ sơ</th>
      <th>Tên</th>
      <th>Số CMND</th>
      <th></th>
      <th>Trạng thái</th>
      
    </tr>
    <?php
    foreach ($query->result() as $row){
      if($row->status==0) $arr='Đang ở bàn tiếp nhận';
      else if($row->status==1)  $arr='Đang chờ xử lý';
      else if($row->status==2)  $arr='Đang xử lý';
      else if($row->status==3)  $arr='Đã xử lý';
      else if($row->status==4)  $arr='Đang ở bàn trả dân';
      else $arr='Hồ sơ hoàn tất';
      echo '<div class="row col-xs-9 col-md-10 pad2"><tr>
              <td> '.$row->mshs.'</td>
              <td> '.$row->name.'</td>
              <td>'.$row->cmnd.'</td>
              <td><button type="button" class="btn btn-warning"
                 onclick=location.href="'.base_url().'Ho_so_da_tao/edit/'.$row->id.'">Chỉnh sửa</button></td>
              <td><button type="button" class="btn btn-danger"
                 onclick=location.href="'.base_url().'Ho_so_da_tao/edit_stt/'.html_escape($row->id).'">Chuyển phòng ban</button></td>
              </tr></div>';
    }
    ?>
  </table>
  </section>
  <?php echo $this->pagination->create_links(); ?>
</div>