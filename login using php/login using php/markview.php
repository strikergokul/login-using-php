<?php
session_start();
include('connection.php');
$id = $_SESSION['regno'];
include("studentFunctions.php");


$user_data = check_login($con);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    table,
    th,
    td {
      border: 1px solid black;
    }

    .tablemarks>table {
      /* border: 2px solid black; */


      width: 500px;
      margin-left: 20rem;
      /* border-collapse: collapse; */

    }
  </style>
  <script>
    function printDivai() {
      var divContents = document.getElementById("ciaTableai").innerHTML;
      var a = window.open('', '', 'height=500, width=500');
      a.document.write('<html>');
      a.document.write('<body > <h1>Div contents are <br>');
      a.document.write(divContents);
      a.document.write('</body></html>');
      a.document.close();
      a.print();
    }

    function printDivos() {
      var divContents = document.getElementById("ciaTableos").innerHTML;
      var a = window.open('', '', 'height=500, width=500');
      a.document.write('<html>');
      a.document.write('<body > <h1>Div contents are <br>');
      a.document.write(divContents);
      a.document.write('</body></html>');
      a.document.close();
      a.print();
    }

    function printDivdbms() {
      var divContents = document.getElementById("ciaTabledbms").innerHTML;
      var a = window.open('', '', 'height=500, width=500');
      a.document.write('<html>');
      a.document.write('<body > <h1>Div contents are <br>');
      a.document.write(divContents);
      a.document.write('</body></html>');
      a.document.close();
      a.print();
    }
  </script>
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
            <a class="nav-link" href="viewingattendence.php">Attendence</a>
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
  <!-- AI mark table -->

  <div id="ciaTableai" class="table tablemarks">
    <h1 class="d-inline" style="margin-top:30px;">ARTIFICIAL INTELLIGENCE MARKS </h1>
    <input class="d-inline btn btn-primary" style="margin-left: 900px;" type="button" value="PRINT" onclick="printDivai()">
    <?php
    $table = "table";
    echo "<table class=$table>";
    $sql1 = "select * from `marks` where subject='AI' AND examtitle='CIA1' AND registerno=$id limit 1";
    $sql2 = "select * from `marks` where subject='AI' AND examtitle='CIA2' AND registerno=$id limit 1";
    $sql3 = "select * from `marks` where subject='AI' AND examtitle='CIA3' AND registerno=$id limit 1";
    $sql4 = "select * from `marks` where subject='AI' AND examtitle='SA' AND registerno=$id limit 1";
    echo "<tr><th>REGISTER NO</th><th>CIA1</th><th>CIA2</th><th>CIA3</th><th>SKILL ASSESMENT</th></tr>";
    $result1 = mysqli_query($con, $sql1);
    $result2 = mysqli_query($con, $sql2);
    $result3 = mysqli_query($con, $sql3);
    $result4 = mysqli_query($con, $sql4);
    $row1 = mysqli_fetch_array($result1);
    $row2 = mysqli_fetch_array($result2);
    $row3 = mysqli_fetch_array($result3);
    $row4 = mysqli_fetch_array($result4);

    echo "<tr><td>" . $row1['registerno'] . "</td><td>" . $row1['mark'] . "</td><td>" . $row2['mark'] . "</td><td>" . $row3['mark'] . "</td><td>" . $row4['mark'] . "</td></tr>";

    // while($row=mysqli_fetch_array($result)){
    //   echo "<tr><td>".$row['registerno']."</td><td>".$row['mark']."</td></tr>";
    // }
    echo "</table>";

    ?>
  </div>

  <!-- OS TABLE -->
  <div id="ciaTableos" class="table tablemarks">
    <h1  style="margin-top:30px;">OS </h1>
    <input class="d-inline btn btn-primary" style="margin-left: 900px;" type="button" value="PRINT" onclick="printDivos()">
    <?php
    $table = "table";
    echo "<table class=$table>";
    $sql1 = "select * from `marks` where subject='OS' AND  examtitle='CIA1' AND registerno=$id limit 1";
    $sql2 = "select * from `marks` where subject='OS' AND examtitle='CIA2' AND registerno=$id limit 1";
    $sql3 = "select * from `marks` where subject='OS' AND examtitle='CIA3' AND registerno=$id limit 1";
    $sql4 = "select * from `marks` where subject='OS' AND examtitle='SA' AND registerno=$id limit 1";
    echo "<tr><th>REGISTER NO</th><th>CIA1</th><th>CIA2</th><th>CIA3</th><th>SKILL ASSESMENT</th></tr>";
    $result1 = mysqli_query($con, $sql1);
    $result2 = mysqli_query($con, $sql2);
    $result3 = mysqli_query($con, $sql3);
    $result4 = mysqli_query($con, $sql4);
    $row1 = mysqli_fetch_array($result1);
    $row2 = mysqli_fetch_array($result2);
    $row3 = mysqli_fetch_array($result3);
    $row4 = mysqli_fetch_array($result4);

    echo "<tr><td>" . $row1['registerno'] . "</td><td>" . $row1['mark'] . "</td><td>" . $row2['mark'] . "</td><td>" . $row3['mark'] . "</td><td>" . $row4['mark'] . "</td></tr>";

    // while($row=mysqli_fetch_array($result)){
    //   echo "<tr><td>".$row['registerno']."</td><td>".$row['mark']."</td></tr>";
    // }
    echo "</table>";

    ?>
  </div>




  <!-- DBMS TABLE -->

  <div id="ciaTabledbms" class="table tablemarks">
    <h1  style="margin-top:30px;">DBMS MARKS </h1>
    <input class="d-inline btn btn-primary" style="margin-left: 900px;" type="button" value="PRINT" onclick="printDivdbms()">
    <?php
    $table = "table";
    echo "<table class=$table>";
    $sql1 = "select * from `marks` where subject='DBMS' AND examtitle='CIA1' AND registerno=$id limit 1";
    $sql2 = "select * from `marks` where subject='DBMS' AND examtitle='CIA2' AND registerno=$id limit 1";
    $sql3 = "select * from `marks` where subject='DBMS' AND examtitle='CIA3' AND registerno=$id limit 1";
    $sql4 = "select * from `marks` where subject='DBMS' AND examtitle='SA' AND registerno=$id limit 1";
    echo "<tr><th>REGISTER NO</th><th>CIA1</th><th>CIA2</th><th>CIA3</th><th>SKILL ASSESMENT</th></tr>";
    $result1 = mysqli_query($con, $sql1);
    $result2 = mysqli_query($con, $sql2);
    $result3 = mysqli_query($con, $sql3);
    $result4 = mysqli_query($con, $sql4);
    $row1 = mysqli_fetch_array($result1);
    $row2 = mysqli_fetch_array($result2);
    $row3 = mysqli_fetch_array($result3);
    $row4 = mysqli_fetch_array($result4);

    echo "<tr><td>" . $row1['registerno'] . "</td><td>" . $row1['mark'] . "</td><td>" . $row2['mark'] . "</td><td>" . $row3['mark'] . "</td><td>" . $row4['mark'] . "</td></tr>";

    // while($row=mysqli_fetch_array($result)){
    //   echo "<tr><td>".$row['registerno']."</td><td>".$row['mark']."</td></tr>";
    // }
    echo "</table>";

    ?>
  </div>
</body>

</html>