<div class="col-xs-9 col-md-10" id="chi_tietttt"> 
<div class="container theme-showcase" role="main">


<form method="post" class="form-horizontal" action="<?php echo base_url();?>edit/edit_thu_tuc">
	<div>
		<label for="publication_id">Tên</label>
		<select name= "publication_id"class="bg-primary">
			<?php foreach ($com as $id => $name) {
					echo '<option value="'.html_escape($id).'">'.html_escape($name).'</option>';
			}
			?>
		</select>
	</div>

	<div class="input-group ">
		<label for="name">Trình tự</label>
		<textarea  type="text" name="trinh_tu" class="form-control"value="" placeholder="" cols="60" rows="6"></textarea>
	</div>
	<div class="input-group">
		<label for="name">Thời gian</label>
		<textarea type="text" name="thoi_gian" class="form-control"value="" placeholder=""cols="60" rows="5"></textarea>
	</div>

	<div class="input-group ">
		<label for="name">Cách thức</label>
		<textarea type="text" name="cach_thuc" class="form-control"value="" placeholder=""cols="60" rows="2"></textarea>

	</div>



	<div class="input-group">
		<label for="name">Thành phần hồ sơ</label>
		<textarea type="text" name="thanh_phan" class="form-control"value="" placeholder=""cols="60" rows="3"></textarea>

	</div>

		<div class="input-group ">
		<label for="name">Số lượng hồ sơ</label>
		<input type="text" name="thanh_phan_note" class="form-control"value="" placeholder=""/>
	</div>



	<div class="input-group">
		<label for="name">Thời hạn giải quyết</label>
		<textarea type="text" name="giai_quyet" class="form-control"value="" placeholder=""cols="60" rows="3"></textarea>

	</div>


	<div class="input-group">
		<label for="name">Đối tượng thực hiện thủ tục hành chính</label>
		<input type="text" name="doi_tuong" class="form-control"value="" placeholder=""/>
	</div>
	<div class="input-group">
		<label for="name">Cơ quan thực hiện thủ tục hành chính</label>
		<input type="text" name="co_quan" class="form-control"value="" placeholder=""/>
	</div>

		<div class="input-group ">
		<label for="name">Kết quả thực hiện thủ tục hành chính</label>
		<input type="text" name="ket_qua" class="form-control"value="" placeholder=""/>
	</div>
	<div class="input-group">
		<label for="name">Phí, lệ phí</label>
		<textarea type="text" name="le_phi" class="form-control"value="" placeholder=""cols="60" rows="3"></textarea>

	</div>

	<div class="input-group">
		<label for="name">Tên mẫu đơn, mẫu tờ khai</label>
		<textarea type="text" name="mau_don" class="form-control"value="" placeholder=""cols="60" rows="3"></textarea>

	</div>
	<div class="input-group">
		<label for="name">Yêu cầu</label>
		<textarea type="text" name="yeu_cau" class="form-control"value="" placeholder=""cols="60" rows="6"></textarea>

	</div>
	<div class="input-group">
		<label for="name">Căn cứ pháp lý của thủ tục hành chính</label>
		<textarea type="text" name="can_cu" class="form-control"value="" placeholder=""cols="60" rows="8"></textarea>

	</div>
	<div>
		<input type="submit" class="btn btn-default" value="Save"/>
	</div>

</form>
</div>
</div>