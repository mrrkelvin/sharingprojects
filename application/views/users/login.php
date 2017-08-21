<?php echo form_open('users/login','data-toggle="validator"'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<style>
				p{

					color: red;
					margin-left: 10px;
				}
			</style>
			<div class="form-group has-feedback">
				<input type="email" maxlength="50" name="email" class="form-control" placeholder="Enter Email" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    			<div class="help-block with-errors"></div>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    			<div class="help-block with-errors"></div>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
		</div>
	</div>
<?php echo form_close(); ?>