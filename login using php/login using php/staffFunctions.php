<?php

function check_login($con){

	if(isset($_SESSION['staffid'])){
		$id=$_SESSION['staffid'];
		$query="select * from userstaff where staffid = '$id' limit 1";
		$result=mysqli_query($con,$query);
		if($result && mysqli_num_rows($result)>0){

			$user_data=mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	// redirecting to login page

	header("Location : stafflogin.php");
	die; 

}
