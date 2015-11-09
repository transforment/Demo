<div class="col-lg-12">
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo base_url('trang_chu'); ?>"><i class="fa fa-home"></i> Trang chủ</a>
		</li>
		<li class="active">
			<i class="fa fa-file-o"></i> Hồ sơ xử lý
		</li>
	</ol>
	<h3 class="page-header marTop"><i class="fa fa-file-o"></i> Hồ sơ xử lý</h3>

	<section class="panel">
		<?php if(!count($query->result())) echo " Không có hồ sơ nào.";
		else {
		echo'	<table class="table">
			<tr>
				<th>Mã số hồ sơ</th>
				<th>Tên</th>
				<th>Cmnd</th>
				<th></th>
				<th></th>

			</tr>';
			foreach ($query->result() as $row){
				$pos = strpos($row->mshs, 'TP');
				
        		if ((($pos != false)&&($level==21)) ||(($pos === false)&&($level==22))){
            		echo '<tr>
								<td><a href="'.base_url('admin/xem_ho_so/details/'.$row->id.'').'">
                  					<h5 class="truncate">'.$row->mshs.' </h5></a></td>
								<td> '.$row->name.'</td>
								<td>'.$row->cmnd.'</td>';
                if ($row->status==1)
                	echo '
								<td><button type="button" class="btn btn-success"
								 onclick=location.href="'.base_url('admin/admin_phong_ban/edit/'.$row->id.'').'">Nhận xử lý</button></td>
								<td></td>
								</tr>';
            	if ($row->status==2)
            		echo '
								<td><button type="button"  onclick="m(this.value)" value='.$row->id.' data-toggle="modal" data-target="#myModal" class="btn btn-warning"
								 >Báo hồ sơ lỗi  </button></td>
								<td><button type="button" class="btn btn-danger"
								 onclick=location.href="'.base_url('admin/admin_phong_ban/edit_stt/'.html_escape($row->id).'').'">Xử lý xong</button></td>
								</tr>';
				if (($row->status==3)||($row->status==6))
            		echo '
								<td>Đang chờ chuyển hồ sơ</td>
								<td></td>
								</tr>';
							}
				
			}

			
		echo '</table>';
		 } ?>
	</section>

		<div id="myModal" class="modal fade" role="dialog"  >
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Nhập lỗi </h4>
					</div>
					<div class="modal-body">

						<?php echo form_open('/admin/admin_phong_ban/notifyError/'.$row->id); ?>
						<textarea class="form-control" name="error" ></textarea>
						<input type="text" name="myYing" id="node_id_love" style="visibility: hidden" value="">
						<div><input type="submit" class="btn btn-danger" value="Xác nhận " name="submit"/></div>
						<?php echo form_close(); ?>

					</div>
				</div>

			</div>
		</div>

</div><!--/.col-lg-12-->


<script type="text/javascript">


	function m(myVar){

		document.getElementById('node_id_love').value = myVar;
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