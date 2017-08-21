<?php if(!($this->session->userdata('user_role') == 'admin')){
				$this->session->set_flashdata('Not_auth','Your are now loggout');
				redirect('users/logout');
			}
			?>
<h2><?= $title ;?></h2>

<?php echo form_open_multipart('categories/create','data-toggle="validator"'); ?>
	<div class="form-group has-feedback">
	<label>Name</label>
		<input type="text" pattern="[a-zA-Z][a-zA-Z ]{2,}" minlength="3" maxlength="10" class="form-control" id="category_name" name="category_name" placeholder="Enter name" required>
		<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    	<div class="help-block with-errors"></div>
    	<span><p><?php echo form_error("category_name"); ?></p></span>
	</div>
<!-- 	<script>
		$('#category_name').focusout(function(){
			alert('abc');
			var url="application/controllers/categories/check_category_exists";
			$.ajax({
				url:"<?php echo base_url(); ?>"+url,
				method:"POST",
				data:{
					category_name:$('#category_name').val()
				}
			}).done(function(respond){
				alert(respond);
			});
		});
	</script> -->
	<style>
		p{

			color: red;
			margin-left: 10px;
		}
	</style>
	<!-- <div class="form-group">
		<script>
			function choice() {
			    if (document.getElementById("role").value == 'student'){
			    	document.getElementById("demo").style.display = "block";
			    }else{
			    	document.getElementById("demo").style.display = "none";
			    }
			}
		</script>
		<label>Description</label>
		<textarea type="text" class="form-control" name="description" placeholder="Define the corresponding category"></textarea>
		<span><p><?php echo form_error("description"); ?></p></span>
	</div> -->
	<!-- <style>
	#contact label{
	display: inline-block;
	width: 100px;
	text-align: right;
}
#contact_submit{
	padding-left: 100px;
}
#contact div{
	margin-top: 1em;
}
textarea{
	vertical-align: top;
	height: 5em;
}

input.invalid, textarea.invalid{
	border: 2px solid red;
}

input.valid, textarea.valid{
	border: 2px solid green;
}

.error{

	color: red;
	margin-left: 10px;
}		

.error_show{
	color: red;
	margin-left: 10px;
}
	</style> -->
<!-- 	<form id="contact" method="post" action="">
	<!-- Name -->
	
	<button type="submit" class="btn btn-default">Create</button>
</form>
<hr>

<span><h2>Categories</h2><h5>Click [X] to delete category.</h5></span>
<ul class="list-group">
<?php foreach($categories as $category) : ?>
	<li class="list-group-item"><a href="<?php echo site_url('/categories/projects/'.$category['category_id']); ?>"><?php echo $category['category_name']; ?></a>
		<?php if($this->session->userdata('user_role') == 'admin'): ?>
			<form class="cat-delete" action="delete/<?php echo $category['category_id']; ?>" method="POST">
				<input type="submit" class="btn-link text-danger" value="[X]">
			</form>
		<?php endif; ?>
	</li>
	<!-- <p><?php echo $category['description']; ?></p><hr> -->
<?php endforeach; ?>
</ul>