<h2><?php echo $project['title']; ?></h2>
<small class="project-date">Upload on: <?php echo $project['created_at']; ?> in <strong><?php echo $project['category_name']; ?> category </strong></small><br>
<div class="form-group" align="center">
	<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $project['video_link']; ?>" frameborder="0" allowfullscreen></iframe>
</div>
<h5><b>Description:</b></h5>
<div class="well project-body">
	<?php echo $project['body']; ?>
</div>
<!-- <hr>
<div class="form-group">
	<video width="320" height="240" controls>
	  <source src="<?php echo site_url(); ?>assets/images/projects/<?php echo $project['video_link']; ?>" type="video/mp4">
	Your browser does not support the video tag.
	</video>
</div> -->
<hr>
<!-- <?php if($this->session->userdata('user_id') == $project['user_id']): ?>
	<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>projects/edit/<?php echo $project['slug']; ?>">Edit</a>
	<?php echo form_open('projects/delete/' .$project['project_id']); ?>
		<input type="submit" value="delete" class="btn btn-danger">
	</form>
<?php endif; ?> -->
<!-- <a href="<?php echo base_url().'projects/download/'.$project['$slug']; ?>" class="dwn">Download</a> -->
<?php if (!($this->session->userdata('logged_in'))): ?>
<form action="<?php echo base_url().'users/login'?>">
<button class="btn btn-primary">Sign in to review</button>
</form>
<?php endif; ?>
<?php if($this->session->userdata('user_role') == 'public'): ?>
<?php echo form_open('comments/create/'.$project['project_id'],'data-toggle="validator"'); ?>
	<button class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
	  Submit your review
	</button>
	<div class="collapse" id="collapseExample">
	  <div class="well">
<!-- 	    <div class="form-group" style="display: inline-block;">
		<label><h3>Please give your comments:</h3>
		    Comment Category
		    <select id="category" name="category" class="form-control">
		    	<option selected disabled>Please select the category</option>
		    	<option value="general">General</option>
		        <option value="purchase">Purchase</option>
		        <option value="improvement">Improvement</option>
		    </select>
		    </label>
		</div> -->
	<?php if ($project['category_name'] == 'Video'):?>
	<div>
