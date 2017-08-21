<?php
	$host = 'localhost';
	$user = 'root';
	$pswd = '';
	$conn = mysqli_connect($host,$user,$pswd) or die ('Error connecting to MYSQL');
	echo "Connected to MYSQL <br>";

	$dbname = "spp";
	mysqli_select_db($conn,$dbname) or die ('Error connecting to MYSQL'.$dbname);
	echo "Connected to Database <br>";
?>