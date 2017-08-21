<?php echo form_open('users/changesv','data-toggle="validator"'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<h1 class="text-center"><?= $title; ?></h1>
		<style>
		p{

			color: red;
			margin-left: 10px;
		}
		</style>
<!-- 			<div class="form-group">
				<label>Student</label>
				<input type="text" class="form-control" name="student_id" placeholder="Student">
				<span><p><?php echo form_error("student_id"); ?></p></span>
			</div>
			<div class="form-group">
				<label>SV</label>
				<input type="text" class="form-control" name="sv_id" placeholder="Sv">
				<span><p><?php echo form_error("sv_id"); ?></p></span>
			</div> -->
			<div class="form-group has-feedback">
				<label>Student</label>
				<select name="student_id" class="form-control">
				<option selected disabled>Please select the students</option>
			      <?php foreach ($students as $student): ?>
			        <option value="<?php echo $student['user_id']; ?>"><?php echo "ID : ".$student['user_id']." -- Name: ".$student['name']." -- Email: ".$student['email']; ?></option>
			      <?php endforeach; ?>
			    </select>
			    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    	<div class="help-block with-errors"></div>
			</div>
			<div class="form-group has-feedback">
				<label>Supervisor</label>
				<select name="sv_id" class="form-control">
				<option selected disabled>Please select the supervisors</option>
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