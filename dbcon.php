<?php 
	$con = mysqli_connect("localhost","root","","chem");
	if(!$con){
		echo "Database Connection Failed".mysqli_error();
	} 
//DB Connection
 ?>