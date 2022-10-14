<?php
session_start();

include("connection.php");
include("staffFunctions.php");


$user_data = check_login($con);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>staff page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formid">
        <div class="modal-body">
        <div class="mb-3">
                <label for="regno" class="form-label">Register Number</label>
                <input type="Number"  class="form-control" id="regno" aria-describedby="emailHelp" autocomplete="off">
        </div>
              <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" autocomplete="off">
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" autocomplete="off">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="adduser()">Submit</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- navbar and body of page -->


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Moodle Student</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="markentry.php">Marks-Entry</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="markingattendence.php">Attendence</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="pdfupload.php">PDFCONTENT</a>
          </li>
        </ul>
        <form class="d-flex">
          <button class="btn btn-primary btn-outline-success"><a class="text-light" href="stafflogout.php">Logout</a></button>
        </form>
      </div>
    </div>
  </nav>

  <br>

  <h1>Hello Welcome Mr.<?php echo $user_data['username']; ?></h1>

  <div class="container">
    <h1 class="text-center">LIST OF STUDENT DATA</h1>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add Student
    </button>

    <div class="my-3" id="studentTable"></div>
  </div>


 
 
 
 
 
 
 
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
  <script>
    



    // code for even after reloading the data should stay
    $(document).ready(function(){
      displaydata();
    })

    // function for the table view
    function displaydata(){
          var displaydata="true";
          $.ajax({
            url:"displaystudent.php",
            type:'post',
            data:{
              displaysend:displaydata,
            },
            success:function(data,status){
              $('#studentTable').html(data);
            }
          })
    }
    function adduser(){
      var regno=$('#regno').val();
      var username=$('#username').val();
      var password=$('#password').val();

      $.ajax({
        url:"insert.php",
        type:'post',
        data:{
          regnosend:regno,
          usernamesend:username,
          passwordsend:password
        },
        success:function(data,status){
          // console.log(status);
          // function to display data
          displaydata();
        }
      })
    }
    function deleteuser(deleteid){
      $.ajax({
        url:"deletestudent.php",
        type:"post",
        data:{
          deletedata:deleteid
        },
        success:function(data,status){
            displaydata();
        }
      })
    } 



    function updateuser(updateid){
      $('#hiddenupdateid').val(updateid);
      $.post("update.php",{updateidsend:updateid},function(data,status){
        var userid=JSON.parse(data);
        $('#regnoupdate').val(userid.regno);
        $('#usernameupdate').val(userid.username);
        $('#passwordupdate').val(userid.password);
      })
     
    }
    


  </script>
</body>

</html>