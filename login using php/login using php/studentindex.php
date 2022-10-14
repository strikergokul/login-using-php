<?php



session_start();

include("connection.php");
include("studentFunctions.php");

//   if(isset($_POST['deletesubmit'])){
// 	  $sql="delete from task where id=$id";
// 	  $query=mysqli_query($con,$sql);
// 	  if($query)
//   }

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>student login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style>
		table,
		th,
		td {
			border: 1px solid black;
		}
	</style>
		<script>
		function avoidResubmission(){
			window.location.reload();
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

	<br>

	<h1>Hello welcome <?php echo $user_data['username']; ?></h1>

	<h1>TO-DO LIST FOR STUDENTS</h1>
	<form style="border: 2px solid black; width:50vw; margin-left:20rem; padding:10px;" method="post">
		<div class="mb-3">
			<label for="task">enter your task:</label>
			<input type="text" name="task">
		</div>
		<div class="mb-3">
			<label for="taskdescription">enter your task description:</label>
			<input type="text" name="taskdescription">
		</div>
		<div class="mb-3">
			<label for="date">enter the date to complete:</label>
			<input type="date" name="date">
		</div>
		<button class="btn btn-primary" name="submit" type="submit">Create Task</button>

		<?php
		if (isset($_POST['submit'])) {
			$task = $_POST['task'];
			$taskdescription = $_POST['taskdescription'];
			$date = date('Y-m-d', strtotime($_POST['date']));
			$regno = $_SESSION['regno'];
			$sql = "insert into `task` (task,taskdescription,date,regno) values('$task','$taskdescription','$date',$regno)";
			$query = mysqli_query($con, $sql);
		}
		?>

	</form>
	<br>
	<div class="container">
		<?php

		$table = "table";
		$regno = $_SESSION['regno'];
		$start = strtotime(date("Y-m-d"));
		// echo $start;
		echo "<table class=$table>";
		echo "<tr>
	<th>Task Name</th>
	<th>Task Description</th>
	<th>Remaining Days</th>
	<th>Status</th>
	<th>Operations</th>
	</tr>";
		$sql = "select * from `task` where regno=$regno";
		$query = mysqli_query($con, $sql);
		// $btn= `echo "<button class="btn btn-primary" onclick=deletefunc()>COMPLETED</button>"`;
		while ($row = mysqli_fetch_array($query)) {
			$id = $row['id'];
			$end = strtotime($row['date']);
			$days_between = ceil(intval($end - $start) / 86400);
			if ($days_between > 0) {
				$status = "NOT COMPLETED";
			} else {
				$status = "OVERDUE";
			}
			echo "<tr><td>" . $row['task'] . "</td><td>" . $row['taskdescription'] . "</td><td>" . $days_between . "</td><td>" . $status . "</td><td>" . `echo "<form method="post"><button class="btn btn-primary" name="deletesubmit" type="deletesubmit" onClick="avoidResubmission()">COMPLETED</button></form>"` . "</td></tr>";
		}
		if (isset($_POST['deletesubmit'])) {
			$sql="delete from task where id=$id";
			$query=mysqli_query($con,$sql);
		}
		?>

	</div>

	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>