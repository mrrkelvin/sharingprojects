<h2><?= $title; ?></h2>
<ul class="list-group">
<?php foreach($categories as $category) : ?>
	<li class="list-group-item"><a href="<?php echo site_url('/categories/projects/'.$category['category_id']); ?>"><?php echo $category['category_name']; ?></a>
		<?php if($this->session->userdata('user_role') == 'admin'): ?>
			<form class="cat-delete" action="categories/delete/<?php echo $category['category_id']; ?>" method="POST">
				<input type="submit" class="btn-link text-danger" value="[X]">
			</form>
		<?php endif; ?>
	</li>
	<p><?php echo $category['description']; ?></p><hr>
<?php endforeach; ?>
</ul>