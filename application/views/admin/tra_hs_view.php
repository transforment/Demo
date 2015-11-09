<div class="col-lg-12">
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo base_url('trang_chu'); ?>">
				<i class="fa fa-home"></i> Trang chủ
			</a>
		</li>
		<li class="active">
			<i class="fa fa-plus"></i> Hồ sơ trả dân
		</li>
	</ol>
	<h3 class="page-header marTop"><i class="fa fa-plus"></i> Hồ sơ trả dân</h3>

	<section class="panel">
		<table class="table table-hover">
				<tr>
					<th>MSHS</th>
					<th>Tên</th>
					<th>CMND</th>
					<th></th>
				</tr>
				<tbody>
				<?php
				foreach ($query->result() as $row){
					echo '<tr>
						<td><a href="'.base_url('admin/xem_ho_so/details/'.$row->id.'').'">
                  		<h5>'.$row->mshs.' </h5></a></td>
						<td> '.$row->name.'</td>
						<td> '.$row->cmnd.'</td>';
					if ($row->status==3)
						echo '<td><button type="button" class="btn btn-warning"
							onclick=location.href="'.base_url('admin/admin_tra_ho_so/edit/'.$row->id.'').'">Nhận hồ sơ</button></td>
							</tr>';
					if ($row->status==4)
						echo '<td>
					        '.anchor('admin/admin_tra_ho_so/edit_stt/'.$row->id.'','<button class="btn btn-info">
                			<i class="icon-plus"></i>Trả hồ sơ cho dân </button>',array(
                    		'onclick'=>"return confirm('Lệ phí thu ".$row->tien_thu." đồng')",)).'</td>
							</tr>';
					if($row->status==6) 
						echo '<td>
							<button type="button" data-toggle="modal"  class="btn btn-danger" onclick=location.href="'.base_url('admin/admin_tra_ho_so/edit_error/'.$row->id.'').'">Nhận hồ sơ lỗi </buton></td>
							</tr>';
					if($row->status==7)
						echo '<td>
					        '.anchor('admin/admin_tra_ho_so/edit_stt_error/'.$row->id.'','<button class="btn btn-danger">
                			<i class="icon-plus"></i>Trả hồ sơ lỗi </button>',array(
                    		'onclick'=>"return confirm('".$row->error."')",)).'</td>
							</tr>';

					
				}?>
				</tbody>
			</table>


	</section>

</div>


