<?php

include("connect.php");

	if(isset($_POST['category_name']))
	{
	 $category_name =$_POST['category_name'];

	 $checkdata=" SELECT name FROM categories WHERE name='$category_name' ";

	 $query=mysqli_query($conn, $checkdata);

	 if(mysqli_num_rows($query)>0)
	 {
	  echo "Valid";
	 }
	 else
	 {
	  echo "Invalid";
	 }
	 exit();
	}
?>