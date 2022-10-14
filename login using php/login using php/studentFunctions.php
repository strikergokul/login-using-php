<?php

function check_login($con){

	if(isset($_SESSION['regno'])){
		$id=$_SESSION['regno'];
		$query="select * from userstudent where regno = '$id' limit 1";
		$result=mysqli_query($con,$query);
		if($result && mysqli_num_rows($result)>0){

			$user_data=mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	// redirecting to login page

	header("Location : studentlogin.php");
	die; 

}
