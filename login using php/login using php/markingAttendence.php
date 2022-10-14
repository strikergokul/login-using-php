<?php 

include ('connection.php');
if(isset($_POST['submit'])){
    $subname=$_POST['subjectname'];
    $date=date('Y-m-d' , strtotime($_POST['date']));


    $sql="select regno from `userstudent`";
                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($result)){
                    $res=$row[0];
                    
                    $att=$_POST[$row[0]];
                    
                    $sqlquery="insert into `attendence` (subname,date,regno,attendence) values ('$subname','$date','$res','$att')";
                    $sqlrun=mysqli_query($con,$sqlquery);
    }
    
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
      table, th, td {
  border: 1px solid black;
    } 
      .tablemarks > table{
        border: 2px solid black;
        width: 500px;
        margin-left: 20rem;
        border-collapse: collapse;

      }
    </style>
</head>
<body>
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

    <form style="padding:20px; width: 600px; height: auto; margin-left:20rem; border:2px solid black;" id="attendenceform" method="post">
        <h3>Enter student Attendence</h3>
        <div class="mb-3">
          <label for="subjectname" class="form-label">Subjectname</label>
          <select style="margin-left: 44px;width: 300px;" name="subjectname" id="subjectname">
            <option value="AI">Artificial Intelligence</option>
            <option value="OS">Operating System</option>
            <option value="DBMS">DBMS</option>
          </select>
        </div>
        <div class="mb-3">
              <label for="date" class="form-label">Enter-date</label>
              <input type="date" style="width: 320px; display:inline; margin-left:30px; border:1px solid black" name="date" class="form-control" id="date" >
            </div>
            <?php  
                $sql="select regno from `userstudent`";
                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($result)){
                    echo '<div class="mb-3">
                    <label for="regno" class="form-label">Register Number</label>
                    <select style="width: 200px;"  id="registernumbsers">';
                    echo "<option value=".$row[0].">".$row[0]."</option><br>";
                    echo "</select>";
                    echo '
                    <input type="radio" id="present" name="'.$row[0].'" value="P" checked="checked">
                    <label for="present">Present</label>
                    <input type="radio" id="absent" name="'.$row[0].'" value="A">
                    <label for="absent">Absent</label>';
                    echo "</div>";    
                }
            ?>
            <div class="d-grid gap-2">
              <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
            </div>
    </form>
    <h1 style="margin-top:30px;">ARTIFICIAL INTELLIGENCE</h1>
            <div  class="table tablemarks">
              <?php
              error_reporting(E_ERROR | E_PARSE);
            $table="table";
            echo "<table class=$table>";
            $sql="select regno from `userstudent`";
            echo "<tr><th>REGISTER NO</th>
            <th>ATTENDENCE percentage</th></tr>";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result)){
              $sqlquery1="select * from `attendence` where subname='AI' AND regno=".$row[0].";";
              $ress1=mysqli_query($con,$sqlquery1);
              $final1=mysqli_num_rows($ress1);
              
              $sqlquery2="select * from `attendence` where subname='AI' AND regno=".$row[0]." AND attendence='P';";
              $ress2=mysqli_query($con,$sqlquery2);
              $final2=mysqli_num_rows($ress2);
              
              $attendence=$final2/$final1*100;
              echo "<tr><td>".$row['regno']."</td><td>".intval($attendence)."</td></tr>";
            }
            echo "</table>";

            ?>
            </div>


            <h1 style="margin-top:30px;">OPERATING SYSTEM</h1>
            <div  class="table tablemarks">
            <?php
            $table="table";
            echo "<table class=$table>";
            $sql="select regno from `userstudent`";
            echo "<tr><th>REGISTER NO</th>
            <th>ATTENDENCE percentage</th></tr>";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result)){
              $sqlquery1="select * from `attendence` where subname='OS' AND regno=".$row[0].";";
              $ress1=mysqli_query($con,$sqlquery1);
              $final1=mysqli_num_rows($ress1);
              
              $sqlquery2="select * from `attendence` where subname='OS' AND regno=".$row[0]." AND attendence='P';";
              $ress2=mysqli_query($con,$sqlquery2);
              $final2=mysqli_num_rows($ress2);
              error_reporting(0);
              $attendence=$final2/$final1*100;
              echo "<tr><td>".$row['regno']."</td><td>".intval($attendence)."</td></tr>";
            }
            echo "</table>";

            ?>
            </div>


            <h1 style="margin-top:30px;">DBMS</h1>
            <div  class="table tablemarks">
            <?php
            $table="table";
            echo "<table class=$table>";
            $sql="select regno from `userstudent`";
            echo "<tr><th>REGISTER NO</th>
            <th>ATTENDENCE percentage</th></tr>";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result)){
              $sqlquery1="select * from `attendence` where subname='DBMS' AND regno=".$row[0].";";
              $ress1=mysqli_query($con,$sqlquery1);
              $final1=mysqli_num_rows($ress1);
              
              $sqlquery2="select * from `attendence` where subname='DBMS' AND regno=".$row[0]." AND attendence='P';";
              $ress2=mysqli_query($con,$sqlquery2);
              $final2=mysqli_num_rows($ress2);
              error_reporting(0);
              
              $attendence=$final2/$final1*100;
              echo "<tr><td>".$row['regno']."</td><td>".intval($attendence)."</td></tr>";
            }
            echo "</table>";

            ?>
            </div>
            
</body>
</html>