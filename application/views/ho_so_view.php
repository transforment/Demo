<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">
  <section class="panel">
  <table class="table">
    <tr>
      <th>Mã số hồ sơ</th>
      <th>Tên</th>
      <th>Số CMND</th>
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
    					<td>'.$arr.'</td>
    					</tr></div>';

          }
			
  ?>
</table>
</section>
  <!--?php echo $this->pagination->create_links(); ?-->
</div>