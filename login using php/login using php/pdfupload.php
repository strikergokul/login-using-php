
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPLOAD NOTES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .pdfForm{
            width: 700px;
            border: 2px solid black;
            padding: 50px;
            margin-top: 40px;
            margin-left: 40px;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Moodle Staff</a>
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
          <a class="nav-link" href="pdfcheck.php">PDFCONTENT</a>
          </li>
        </ul>
        <form class="d-flex">
          <button class="btn btn-primary btn-outline-success"><a class="text-light" href="stafflogout.php">Logout</a></button>
        </form>
      </div>
    </div>
  </nav>

  <!-- form for uploading the pdf -->
<form class="pdfForm" action="upload-to-s3.php" enctype="multipart/form-data" method="post">
<div class="mb-3">
              <label for="subjecttitle" class="form-label">Subject-Title</label>
              <select style="margin-left: 44px;width: 300px;" name="subjectTitle" id="subjectTitle">
                <option value="AI">ARTIFICIAL INTELLIGENCE</option>
                <option value="OS">OPERATING SYSTEM</option>
                <option value="DBMS">DATABASE MANAGEMENT SYSTEMS</option>
              </select>
            </div>
            <div class="mb-3" >
                <label for="filename" class="text-uppercase">filename</label>
                <input type="text" placeholder="filename" name="filename" style="margin-left: 50px;" required>
            </div>
            <div class="mb-3">
    <input type="file" name="uploadfile">
    <button  name="submit" value="upload" class="btn btn-primary">upload</button>
    </div>
    </form>

    <H2>UPLOADED NOTES</H2>
    
    <?php
    include ("connection.php");
    $sql="select * from files";
    $query=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($query)){
        echo "<ul>";
        echo "<li><a href=".$row['fileurl'].">".$row['filename']."</a></li>";
        echo "</ul>";
    }



    ?>
</body>
</html>