<?php 

session_start();

  include("connection.php");
  include("staffFunctions.php");


  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted
    $staffid = $_POST['staffid'];
    $password = $_POST['password'];

    if(!empty($staffid) && !empty($password) )
    {

      //read from database
      $query = "select * from userstaff where staffid = '$staffid' limit 1";
      $result = mysqli_query($con, $query);

      if($result)
      {
        if($result && mysqli_num_rows($result) > 0)
        {

          $user_data = mysqli_fetch_assoc($result);
          
          if($user_data['password'] === $password)
          {

            $_SESSION['staffid'] = $user_data['staffid'];
            header("Location: staffindex.php");
            die;
          }
        }
      }
      
      echo "wrong username or password!";
    }else
    {
      echo "wrong username or password!";
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
<body>
    <section class="container-fluid bg">
      <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-3">
          <form class="formbox" method="post">
            <h3>Staff Login Page</h3>
            <div class="mb-3">
              <label for="staffid" class="form-label">Register Number</label>
              <input type="Number" name="staffid" class="form-control" id="staffid" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
            <div style="display: inline;">
              <h6>New user register here:-</h6>
              <a id="signupbutton" style="color: black;" href="staffsignup.php">Signup</a>
            </div>
          </form>
        </section>
      </section>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>