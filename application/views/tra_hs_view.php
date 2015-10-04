<div class="col-xs-9 col-md-10 pad2" id="chi_tiet">
    <div class="row center">
		<table class="table">
			<tr>
				<td>Mã số hồ sơ</td>
				<td>Tên</td>
				<td>Nhận lúc</td>
				<td></td>
			</tr>
				  <?php
				  foreach ($query->result() as $row){
						echo '<tr>
								<td> '.$row->mshs.'</td>
								<td> '.$row->name.'</td>
								<td>'.$row->date.'</td>
								<td><button type="button" class="btn btn-warning"
								 onclick=location.href="'.base_url().'Admin_tra_ho_so/edit/'.$row->id.'">Nhận hồ sơ</button></td>
								<td></td>
								</tr>';}
				  foreach ($query2->result() as $row){
						echo '<tr>
								<td> '.$row->mshs.'</td>
								<td> '.$row->name.'</td>
								<td>'.$row->date.'</td>

								<td><button type="button" class="btn btn-danger"
								 onclick=location.href="'.base_url().'Admin_tra_ho_so/edit_stt/'.html_escape($row->id).'">Đã trả dân</button></td>
								</tr>';}
				?>
		</table>
    </div>
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