<?php

session_start();

  include("connection.php");


  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted
    $regno=$_POST['regno'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    
    

    if(!empty($username) && !empty($password) && !empty($regno))
    {

      //save to database
      $query = "insert into userstudent (regno,password,username) values ('$regno','$password','$username')";

      mysqli_query($con, $query);

      header("Location: studentlogin.php");
      die;
    }else
    {
      echo "Please enter some valid information!";
    }
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moodle</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body >
    <section class="container-fluid bg">
      <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-3">
          <form class="formbox" method="post">
            <h3>Register User</h3>
            <div class="mb-3">
              <label for="regno" class="form-label">Register Number</label>
              <input type="Number" name="regno" class="form-control" id="regno" aria-describedby="emailHelp">
            </div>
            <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp">
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
            <a id="loginbutton" style="color: black;" href="studentlogin.php">Login</a>
          </form>
        </section>
      </section>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>