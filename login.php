<?php
    error_reporting(E_ALL ^ E_NOTICE);
	require_once('dbconn.php');
?>
<!DOCTYPE html>
<html lang="en"><head><title>Login Student Enrollment</title>
<link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css">
<link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css">
<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"></head>
<body class="index">
<div id="fb-root"></div>
<div class="contain-to-grid"> <nav class="top-bar" data-topbar=""> </nav><br>
<a href="#">
</a>
<ul>
<?php require 'main.php';?>
<form class="padding-top" method="post" action="">
<div id="wrapper">
<div style="text-align: center;"></div>
<div class="hero">
<div style="text-align: center;"></div>
<div class="row">
<div style="text-align: center;"></div>
<div class="large-12 columns">
<div style="text-align: center;"></div>
<h2 style="text-align: center;">Login</h1>
<div style="text-align: center;"></div>
<div class="form-row">
<div class="form-group col-md-12" id="no-padding-left">
<label for="inputEmail">Email</label>
<input type="email" class="form-control" id="inputEmail" autocomplete="off" name="email" required>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-12" id="no-padding-left">
<label for="inputPassword">Password</label>
<input type="password" class="form-control" id="inputPassword" autocomplete="off" name="password" required>
</div>
</div>
<button type="submit" class="btn btn-primary" name="login_user">Submit</button>
</div>
</div>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_REQUEST["email"];
	$password = $_REQUEST["password"];
}
if (isset ($email)) {
	$sql = "SELECT * FROM student WHERE email='$email' AND password='$password'"; 
	$res = mysqli_query($newCon->connection, $sql);
	if (mysqli_num_rows($res) == 1) {
		session_start();
		while($row = mysqli_fetch_assoc($res)) {
			$_SESSION['studentId'] = $row['student_id'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['firstName'] = $row['firstName'];
			$_SESSION['lastName'] = $row['lastName'];
			$_SESSION['address'] = $row['address'];
			$_SESSION['phone'] = $row['phone'];
			$_SESSION['program'] = $row['program'];
			$_SESSION['selectedSemester'] = $row['semester'];
			$_SESSION['selectedYear'] = $row['year'];
		}
		
	header('location: homepage.php'); 
}
else { echo "<center><h2>The email or password is incorrect</center></h2>"; }
}
?>
<div style="text-align: center;"><br>
</div>
<footer> </footer>
<?php require 'footer.php';?>
</div></ul></div></body></html>