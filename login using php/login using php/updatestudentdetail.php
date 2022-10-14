<?php

include ('connection.php');

$id=$_GET['updateid'];
$sql="select * from `userstudent` where regno=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$username=$row['username'];
$password=$row['password'];


if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="update `userstudent` set regno=$id,username='$username',password='$password' where regno=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:staffindex.php');
    }
    else{
        die("update failed");
    }
}
else{
    echo "error";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
<form style="width: 600px; height: 600px" method="post">
            <h3>Update Student User Details</h3>
            <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" value="<?php echo $username ?>">
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password" value="<?php echo $password ?>">
            </div>
            <div class="d-grid gap-2">
              <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
            </div>
</form>
</body>
</html>