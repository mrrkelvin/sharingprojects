<?php if(!($this->session->userdata('user_role') == 'admin')){
				$this->session->set_flashdata('Not_auth','Your are now loggout');
				redirect('users/logout');
			}
			?>

<?php echo form_open('users/registerrole','data-toggle="validator"'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<h1 class="text-center"><?= $title; ?></h1>
			<div class="form-group has-feedback">
				<label>Name</label>
				<input type="text" minlength="6" maxlength="50" pattern="[a-zA-Z][a-zA-Z ]{5,}" class="form-control" name="name" placeholder="Name" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    			<div class="help-block with-errors"></div>
			</div>
			<div class="form-group has-feedback">
				<label>Email</label>
				<input type="email" class="form-control" maxlength="50" name="email" placeholder="Email" required>
				<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    			<div class="help-block with-errors"></div>
			</div>
			<div class="form-group has-feedback">
			    <label>Role</label>
			    <select id="role" name="role1" class="form-control" onchange="choice()" required>
			    	<option selected disabled>Please select the role</option>
			        <option value="admin">admin</option>
			        <option value="student">student</option>
			        <option value="supervisor">supervisor</option>
			    </select>
			    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    			<div class="help-block with-errors"></div>
			</div>
			<script>
				function choice() {
				    if (document.getElementById("role").value == 'student'){
				    	document.getElementById("demo").style.display = "block";
				    }else{
				    	document.getElementById("demo").style.display = "none";
				    }
				}
			</script>
			<div class="form-group has-feedback" id="demo" style="display:none;">
				<label>Supervisor</label>
				<select name="sv_id" class="form-control">
				<option selected disabled>Please select the role</option>
			      <?php foreach ($supervisors as $supervisor): ?>

			        <option value="<?php echo $supervisor['user_id']; ?>"><?php echo "ID : ".$supervisor['user_id']." -- Name: ".$supervisor['name']." -- Email: ".$supervisor['email']; ?></option>
			      <?php endforeach; ?>
			    </select>
			    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    			<div class="help-block with-errors"></div>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>
	</div>
<?php echo form_close(); ?>