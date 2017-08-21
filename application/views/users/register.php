<?php echo form_open('users/register','data-toggle="validator"'); ?>
  <div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1 class="text-center"><?= $title; ?></h1>
		    <style>
    p{

      color: red;
      margin-left: 10px;
    }
    </style>
			<div class="form-group has-feedback">
				<label>Name</label>
				<input type="text" pattern="[a-zA-Z][a-zA-Z ]{5,}" maxlength="50" class="form-control" name="name" placeholder="Name" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    			<div class="help-block with-errors"></div>
			</div>
			<div class="form-group has-feedback">
				<label>Email</label>
				<input type="email" class="form-control" name="email" maxlength="50" placeholder="Email" data-error="The email address is invalid. (Eg:example@.gmail.com)" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    			<div class="help-block with-errors"></div>
    			<span><p><?php echo form_error("email"); ?></p></span>
			</div>
			<span><label>Password</label><h5 style="color:green;">(Hint: UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)</h5></span>
			<div class="form-group has-feedback">
				<input type="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" maxlength="50" class="form-control" name="password" placeholder="Password" id="inputPassword" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    			<div class="help-block with-errors"></div>
			</div>
			<div class="form-group has-feedback">
				<label>Confirm Password</label>
				<input type="password" class="form-control" name="password2" placeholder="Confirm Password" data-match="#inputPassword" data-match-error="Whoops, these don't match" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    			<div class="help-block with-errors"></div>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>
	</div>
<?php echo form_close(); ?>