<div class="col-xs-9 col-md-10 pad2">
<div class="row" >
	<?php 
	echo form_open(''.base_url().'admin');?>
<table class="table">
	<tr> 	
		<td>Tên</td>
		<td><?php 
		$data1 = array(
              'name'=>"name",'type'=>"text" ,
              'cols' => "40",'rows' => '1','placeholder'=>"Nhập tên");
		$data2 = array(
              'name'=>"pass",'type'=>"password" ,
              'size'  => '38','placeholder'=>"Nhập mật khẩu");
		echo form_textarea($data1);?></td>
		<td><?php echo form_error('name'); ?></td>
	</tr>	
	<tr> 	
		<td>Mật khẩu</td>
		<td><?php echo
		form_password($data2);?></td>
		<td><?php echo form_error('pass'); ?></td>
	</tr>
	<tr> 	
		<td></td>
		<td><?php echo
		form_submit('submit','Đăng nhập','class="btn btn-primary"');?></td>
	</tr>
</table>
<?php 
	echo form_close('');?>
<?php  	
if (isset($error)){
    echo "<div class='alert alert-danger' role='alert'>$error</div>";
}?>
</div>
</div>

