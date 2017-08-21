<?php if(!($this->session->userdata('user_role') == 'admin') && !($this->session->userdata('user_role') == 'supervisor') && !($this->session->userdata('user_role') == 'student')){
				$this->session->set_flashdata('Not_auth','Your are now loggout');
				redirect('users/logout');
			}
			?>
<h2><?php echo $project['title']; ?></h2>
<small class="project-date">Upload on: <?php echo $project['created_at']; ?> in <strong><?php echo $project['category_name']; ?> category </strong></small><br>
<img src="<?php echo site_url(); ?>assets/images/projects/<?php echo $project['project_image']; ?>">
<div class="project-body">
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
<div class="form-group">
	<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $project['video_link']; ?>" frameborder="0" allowfullscreen></iframe>
</div>
<?php if($this->session->userdata('user_id') == $project['user_id']): ?>
	<hr>
	<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>projects/edit/<?php echo $project['slug']; ?>">Edit</a>
	<?php echo form_open('projects/delete/' .$project['project_id']); ?>
		<input type="submit" value="delete" class="btn btn-danger">
	</form>
<?php endif; ?>
<hr>
<!-- <h3>Comments</h3>
<?php if($comments) : ?>
		<?php foreach($comments as $comment) : ?>
			<div class="well">
				<h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]<?php echo ' : '.$comment['created_at']?></h5>
			</div>
		<?php endforeach; ?>
<?php else : ?>
		<p>No comments To Display</p>
<?php endif ; ?>
<hr>
<h3>Add Comment</h3>
<?php echo form_open('comments/createforrejected/'.$project['project_id']); ?>
	<div class="form-group" style="display:none;">
		<label>Name</label>
		<input type="text" name="name" class="form-control" value="<?php echo $this->session->userdata('name'); ?>">
	</div> -->
	<style>
		h6{

			color: red;
			margin-left: 10px;
		}
	</style>
	<div class="form-group">
		<label>Comment Here:</label>
		<textarea name="body" class="form-control"></textarea>
		<span><h6><?php echo form_error("body"); ?></h6></span>
	</div>
	</div>
	<input type="hidden" name="slug" value="<?php echo $project['slug']; ?>">
	<button class="btn btn-primary" type="submit">Submit</button>
</form>