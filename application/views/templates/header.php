<html>
	<head>
		<title>Sharing Projects Platform</title>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
<!-- 		<script src="http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script> -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo base_url(); ?>">Sharing Projects Platform</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar"  class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li><a href="<?php echo base_url(); ?>about">About</a></li>
						<?php if (!($this->session->userdata('user_role') == 'admin'||$this->session->userdata('user_role') == 'supervisor'||$this->session->userdata('user_role') == 'student')):?>
							<li><a href="<?php echo base_url(); ?>projects ">Projects</a></li>
						<?php endif; ?>
						<?php if(($this->session->userdata('logged_in'))&&!($this->session->userdata('user_role') == 'public')): ?>
						<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Projects Status<span class="caret"></span></a>
				          <ul class="dropdown-menu">
				            <li><a href="<?php echo base_url(); ?>projects/all ">All Projects</a></li>
				            <!-- <li role="separator" class="divider"></li>
				            <li><a href="<?php echo base_url(); ?>categories ">Search by categories</a></li> -->
				            <!-- <?php if($this->session->userdata('user_role') == 'admin'||$this->session->userdata('user_role') == 'supervisor'||$this->session->userdata('user_role') == 'student'): ?> -->
				            	<li role="separator" class="divider"></li>
						<li><a href="<?php echo base_url(); ?>projects/pending ">Pending Projects</a></li>
						<li><a href="<?php echo base_url(); ?>projects/approved ">Approved Projects</a></li>
						<li><a href="<?php echo base_url(); ?>projects/rejected ">Rejected Projects</a></li>
						<!-- <?php endif; ?> -->
				          </ul>
				        </li>
				        <?php endif; ?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php if($this->session->userdata('user_role') == 'admin'): ?>
							<li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin Roles<span class="caret"></span></a>
					          <ul class="dropdown-menu">
					          <li><a href="<?php echo base_url(); ?>users/registerrole">Register Roles</a></li>
							<li><a href="<?php echo base_url(); ?>categories/create">Create Category</a></li>
							<li><a href="<?php echo base_url(); ?>users/changesv">Change Supervisor</a></li>
							<li><a href="<?php echo base_url(); ?>users/viewsv">View Supervisors & Students</a></li>
					          </ul>
							
						<?php endif; ?>
						<?php if(!$this->session->userdata('logged_in')): ?>
							<li><a href="<?php echo base_url(); ?>users/register">Register</a></li>
							<li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
						<?php endif; ?>
						<?php if($this->session->userdata('user_role') == 'student'): ?>
							<li><a href="<?php echo base_url(); ?>projects/upload">Upload Projects</a></li>
							<!-- <li><a href="<?php echo base_url(); ?>projects/discussion">Discussions</a></li> -->
						<?php endif; ?>
						<?php if($this->session->userdata('logged_in')): ?>
							<li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('name'); ?><span class="caret"></span></a>
					          <ul class="dropdown-menu">
					            <li><a href="<?php echo base_url(); ?>users/changepassword">Change Password</a></li>
					            <li role="separator" class="divider"></li>
								<li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
					          </ul>
					        </li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container" style="min-height: 400;">
			<!-- Flash messages -->
			<?php if($this->session->flashdata('user_registered')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('project_created')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('project_created').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('project_updated')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('project_updated').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('category_created')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('project_deleted')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('project_deleted').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('login_failed')): ?>
				<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('user_loggedin')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('user_loggedout')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('category_deleted')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('user_added')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_added').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('Not_auth')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('Not_auth').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('firstadmin')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('firstadmin').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('changepassword')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('changepassword').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('pls_changepassword')): ?>
				<?php echo '<p class="alert alert-warning">'.$this->session->flashdata('pls_changepassword').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('svchanged')): ?>
				<?php echo '<p class="alert alert-warning">'.$this->session->flashdata('svchanged').'</p>'; ?>
			<?php endif; ?>

			<?php if($this->session->flashdata('svsame')): ?>
				<?php echo '<p class="alert alert-warning">'.$this->session->flashdata('svsame').'</p>'; ?>
			<?php endif; ?>