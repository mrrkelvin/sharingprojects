<h2><?= $title ?></h2>
<form method="post" accept-charset="utf-8" action="<?php echo site_url("projects/discussion"); ?>">
<div class="form-group" style="display: inline-block;">
		<label><h3>Add Comment</h3>
	    Comment Category
	    <select id="category" name="category" class="form-control"  onchange="this.form.submit()">
	    	<option selected disabled>Please select the category</option>
	    	<option value="general">general</option>
	        <option value="purchase">purchase</option>
	        <option value="improvement">improvement</option>
	    </select>
	    </label>
	</div>
<?php if($comments) : ?>
		<?php foreach($comments as $comment) : ?>
			<div class="well">
			<img  height="100" width="100" src="<?php echo site_url(); ?>assets/images/projects/<?php echo $comment['project_image']; ?>">
				<h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]<?php echo ' : '.$comment['created_at']?><?php echo $comment['title']; ?></h5>
				<a class="btn btn-default" href="<?php echo site_url('/projects/' .$comment['slug']); ?>">Read More</a>	
				<a class="btn btn-default" href="<?php echo site_url('/comments/discussionview/' .$comment['slug']); ?>">See discussion</a>
		
				<?php echo form_open('comments/createfordiscussion/'.$comment['project_id']); ?>
				<div class="form-group" style="display:none;">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="<?php echo $this->session->userdata('name'); ?>">
				</div>
				<div class="form-group" style="display:none;">
					<label>Parent Comment</label>
					<input type="text" name="comment_ref" class="form-control" value="<?php echo $comment['comment_id']; ?>">
				</div>
				<style>
					h6{

						color: red;
						margin-left: 10px;
					}
				</style>
			</form>
			</div>
		<?php endforeach; ?>
<?php else : ?>
		<p>No comments To Display</p>
<?php endif ; ?>
</form>

