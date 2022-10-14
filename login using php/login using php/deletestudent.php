<?php

include ('connection.php');

if(isset($_POST['deletedata'])){
    $id=$_POST['deletedata'];
    $sql="delete from `userstudent` where regno=$id";
    $result=mysqli_query($con,$sql);
} 





?>