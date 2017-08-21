<?php echo form_open('users/changepassword','data-toggle="validator"'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<h1 class="text-center"><?= $title; ?></h1>
		<style>
		p{

			color: red;
			margin-left: 10px;
		}
		</style>
			<div class="form-group" style="display:none;">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $this->session->userdata('email'); ?>" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    			<div class="help-block with-errors"></div>
			</div>
			<div class="form-group has-feedback">
				<label>New Password</label>
				<input type="password" minlength="3" maxlength="50" class="form-control" name="password" placeholder="New Password" id="inputPassword" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    			<div class="help-block with-errors"></div>
			</div>
			<div class="form-group has-feedback">
				<label>Confirm Password</label>
				<input type="password" maxlength="50" class="form-control" name="password2" placeholder="Confirm Password" data-match="#inputPassword" data-match-error="Whoops, these don't match" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    			<div class="help-block with-errors"></div>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>
	</div>
<?php echo form_close(); ?>