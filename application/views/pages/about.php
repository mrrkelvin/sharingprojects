<?php 
	$users = $this->user_model->check_user_exists();
	if($users == false){
		redirect('users/firstadmin');
	}
	
?>
<style>
*{
  margin:0;
  padding:0;
}

#showcase{
  background-image:url('./assets/img/pexels-photo-316466.jpeg');
  background-size:cover;
  background-position:center;
  height:100vh;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
  /*text-align:center;*/
  padding:0 20px;
}

#showcase h1{
  font-size:50px;
  line-height:1.2;
}

#showcase p{
  font-size:20px;
}

#showcase .button{
  font-size:18px;
  text-decoration:none;
  color:#926239;
  border:#926239 1px solid;
  padding:10px 20px;
  border-radius:10px;
  margin-top:20px;
}

#showcase .button:hover{
  background:#926239;
  color:#fff;
}

</style>
<div id="showcase" class="jumbotron">
<!-- <h1><?= $title ?></h1> -->
<h2><b>Sharing Projects Platform version 1.0</b></h2>
<p>Sharing Project Platform is developed by Tan Chun Yin from FTMK, UTeM for his Final Year Project.</p>
</div>
<br>
<hr>
<div>
<h2>Objectives</h2>
	<p style="font-size: 20px;">This project embarks on the following objectives:
	<ol style="font-size: 18px;">
	<li>To create a platform for students to share their projects to public.</li>
	<li>To allow permission mechanism between students and supervisor before publishing the projects.</li>
	<li>To enable public to view and comment on students’ projects.</li>
	</p>
</div>
<br>
<hr>
<div>
	<h2>Meet the Team</h2>
	<table>
		<tr>
			<td width="150"><img src="assets/img/kelvin.gif"  width="100" height="100" class="img-circle" alt="..."></td>
			<td>
				<div class="caption">
		        	<h3>Kelvin CY</h3>
		        	<p style="font-size: 18px;">Kelvin is Software Development major in Computer Science from Universiti Teknikal Malaysia Melaka (UTeM). He worked as a software developer for Sharing Projects Platform.</p>
		      	</div>
		     </td>
		</tr>
	</table>
	
      
</div>
<br>
<hr>
<div>
	<h2>The lecturers</h2>
	<p style="font-size: 18px;">The following are the link to view lectueres' profile from FTMK UTeM.</p>
	<a href="http://ftmk.utem.edu.my/web/people/academic/">Please click here.</a>
</div>
<br>

