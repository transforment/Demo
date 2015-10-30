<div class="col-lg-12">
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo base_url('trang_chu'); ?>"><i class="fa fa-home"></i> Trang chủ</a>
		</li>
		<li class="active">
			<i class="fa fa-user"></i> Thông tin chi tiết hồ sơ
		</li>
	</ol>
	<h3 class="page-header marTop"><i class="fa fa-user"></i> Thông tin chi tiết hồ sơ</h3>


	<?php

	if($details->status==0) $arr='Đang ở bàn tiếp nhận';
	else if($details->status==1)  $arr='Đang chờ xử lý';
	else if($details->status==2)  $arr='Đang xử lý';
	else if($details->status==3)  $arr='Đã xử lý';
	else if($details->status==4)  $arr='Đang ở bàn trả dân';
	else $arr='Hồ sơ hoàn tất';

	?>

	<div class="row">
		<div class="col-xs-6 col-md-2">
			<p><strong>Họ và tên:</strong></p>
			<p><strong>CMND:</strong></p>

		</div>
		<div class="col-xs-6 col-md-4">
			<p class="bold"><?php echo $details->name;?></p>
			<p class="bold"><?php echo $details->cmnd;?></p>

		</div>


		<div class="col-xs-6 col-md-2">
			<p><strong>Mã số hồ sơ:</strong></p>
			<p><strong>Ngày nhận:</strong></p>
			<p><strong>Ngày trả:</strong></p>
		</div>
		<div class="col-xs-6 col-md-3">
			<p class="bold mshs"><?php echo $details->mshs ;?></p>
			<p class="bold"><?php echo $ngay_nhan  ;?> </p>
			<p class="bold"><?php echo $ngay_tra  ;?></p>
		</div>

		<div class="col-xs-18 col-md-12">
			<h4><ins>Làm thủ tục: </ins></h4>
			<p class="bold"><?php echo $node_map[(int)substr($details->mshs, 16,2)]->node_name; ?></p>


			<?php
			$thong_tin_ho_so_da_thu=explode('+', $details->tt_giay_to_da_thu);
			if(count($thong_tin_ho_so_da_thu) > 1){?>

				<h4><ins>Giấy tờ đã nhận:</ins></h4>
				<table class="table table-hover ">
					<thead>
					<tr class="ying">
						<th style="text-align: center">#</th>
						<th style="text-align: center">Giấy tờ đã thu  </th>
						<th style="text-align: center">Số lượng </th>

					</tr>
					</thead>
					<tbody>
					<?php
					$k = 1;
					$thong_tin_ho_so_da_thu=explode('+', $details->tt_giay_to_da_thu);
					for ($i = 0;$i<count($thong_tin_ho_so_da_thu)-1;$i++ ) {?>
						<tr class="active">
							<td style="text-align: center"><?php echo $k ?></td>
							<td style="text-align: left"><?php echo $thong_tin_ho_so_da_thu[$i]; ?></td>
							<td style="text-align: center"><?php echo $thong_tin_ho_so_da_thu[$i+1]; ?></td>
						</tr>
						<?php $i++;$k++;}
					?>

					</tbody>
				</table>
			<?php }else{?>
				<h4><ins>Giấy tờ đã nhận:</ins></h4><p>Không</p>
			<?php } ?>







		</div>

	</div>

</div><!-- /.col-lg-12 -->
