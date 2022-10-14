<?php


$dbserver="localhost";
$dbuser="root";
$dbpass="";
$dbname="collegeproject";

if(!$con=mysqli_connect($dbserver,$dbuser,$dbpass,$dbname)){
	die("failed to connect");
}
$dbh= new PDO("mysql:host=localhost;dbname=collegeproject","root","");


?>