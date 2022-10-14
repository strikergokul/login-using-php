<?php

session_start();

if(isset($_SESSION['regno']))
{
	unset($_SESSION['regno']);
	session_unset();
	session_destroy();

}

header("Location: studentlogin.php");
die;