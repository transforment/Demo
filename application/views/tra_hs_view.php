<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">

		
		<section class="panel">
			<table class="table table-hover">
					<tr>
						<th>#</th>
						<th>MSHS</th>
						<th>Tên</th>
						<th>CMND</th>
						<th></th>	
					</tr>
					<tbody>
			<?php

					$k = 1;

					foreach ($query->result() as $row){
						echo '<tr>
						<td> '.$k.'</td>
						<td> '.$row->mshs.'</td>
						<td> '.$row->name.'</td>
						<td> '.$row->cmnd.'</td>';
						if ($row->status==3)
						echo '<td><button type="button" class="btn btn-warning"
							onclick=location.href="'.base_url().'Admin_tra_ho_so/edit/'.$row->id.'">Nhận hồ sơ</button></td>
							</tr>';
						if ($row->status==4)
						echo '<td><button type="button" class="btn btn-danger"
							onclick=location.href="'.base_url().'Admin_tra_ho_so/edit_stt/'.html_escape($row->id).'">Đã trả dân</button></td>
							</tr>';
								$k++;
							}

							?>
					</tbody>
			</table>
		</section>

</div>


<script>
	var time = new Date().getTime();
	$(document.body).bind("mousemove keypress", function () {
		time = new Date().getTime();
	});

	setInterval(function() {
		if (new Date().getTime() - time >= 6000) {
			location.reload(false);
		}
	}, 1000);
</script>