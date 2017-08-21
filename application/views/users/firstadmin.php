<?php echo form_open('users/firstadmin'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<h1 class="text-center"><?= $title; ?></h1>
		<style>
		p{

			color: red;
			margin-left: 10px;
		}
		</style>
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name" placeholder="Name">
				<span><p><?php echo form_error("name"); ?></p></span>
			</div>
			<div class="form-group">
				<label>ID Number</label>
				<input type="text" class="form-control" name="id_number" placeholder="ID Number">
				<span><p><?php echo form_error("id_number"); ?></p></span>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email">
				<span><p><?php echo form_error("email"); ?></p></span>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password">
				<span><p><?php echo form_error("password"); ?></p></span>
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
				<span><p><?php echo form_error("password2"); ?></p></span>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>
	</div>
<?php echo form_close(); ?>