<?php if(!($this->session->userdata('user_role') == 'admin') && !($this->session->userdata('user_role') == 'supervisor') && !($this->session->userdata('user_role') == 'student')){
				$this->session->set_flashdata('Not_auth','Your are now loggout');
				redirect('users/logout');
			}
			?>
			<div class="well">
			<img  height="100" width="100" src="<?php echo site_url(); ?>assets/images/projects/<?php echo $project['project_image']; ?>">
				<h5> <?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]<?php echo ' : '.$comment['created_at']?><?php echo $project['title']; ?></h5>
				<!-- <a class="btn btn-default" href="<?php echo site_url('/projects/view/' .$project['slug']); ?>">Read More</a>
				<a class="btn btn-default">Set Up discussion</a>
				<a class="btn btn-default" href="<?php echo site_url('/comments/discussionview/' .$project['slug']); ?>">See discussion</a> -->
		
				<?php echo form_open('comments/createfordiscussion/'.$project['project_id']); ?>
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
				<div class="form-group">
					<label>Discuss Here:</label>
					<textarea name="body" class="form-control"></textarea>
					<span><h6><?php echo form_error("body"); ?></h6></span>
				</div>
				<input type="hidden" name="slug" value="<?php echo $comment['slug']; ?>">
				<button class="btn btn-primary" type="submit">Submit</button>
			</form>
			</div>

			<?php if($discussions) : ?>
					<?php foreach($discussions as $discussion) : ?>
						<div class="well">
							<h5><?php echo $discussion['body']; ?> [by <strong><?php echo $discussion['name']; ?></strong>]<?php echo ' : '.$discussion['created_at']?></h5>
						</div>
					<?php endforeach; ?>
			<?php else : ?>
					<p>No discussions To Display</p>
			<?php endif ; ?>