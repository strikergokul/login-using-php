<?php 

include ('connection.php');
session_start();
include("studentFunctions.php");
  $user_data=check_login($con);

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
      .table{
        border: 2px solid black;
        width: 80%;
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
		<a class="navbar-brand" href="#">Moodle Staff</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="studentindex.php">Home</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="markview.php">Marks</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="#">Attendence</a>
				</li>
        <li class="nav-item">
				<a class="nav-link" href="pdfdownload.php">STUDY CONTENTS</a>
				</li>
			</ul>
			<form class="d-flex">
				<button class="btn btn-primary btn-outline-success"><a class="text-light" href="studentlogout.php">Logout</a></button>
			</form>
			</div>
		</div>
	</nav>

	<marquee width="100%" direction="left" height="100px" style="color:red;">
	Note: Minimum of 75% of attendence is mandatory for attending sem exams
	</marquee>

          <div class="container-fluid info">
            <ol style="list-style: none;">
              <li><h4>1.Minimum of 75% of attendence is mandatory for attending sem exams</h4></li>
              <li><h4>2.Attendence Will get locked in first 10 Minutes</h4></li>
            </ol>
          </div>
          <br>
          <br>
	
            <div  class="tablemarks">
            <?php
            // $table="table";
            // echo "<table class=$table>";
            
            // echo "<tr><th>REGISTER NO</th>
            // <th>ATTENDENCE percentage</th></tr>";
            
           
              $sqlquery1="select * from `attendence` where subname='AI' AND regno=".$_SESSION['regno']."";
              $ress1=mysqli_query($con,$sqlquery1);
              $final1=mysqli_num_rows($ress1);
              
              $sqlquery2="select * from `attendence` where subname='AI' AND regno=".$_SESSION['regno']." AND attendence='P'";
              $ress2=mysqli_query($con,$sqlquery2);
              $final2=mysqli_num_rows($ress2);
              error_reporting(0);
              $attendenceAI=$final2/$final1*100;
              // echo "<tr><td>".$_SESSION['regno']."</td><td>".intval($attendence)."</td></tr>";
            
            // echo "</table>";

            ?>
            </div>


			
            <div  class=" tablemarks">
            <?php
            // $table="table";
            // echo "<table class=$table>";
           
            // echo "<tr><th>REGISTER NO</th>
            // <th>ATTENDENCE percentage</th></tr>";
            
           
              $sqlquery1="select * from `attendence` where subname='OS' AND regno=".$_SESSION['regno'].";";
              $ress1=mysqli_query($con,$sqlquery1);
              $final1=mysqli_num_rows($ress1);
              
              $sqlquery2="select * from `attendence` where subname='OS' AND regno=".$_SESSION['regno']." AND attendence='P';";
              $ress2=mysqli_query($con,$sqlquery2);
              $final2=mysqli_num_rows($ress2);
              error_reporting(0);
              $attendenceOS=$final2/$final1*100;
              // echo "<tr><td>".$_SESSION['regno']."</td><td>".intval($attendence)."</td></tr>";
            
            // echo "</table>";

            ?>
            </div>


			
            <div  class=" tablemarks">
            <?php
            // $table="table";
            // echo "<table class=$table>";
           
            // echo "<tr><th>REGISTER NO</th>
            // <th>ATTENDENCE percentage</th></tr>";
            
           
              $sqlquery1="select * from `attendence` where subname='DBMS' AND regno=".$_SESSION['regno'].";";
              $ress1=mysqli_query($con,$sqlquery1);
              $final1=mysqli_num_rows($ress1);
              
              $sqlquery2="select * from `attendence` where subname='DBMS' AND regno=".$_SESSION['regno']." AND attendence='P';";
              $ress2=mysqli_query($con,$sqlquery2);
              $final2=mysqli_num_rows($ress2);
              error_reporting(0);
              $attendenceDBMS=$final2/$final1*100;
              // echo "<tr><td>".$_SESSION['regno']."</td><td>".intval($attendence)."</td></tr>";
            
            // echo "</table>";

            ?>
            </div>
<!-- table for attendence for students -->
            <div class="container">
            <?php
            $table="table";
            echo "<table class=$table>";
            echo "<tr><th>REGISTER NO</th><th>AI</th><th>OS</th><th>DBMS</th></tr>";
            echo "<tr><td>".$_SESSION['regno']."</td><td>".intval($attendenceAI)."</td><td>".intval($attendenceOS)."</td><td>".intval($attendenceDBMS)."</td></tr>";
            echo "</table>";
            
            ?>
            </div>

</body>
</html>