<!-- 	<hr> -->
	<h4>Please rate the project: (1-Very Poor, 2-Poor, 3-Neutral, 4-Good, 5-Very Good)</h4>
		<table class="table table-striped">
			<tr>
				<th></th>
				<th>1</th>
				<th>2</th>
				<th>3</th>
				<th>4</th>
				<th>5</th>
			</tr>
			<tr>
				<td>Design</td>
				<td><input type="checkbox" id="design_rating" name="design_rating" value="1" class="sev_check1"></td>
				<td><input type="checkbox" id="design_rating" name="design_rating" value="2" class="sev_check1"></td>
				<td><input type="checkbox" id="design_rating" name="design_rating" value="3" class="sev_check1"></td>
				<td><input type="checkbox" id="design_rating" name="design_rating" value="4" class="sev_check1"></td>
				<td><input type="checkbox" id="design_rating" name="design_rating" value="5" class="sev_check1"></td>
			</tr>
			<tr>
				<td>Video Quality</td>
				<td><input type="checkbox" id="video_rating" name="video_rating" value="1" class="sev_check2"></td>
				<td><input type="checkbox" id="video_rating" name="video_rating" value="2" class="sev_check2"></td>
				<td><input type="checkbox" id="video_rating" name="video_rating" value="3" class="sev_check2"></td>
				<td><input type="checkbox" id="video_rating" name="video_rating" value="4" class="sev_check2"></td>
				<td><input type="checkbox" id="video_rating" name="video_rating" value="5" class="sev_check2"></td>
			</tr>
			<tr>
				<td>Audio Quality</td>
				<td><input type="checkbox" id="audio_rating" name="audio_rating" value="1" class="sev_check3"></td>
				<td><input type="checkbox" id="audio_rating" name="audio_rating" value="2" class="sev_check3"></td>
				<td><input type="checkbox" id="audio_rating" name="audio_rating" value="3" class="sev_check3"></td>
				<td><input type="checkbox" id="audio_rating" name="audio_rating" value="4" class="sev_check3"></td>
				<td><input type="checkbox" id="audio_rating" name="audio_rating" value="5" class="sev_check3"></td>
			</tr>
			<tr>
				<td>Storyline</td>
				<td><input type="checkbox" id="storyline_rating" name="storyline_rating" value="1" class="sev_check4"></td>
				<td><input type="checkbox" id="storyline_rating" name="storyline_rating" value="2" class="sev_check4"></td>
				<td><input type="checkbox" id="storyline_rating" name="storyline_rating" value="3" class="sev_check4"></td>
				<td><input type="checkbox" id="storyline_rating" name="storyline_rating" value="4" class="sev_check4"></td>
				<td><input type="checkbox" id="storyline_rating" name="storyline_rating" value="5" class="sev_check4"></td>	
			</tr>
				<td>Creativity</td>
				<td><input type="checkbox" id="creativity_rating" name="creativity_rating" value="1" class="sev_check5"></td>
				<td><input type="checkbox" id="creativity_rating" name="creativity_rating" value="2" class="sev_check5"></td>
				<td><input type="checkbox" id="creativity_rating" name="creativity_rating" value="3" class="sev_check5"></td>
				<td><input type="checkbox" id="creativity_rating" name="creativity_rating" value="4" class="sev_check5"></td>
				<td><input type="checkbox" id="creativity_rating" name="creativity_rating" value="5" class="sev_check5"></td>
			<tr>
			</tr>
		</table>
	</div>
	<?php endif; ?>
	<?php if ($project['category_name'] == 'Web'):?>
	<div>
		<table class="table table-striped">
			<tr>
				<th></th>
				<th>1</th>
				<th>2</th>
				<th>3</th>
				<th>4</th>
				<th>5</th>
			</tr>
			<tr>
				<td>Design</td>
				<td><input type="checkbox" id="design_rating" name="design_rating" value="1" class="sev_check1"></td>
				<td><input type="checkbox" id="design_rating" name="design_rating" value="2" class="sev_check1"></td>
				<td><input type="checkbox" id="design_rating" name="design_rating" value="3" class="sev_check1"></td>
				<td><input type="checkbox" id="design_rating" name="design_rating" value="4" class="sev_check1"></td>
				<td><input type="checkbox" id="design_rating" name="design_rating" value="5" class="sev_check1"></td>
			</tr>
			<tr>
				<td>Responsiness</td>
				<td><input type="checkbox" id="responsiness_rating" name="responsiness_rating" value="1" class="sev_check2"></td>
				<td><input type="checkbox" id="responsiness_rating" name="responsiness_rating" value="2" class="sev_check2"></td>
				<td><input type="checkbox" id="responsiness_rating" name="responsiness_rating" value="3" class="sev_check2"></td>
				<td><input type="checkbox" id="responsiness_rating" name="responsiness_rating" value="4" class="sev_check2"></td>
				<td><input type="checkbox" id="responsiness_rating" name="responsiness_rating" value="5" class="sev_check2"></td>
			</tr>
			<tr>
				<td>Functionality</td>
				<td><input type="checkbox" id="functionality_rating" name="functionality_rating" value="1" class="sev_check3"></td>
				<td><input type="checkbox" id="functionality_rating" name="functionality_rating" value="2" class="sev_check3"></td>
				<td><input type="checkbox" id="functionality_rating" name="functionality_rating" value="3" class="sev_check3"></td>
				<td><input type="checkbox" id="functionality_rating" name="functionality_rating" value="4" class="sev_check3"></td>
				<td><input type="checkbox" id="functionality_rating" name="functionality_rating" value="5" class="sev_check3"></td>
			</tr>
			<tr>
				<td>Interactivity</td>
				<td><input type="checkbox" id="interactivity_rating" name="interactivity_rating" value="1" class="sev_check4"></td>
				<td><input type="checkbox" id="interactivity_rating" name="interactivity_rating" value="2" class="sev_check4"></td>
				<td><input type="checkbox" id="interactivity_rating" name="interactivity_rating" value="3" class="sev_check4"></td>
				<td><input type="checkbox" id="interactivity_rating" name="interactivity_rating" value="4" class="sev_check4"></td>
				<td><input type="checkbox" id="interactivity_rating" name="interactivity_rating" value="5" class="sev_check4"></td>	
			</tr>
				<td>Creativity</td>
				<td><input type="checkbox" id="creativity_rating" name="creativity_rating" value="1" class="sev_check5"></td>
				<td><input type="checkbox" id="creativity_rating" name="creativity_rating" value="2" class="sev_check5"></td>
				<td><input type="checkbox" id="creativity_rating" name="creativity_rating" value="3" class="sev_check5"></td>
				<td><input type="checkbox" id="creativity_rating" name="creativity_rating" value="4" class="sev_check5"></td>
				<td><input type="checkbox" id="creativity_rating" name="creativity_rating" value="5" class="sev_check5"></td>
			<tr>
			</tr>
		</table>
	</div>
	<?php endif; ?>
		<?php if ($project['category_name'] == 'Game'):?>
	<div>
		<table class="table table-striped">
			<tr>
				<th></th>
				<th>1</th>
				<th>2</th>
				<th>3</th>
				<th>4</th>
				<th>5</th>
			</tr>
			<tr>
				<td>Design</td>
				<td><input type="checkbox" id="design_rating" name="design_rating" value="1" class="sev_check1"></td>
				<td><input type="checkbox" id="design_rating" name="design_rating" value="2" class="sev_check1"></td>
				<td><input type="checkbox" id="design_rating" name="design_rating" value="3" class="sev_check1"></td>
				<td><input type="checkbox" id="design_rating" name="design_rating" value="4" class="sev_check1"></td>
				<td><input type="checkbox" id="design_rating" name="design_rating" value="5" class="sev_check1"></td>
			</tr>
			<tr>
				<td>Responsiness</td>
				<td><input type="checkbox" id="responsiness_rating" name="responsiness_rating" value="1" class="sev_check2"></td>
				<td><input type="checkbox" id="responsiness_rating" name="responsiness_rating" value="2" class="sev_check2"></td>
				<td><input type="checkbox" id="responsiness_rating" name="responsiness_rating" value="3" class="sev_check2"></td>
				<td><input type="checkbox" id="responsiness_rating" name="responsiness_rating" value="4" class="sev_check2"></td>
				<td><input type="checkbox" id="responsiness_rating" name="responsiness_rating" value="5" class="sev_check2"></td>
			</tr>
			<tr>
				<td>Functionality</td>
				<td><input type="checkbox" id="functionality_rating" name="functionality_rating" value="1" class="sev_check3"></td>
				<td><input type="checkbox" id="functionality_rating" name="functionality_rating" value="2" class="sev_check3"></td>
				<td><input type="checkbox" id="functionality_rating" name="functionality_rating" value="3" class="sev_check3"></td>
				<td><input type="checkbox" id="functionality_rating" name="functionality_rating" value="4" class="sev_check3"></td>
				<td><input type="checkbox" id="functionality_rating" name="functionality_rating" value="5" class="sev_check3"></td>
			</tr>
			<tr>
				<td>Interactivity</td>
				<td><input type="checkbox" id="interactivity_rating" name="interactivity_rating" value="1" class="sev_check4"></td>
				<td><input type="checkbox" id="interactivity_rating" name="interactivity_rating" value="2" class="sev_check4"></td>
				<td><input type="checkbox" id="interactivity_rating" name="interactivity_rating" value="3" class="sev_check4"></td>
				<td><input type="checkbox" id="interactivity_rating" name="interactivity_rating" value="4" class="sev_check4"></td>
				<td><input type="checkbox" id="interactivity_rating" name="interactivity_rating" value="5" class="sev_check4"></td>	
			</tr>
				<td>Creativity</td>
				<td><input type="checkbox" id="creativity_rating" name="creativity_rating" value="1" class="sev_check5"></td>
				<td><input type="checkbox" id="creativity_rating" name="creativity_rating" value="2" class="sev_check5"></td>
				<td><input type="checkbox" id="creativity_rating" name="creativity_rating" value="3" class="sev_check5"></td>
				<td><input type="checkbox" id="creativity_rating" name="creativity_rating" value="4" class="sev_check5"></td>
				<td><input type="checkbox" id="creativity_rating" name="creativity_rating" value="5" class="sev_check5"></td>
			<tr>
			</tr>
		</table>
	</div>
