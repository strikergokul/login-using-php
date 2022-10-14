<?php

include ('connection.php');

extract($_POST);

if(isset($_POST['regnosend']) && isset($_POST['usernamesend']) && isset($_POST['passwordsend'])){
    $sql="insert into `userstudent` (regno,password,username) values ('$regnosend','$passwordsend','$usernamesend')";
    $result=mysqli_query($con,$sql);
}







?>