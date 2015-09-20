<div class="col-xs-9 col-md-10 pad2">
<div class="row" >
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
</div>

<!--
<div class="col-xs-9 col-md-10">
	<div class="row" >
<form class="form-horizontal">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-4">
			<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-4">
			<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-4">
			<div class="checkbox">
				<label>
					<input type="checkbox"> Remember me
				</label>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-4">
			<button type="submit" class="btn btn-default">Sign in</button>
		</div>
	</div>
</form>
</div>
</div>
-->