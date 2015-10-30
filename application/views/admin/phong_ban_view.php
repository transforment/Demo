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
		<table class="table">
			<tr>
				<th>Mã số hồ sơ</th>
				<th>Tên</th>
				<th>Nhận lúc</th>
				<th></th>
			</tr>
			<?php
			foreach ($query->result() as $row){
				echo '<tr>
								<td><a href="'.base_url('admin/xem_ho_so/details/'.$row->id.'').'">
                  		<h5 class="truncate">'.$row->mshs.' </h5></a></td>
								<td> '.$row->name.'</td>
								<td>'.$row->date.'</td>
								<td><button type="button" class="btn btn-warning"
								 onclick=location.href="'.base_url('admin/admin_phong_ban/edit/'.$row->id.'').'">Nhận xử lý</button></td>
								<td></td>
								</tr>';}
			foreach ($query2->result() as $row){
				echo '<tr>
								<td> '.$row->mshs.'</td>
								<td> '.$row->name.'</td>
								<td>'.$row->date.'</td>

								<td><button type="button" class="btn btn-danger"
								 onclick=location.href="'.base_url('admin/admin_phong_ban/edit_stt/'.html_escape($row->id).'').'">Xử lý xong</button></td>
								</tr>';}
			?>
		</table>
	</section>

</div><!--/.col-lg-12-->