<?php endif;?>
	<div class="form-group" style="display:none;">
		<label>Name</label>
		<input type="text" name="name" class="form-control" value="<?php echo $this->session->userdata('name'); ?>">
	</div>
		<div class="form-group" style="display:none;">
		<label>Name</label>
		<input type="text" name="category_name" class="form-control" value="<?php echo $project['category_name']; ?>">
	</div>
	<style>
		h6{

			color: red;
			margin-left: 10px;
		}
	</style>
	<h4>Description:</h4><h5>[Max length--100 Characters]</h5>
	<div class="form-group has-feedback">
		<textarea name="body" maxlength="100" class="form-control" placeholder="Add a comment" style="resize: none;" required></textarea>
		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    	<div class="help-block with-errors"></div>

	</div>
	<div>
		<table>
		<tr>
		<th><h4>Do you interested to have/purchase this product?</h4></th>
		</tr>
		<tr>
			<td><p>Yes&nbsp;<input type="checkbox" id="yes" name="interested" value="yes" class="sev_check6"></p></td>
		</tr>
		<tr>
			<td><p>No &nbsp;<input type="checkbox" id="no" name="interested" value="no" class="sev_check6"></p></td>
		</tr>
		</table>
	</div>
	<button class="btn btn-primary" type="submit" style="float: right;">Submit</button>
	<input type="hidden" name="slug" value="<?php echo $project['slug']; ?>">
	<br>
	  </div>
	</div>
</form>
<?php endif; ?>
<!-- <hr>
<h3>Comments</h3>
<br>
<strong><?php echo $commentsCounts; ?> comments</strong>
<hr>
<?php if($comments) : ?>
		<?php foreach($comments as $comment) : ?>
			<div class="well">
				<h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]<?php echo ' : '.$comment['created_at']?></h5>
			</div>
		<?php endforeach; ?>
<?php else : ?>
		<p>No comments To Display</p>
<?php endif ; ?>
<hr> -->
	<script>
	  $('.sev_check1').click(function() {
	      $('.sev_check1').not(this).prop('checked', false);
	    });
	  $('.sev_check2').click(function() {
	      $('.sev_check2').not(this).prop('checked', false);
	    });
	  $('.sev_check3').click(function() {
	      $('.sev_check3').not(this).prop('checked', false);
	    });
	  $('.sev_check4').click(function() {
	      $('.sev_check4').not(this).prop('checked', false);
	    });
	  $('.sev_check5').click(function() {
	      $('.sev_check5').not(this).prop('checked', false);
	    });
	  $('.sev_check6').click(function() {
	      $('.sev_check6').not(this).prop('checked', false);
	    });
	</script>