<div class="row left" >
	<?php 
	echo form_open(''.base_url().'admin');?>
	<?php echo form_label('Tên: ','name');
	 echo form_input('name','','id="name"');?>
<br>

	 	<?php echo form_label('Password: ','pass');
	 echo form_password('pass','','id="pass"');?>
	

<br>
	 	<?php 
	 echo form_submit('submit','Login');?>

	<?php 
	echo form_close('');?>
<?php echo validation_errors(); ?>	
</div>