<?php 
	$users = $this->user_model->check_user_exists();
	if($users == false){
		redirect('users/firstadmin');
	}
	
?>
<!-- <h2><?= $title ?></h2> -->
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
  text-align:center;
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
<div class="page-header">
<table style="width: 100%">
<col width ="10">
<col width ="1000">
	<tr>
		<td><span class="glyphicon glyphicon-fire" style="
    background: #F43D2A;
    display: block;
    float: left;
    padding: 8px 10px 0;
    height: 32px;
    color: #FFF;
    font-size: 14pt;">News</span></td>
		<td><a href="projects"><marquee title="Checkout the latest Projects"><b>Checkout the latest projects</b></marquee></a></td>
	</tr>
</table>
</div>
<div id="showcase" class="jumbotron">
  <h1>Welcome</h1>
	<p>This project will be primary focused on local computer science students. The students from computer science show their talent in projects every year. But, there is limited platform for them to share their project to public. Their projects are not well-known to others. So, this project is planned to allow them to share their projects others.</p>
  <p><a class="btn btn-primary btn-lg" href="about" role="button">Learn more</a></p>
</div>