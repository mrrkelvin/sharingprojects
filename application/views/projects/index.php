<h2><?= $title ?></h2>
<form method="post" accept-charset="utf-8" action="<?php echo site_url("projects/index"); ?>">
<table>
	<tr>
		<td>
			<div class="form-group">
		    <label>Category</label>
		    <select id="category_id" name="category_id" class="form-control" onchange="this.form.submit()">
		    	<option selected disabled>Please select the category</option>
		      <?php foreach ($categories as $category): ?>
		        <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
		      <?php endforeach; ?>
		    </select>
		  </div>
		 </td>
	 </tr>
</table>

</form>
	<?php foreach($categoriesFiltered as $cat) :?>
	<h5>Filtered by:<?php echo $cat['category_name']?></h5>
	<?php endforeach; ?>

<?php foreach($projects as $project) :?> 
	<div class="thumbnail">

	
	<h3><b><?php echo $project['title']; ?></b></h3>
	<hr>
	<div class="row">
		<div class="col-md-3">
			<img class="project-thumb thumbnail" height="150" width="100" src="<?php echo site_url(); ?>assets/images/projects/<?php echo $project['project_image']; ?>">
		</div>
		<div class="col-md-9">
			<small class="project-date">Upload on: <?php echo $project['created_at']; ?> in <strong><?php echo $project['title']; ?></strong></small><br>
			
			<div class="well">
			<?php echo word_limiter($project['body'], 50); ?>
			</div>
			<br><br>
			<p class="btn pull-right"><a class="btn btn-default" href="<?php echo site_url('/projects/' .$project['slug']); ?>">Read More</a>
			</p>
		</div>
	</div>
	</div>
<?php endforeach; ?>
<div class="pagination-links">
	<?php echo $this->pagination->create_links(); ?>
</div>
