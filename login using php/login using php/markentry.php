<?php

include('connection.php');





if (isset($_POST['submit'])) {
  $registerno = $_POST['registernumber'];
  $subjectTitle = $_POST['subjectTitle'];
  $examtitle = $_POST['examtitle'];
  $mark = $_POST['mark'];
  $sql = "insert into `marks` (registerno,examtitle,mark,subject) values ('$registerno','$examtitle','$mark','$subjectTitle')";
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo "sucess";
  } else {
    echo "error";
  }
}
?>

<!-- navbar and body of page -->

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
      border: 2px solid black;
      width: 500px;
      margin-left: 20rem;

    }
  </style>
  <script>
    function printDivai() {
      var divContents = document.getElementById("marksai").innerHTML;
      var a = window.open('', '', 'height=1000, width=1000');
      a.document.write('<html>');
      a.document.write('<body > <h1>Div contents are <br>');
      a.document.write(divContents);
      a.document.write('</body></html>');
      a.document.close();
      a.print();
    }

    function printDivos() {
      var divContents = document.getElementById("os").innerHTML;
      var a = window.open('', '', 'height=1000, width=1000');
      a.document.write('<html>');
      a.document.write('<body > <h1>Div contents are <br>');
      a.document.write(divContents);
      a.document.write('</body></html>');
      a.document.close();
      a.print();
    }

    function printDivdbms() {
      var divContents = document.getElementById("dbms").innerHTML;
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
  <!-- form for mark entering -->

  <form class="my-5" style="padding:20px; width: 600px; height: 320px; margin-left:20rem; border:2px solid black;" id="markentry" method="post">
    <h3>Enter student Marks</h3>
    <div class="mb-3">
      <label for="regno" class="form-label">Register Number</label>
      <select style="width: 300px;" name="registernumber" id="registernumbsers">
        <?php
        $sql = "select regno from `userstudent`";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
          echo "<option value=" . $row[0] . ">" . $row[0] . "</option>";
        }
        ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="subjecttitle" class="form-label">Subject-Title</label>
      <select style="margin-left: 30px;width: 300px;" name="subjectTitle" id="subjectTitle">
        <option value="AI">ARTIFICIAL INTELLIGENCE</option>
        <option value="OS">OPERATING SYSTEM</option>
        <option value="DBMS">DATABASE MANAGEMENT SYSTEMS</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="exam-title" class="form-label">Exam-Title</label>
      <select style="margin-left: 44px;width: 300px;" name="examtitle" id="examtitle">
        <option value="CIA1">CIA-1</option>
        <option value="CIA2">CIA-2</option>
        <option value="CIA3">CIA-3</option>
        <option value="SA">SKILL ASSESMENT</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="entermark" class="form-label">Enter-Mark</label>
      <input type="number" style="width: 320px; display:inline; margin-left:30px; border:1px solid black" name="mark" class="form-control" id="entermark">
    </div>
    <div class="d-grid gap-2">
      <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
    </div>


  </form>

  <!-- TABLE FOR ARTIFICIAL INTELLIGENCE MARKS -->

  <div id="marksai" class="table tablemarks">

    <h1 class="d-inline" style="margin-top:30px;">ARTIFICIAL INTELIGENCE</h1>
    <input class="d-inline btn btn-primary" style="margin-left: 900px;" type="button" value="PRINT" onclick="printDivai()">
    <?php
    $table = "table";
    echo "<table class=$table>";
    echo "<tr><th>REGISTER NO</th>
              <th>CIA1</th><th>CIA2</th><th>CIA3</th><th>SA</th></tr>";

    $sqlregno = "select regno from `userstudent`";
    $resultregno = mysqli_query($con, $sqlregno);

    while ($rowregno = mysqli_fetch_array($resultregno)) {
      $cia1mark = 0;
      $cia2mark = 0;
      $cia3mark = 0;
      $samark = 0;
      $regno = $rowregno[0];
      $sqlcia1marks = "select mark from `marks` where subject='AI' AND registerno=" . $regno . " AND examtitle='CIA1' LIMIT 1";
      $resultcia1marks = mysqli_query($con, $sqlcia1marks);


      $sqlcia2marks = "select mark from `marks` where subject='AI' AND registerno=" . $regno . " AND examtitle='CIA2' LIMIT 1";
      $resultcia2marks = mysqli_query($con, $sqlcia2marks);


      $sqlcia3marks = "select mark from `marks` where subject='AI' AND registerno=" . $regno . " AND examtitle='CIA3' LIMIT 1";
      $resultcia3marks = mysqli_query($con, $sqlcia3marks);


      $sqlsamarks = "select mark from `marks` where subject='AI' AND registerno=" . $regno . " AND examtitle='SA' LIMIT 1";
      $resultsamarks = mysqli_query($con, $sqlsamarks);

      while ($rowcia1 = mysqli_fetch_assoc($resultcia1marks)) {
        $cia1mark = $rowcia1['mark'];
      }
      while ($rowcia2 = mysqli_fetch_assoc($resultcia2marks)) {
        $cia2mark = $rowcia2['mark'];
      }
      while ($rowcia3 = mysqli_fetch_assoc($resultcia3marks)) {
        $cia3mark = $rowcia3['mark'];
      }
      while ($rowsa = mysqli_fetch_assoc($resultsamarks)) {
        $samark = $rowsa['mark'];
      }
      echo "<tr><td>" . $regno . "</td><td>" . $cia1mark . "</td><td>" . $cia2mark . "</td><td>" . $cia3mark . "</td><td>" . $samark . "</td></tr>";
    }
    echo "</table>";
    ?>
  </div>
  


  <!-- TABLE FOR OPERATING SYSTEM MARKS -->

  <div id="os" class="table tablemarks">
    <h1 style="margin-top:30px;">OPERATING SYSTEM</h1>
    <input class="d-inline btn btn-primary" style="margin-left: 900px;" type="button" value="PRINT" onclick="printDivos()">

    <?php
    $table = "table";
    echo "<table class=$table>";
    echo "<tr><th>REGISTER NO</th>
              <th>CIA1</th><th>CIA2</th><th>CIA3</th><th>SA</th></tr>";

    $sqlregno = "select regno from `userstudent`";
    $resultregno = mysqli_query($con, $sqlregno);

    while ($rowregno = mysqli_fetch_array($resultregno)) {
      $cia1mark = 0;
      $cia2mark = 0;
      $cia3mark = 0;
      $samark = 0;
      $regno = $rowregno[0];
      $sqlcia1marks = "select mark from `marks` where subject='OS' AND registerno=" . $regno . " AND examtitle='CIA1' LIMIT 1";
      $resultcia1marks = mysqli_query($con, $sqlcia1marks);


      $sqlcia2marks = "select mark from `marks` where subject='OS' AND registerno=" . $regno . " AND examtitle='CIA2'LIMIT 1";
      $resultcia2marks = mysqli_query($con, $sqlcia2marks);


      $sqlcia3marks = "select mark from `marks` where subject='OS' AND registerno=" . $regno . " AND examtitle='CIA3' LIMIT 1";
      $resultcia3marks = mysqli_query($con, $sqlcia3marks);


      $sqlsamarks = "select mark from `marks` where subject='OS' AND registerno=" . $regno . " AND examtitle='SA' LIMIT 1";
      $resultsamarks = mysqli_query($con, $sqlsamarks);

      while ($rowcia1 = mysqli_fetch_assoc($resultcia1marks)) {
        $cia1mark = $rowcia1['mark'];
      }
      while ($rowcia2 = mysqli_fetch_assoc($resultcia2marks)) {
        $cia2mark = $rowcia2['mark'];
      }
      while ($rowcia3 = mysqli_fetch_assoc($resultcia3marks)) {
        $cia3mark = $rowcia3['mark'];
      }
      while ($rowsa = mysqli_fetch_assoc($resultsamarks)) {
        $samark = $rowsa['mark'];
      }
      echo "<tr><td>" . $regno . "</td><td>" . $cia1mark . "</td><td>" . $cia2mark . "</td><td>" . $cia3mark . "</td><td>" . $samark . "</td></tr>";
    }
    echo "</table>";
    ?>
  </div>


  <!-- TABLE FOR DBMS MARKS -->


  <div class="table tablemarks" id="dbms">
    <h1 style="margin-top:30px;">DATABSE MANAGEMENT SYSTEMS</h1>
    <input class="d-inline btn btn-primary" style="margin-left: 900px;" type="button" value="PRINT" onclick="printDivdbms()">
    <?php
    $table = "table";
    echo "<table class=$table>";
    echo "<tr><th>REGISTER NO</th>
              <th>CIA1</th><th>CIA2</th><th>CIA3</th><th>SA</th></tr>";

    $sqlregno = "select regno from `userstudent`";
    $resultregno = mysqli_query($con, $sqlregno);

    while ($rowregno = mysqli_fetch_array($resultregno)) {
      $cia1mark = 0;
      $cia2mark = 0;
      $cia3mark = 0;
      $samark = 0;
      $regno = $rowregno[0];
      $sqlcia1marks = "select mark from `marks` where subject='DBMS' AND registerno=" . $regno . " AND examtitle='CIA1' LIMIT 1";
      $resultcia1marks = mysqli_query($con, $sqlcia1marks);


      $sqlcia2marks = "select mark from `marks` where subject='DBMS' AND registerno=" . $regno . " AND examtitle='CIA2' LIMIT 1";
      $resultcia2marks = mysqli_query($con, $sqlcia2marks);


      $sqlcia3marks = "select mark from `marks` where subject='DBMS' AND registerno=" . $regno . " AND examtitle='CIA3' LIMIT 1";
      $resultcia3marks = mysqli_query($con, $sqlcia3marks);


      $sqlsamarks = "select mark from `marks` where subject='DBMS' AND registerno=" . $regno . " AND examtitle='SA' LIMIT 1";
      $resultsamarks = mysqli_query($con, $sqlsamarks);

      while ($rowcia1 = mysqli_fetch_assoc($resultcia1marks)) {
        $cia1mark = $rowcia1['mark'];
      }
      while ($rowcia2 = mysqli_fetch_assoc($resultcia2marks)) {
        $cia2mark = $rowcia2['mark'];
      }
      while ($rowcia3 = mysqli_fetch_assoc($resultcia3marks)) {
        $cia3mark = $rowcia3['mark'];
      }
      while ($rowsa = mysqli_fetch_assoc($resultsamarks)) {
        $samark = $rowsa['mark'];
      }
      echo "<tr><td>" . $regno . "</td><td>" . $cia1mark . "</td><td>" . $cia2mark . "</td><td>" . $cia3mark . "</td><td>" . $samark . "</td></tr>";
    }
    echo "</table>";
    ?>
  </div>
</body>

</html>