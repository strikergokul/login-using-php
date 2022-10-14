<?php

session_start();

if(isset($_SESSION['staffid']))
{
	unset($_SESSION['staffid']);
	session_unset();
	session_destroy();

}

header("Location: stafflogin.php");
die;