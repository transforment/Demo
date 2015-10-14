  <form name ="userinput" action="<?php echo base_url();?>index.php/Trang_chi_tiet/index" method="post">
	<div class="">
		<label for="stt"style="font-size:15px;">Bạn muốn làm </label>
		<select name= "stt"id="testselectset"class="bg-primary"style="font-size:15px;">
			<?php foreach ($com as $stt =>$id) {
					echo '<option class="testselectset" value="'.html_escape($stt).'">'.html_escape($id).'</option>';


			}
			?>
		</select>

	</div>
	<br>
	<div>
		</div>

       <br/>
      <input type="submit" class="btn btn-success"value="Xem">
    
  </form>

