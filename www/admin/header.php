<?php
require_once "../include/functions.php";

$session_id = $_SESSION["id"];

if($session_id == ""){
	header("Location: ../index.php?error= Invalid username or password");
	exit();
}

$conn = db_conn();
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Kiriti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="../include/fullcalendar/fullcalendar.min.css" />
	<link rel="stylesheet" href="../include/css/style.css">
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
	<script src="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/dt-1.10.15/datatables.min.js"> </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"> </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"> </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="../include/js/functions.js"></script>
	
  </head>
  <body>
		
<div class="wrapper d-flex align-items-stretch">
	<nav id="sidebar">
		<div class="p-4 pt-5">
		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(../images/logo.jpg);"></a>
	<ul class="list-unstyled components mb-5">
		<li class="active">
			<a href="index.php?dashboard">Dashboard</a>
		</li>
		<li>
			<a href="index.php?emp">Employees</a>
		</li>
		<li>
			<a href="index.php?streem">Streem</a>
		</li>
		<li>
			<a href="index.php?class">Class</a>
		</li>
		<li>
			<a href="index.php?subject">Subject</a>
		</li>
		<li>
			<a href="index.php?exam">Exam</a>
		</li>
		<li>
			<a href="index.php?grading">Grading</a>
		</li>
		<li>
			<a href="index.php?subject">Remarks</a>
		</li>
		<li>
		<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Generate Reports</a>
		  <ul class="collapse list-unstyled" id="pageSubmenu">
			<li>
				<a href="index.php?class_report">>Classes</a>
			</li>
			<li>
				<a href="index.php?exam_report">>Exams</a>
			</li>
			<li>
				<a href="index.php?subjects_report">>Subjects</a>
			</li>
			<li>
				<a href="index.php?emp_report">>Employees</a>
			</li>
		  </ul>
		</li>
	</ul>

	<div class="footer">
		<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This sytem is developed <i class="icon-heart" aria-hidden="true"></i> by <a href="" target="_blank">Francis</a>
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	</div>

  </div>
</nav>

<!-- Page Content  -->
<div id="content" class="p-4 p-md-5">
<div class="container">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

	<button type="button" id="sidebarCollapse" class="btn btn-primary">
	  <i class="fa fa-bars"></i>
	  <span class="sr-only">Toggle Menu</span>
	</button>
	<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fa fa-bars"></i>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	  <ul class="nav navbar-nav ml-auto">
		<li class="nav-item active">
			<a class="nav-link" href="#Change_Password"  data-toggle="modal" data-target="#Change_Password">Profile</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="../include/functions.php?logout=1">Logout</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Help</a>
		</li>
	  </ul>
	</div>
  </div>
</nav>

</div>
