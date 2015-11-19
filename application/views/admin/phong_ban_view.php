<div class="col-lg-12">
	<ol class="breadcrumb">
		<li class="cursor back">
			<i class="fa fa-arrow-left"></i>
		</li>
		<li>
			<a href="<?php echo base_url('trang_chu'); ?>"><i class="fa fa-home"></i> Trang chủ</a>
		</li>
	</ol>
	<h3 class="page-header marTop"><i class="fa fa-files-o"></i> Hồ sơ xử lý</h3>
	<div class="panel-body">
		<div class="row">
			<table id="table" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>Mã số hồ sơ</th>
					<th>Tên</th>
					<th>Cmnd</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
	<?php if(!count($query->result())) echo " Không có hồ sơ nào.";
	else {
		$array_status='0';
		        $listc="0";
                $listq=$this->db->where('level',12)->or_where('level',13)->get('user'); 
                foreach ($listq->result() as $row1){
                $listc= $listc.'/'.$row1->id;
                }
                $num_count3=$this->db->where('status',3)->or_where('status', 6)->count_all_results('ho_so')+1;
                echo '<input type="hidden" id="num_count3" value="'.$num_count3 .'" />';
                echo '<input type="hidden" id="list_sent_tv" value="'.$listc.'" />';
		foreach ($query->result() as $row){
					echo '
					<tr>
						<td><a href="'.base_url('admin/xem_ho_so/details/'.$row->id.'').'">'.$row->mshs.'</a></td>
						<td> '.$row->name.'</td>
						<td>'.$row->cmnd.'</td>';
				if ($row->status==1)
					echo '
						<td><button type="button" class="btn btn-success"onclick=location.href="'.base_url('admin/admin_phong_ban/edit/'.$row->id.'').'">Nhận xử lý</button></td>
					</tr>';
				if ($row->status==2){
					echo '
						<td><button type="button"  onclick="getval('.$row->mshs.')"  data-toggle="modal" data-target="#myModal_'.$row->id.'" class="btn btn-warning sent_noti_tv">Báo hồ sơ lỗi</button>&nbsp;
						<button type="button" class="btn btn-danger sent_noti_tv"onclick=location.href="'.base_url('admin/admin_phong_ban/edit_stt/'.$row->id.'').'">Xử lý xong</button></td>
					</tr>';
					$array_status=$array_status.'/'.$row->id;
				}
				if (($row->status==3)||($row->status==6))
					echo '
						<td>Đang chờ chuyển hồ sơ</td>
					</tr>';
			//}

		}
	} ?>
				</tbody>
			</table>
		</div><!-- /.row -->
	</div><!-- /.panel-body -->
	<?php 
	$fu=explode('/', $array_status);
	for ($ai=1;$ai<count($fu);$ai++){
	echo'
	<div id="myModal_'.$fu[$ai].'" class="modal fade" role="dialog"  >
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Nhập lỗi </h4>
				</div>
				<div class="modal-body">';
				echo form_open('/admin/admin_phong_ban/notifyError/'); 
				$qqq = $this->db->get_where('ho_so', array('id' => $fu[$ai]))->row(); 
					      
					$da_thu = str_replace('<b>','',$qqq->tt_giay_to_da_thu);
					$da_thu = str_replace('</b>','', $da_thu);
					$da_thu=explode('+', $da_thu);
					echo'<input type="hidden"  name="count"  value="'.count($da_thu).'">';
					for ($i = 0;$i<count($da_thu)-1;$i++ ) {
						echo '<input type="hidden" name="ten_rieng_'.$i.'"   value="'.$da_thu[$i].'">
						'.$da_thu[$i].'<textarea type="text" cols="60" name="loi_rieng_'.$i.'" placeholder="Nhập lỗi riêng"  value=""></textarea><br>';
						$i++;
					}
					echo'
					<textarea class="form-control" name="error" rows="4" placeholder="Nhập lỗi chung của hồ sơ"></textarea>

					<input type="hidden" name="node_id" id="node_id"  value="ddd">
					<div><input type="submit" class="btn btn-danger" value="Xác nhận " name="submit"/></div>';
					 echo form_close();
					echo'
				</div>
			</div>

		</div>
	</div>
';
}
?>
</div><!--/.col-lg-12-->


<script type="text/javascript">

	function getval(myVar){

		document.getElementById('node_id').value = myVar;
	}


	$(document).on("click", "#lovely", function(e) {

		bootbox.prompt("Nhập lỗi:",function(res){
			if(res==null){
				alert("Nothing");
			}else{
				bootbox.alert("Hi: "+res);
			}
		})

	});


</script>