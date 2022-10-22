<?php
    error_reporting(E_ALL ^ E_NOTICE);
	require_once('dbconn.php');
?>

<!DOCTYPE html>
<html lang="en"><head><title>Student Enrollment System</title>
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
</div>
<div id="wrapper">
<div style="text-align: center;"></div>
<div class="hero">
<div style="text-align: center;"></div>
<div class="row">
<div style="text-align: center;"></div>
<div class="large-12 columns">
<div style="text-align: center;">
</div>
</div>
<div class="container text-center">
<?php
session_start();
if(isset($_SESSION['firstName'])) {
	$firstName = $_SESSION['firstName'];
	$lastName = $_SESSION['lastName'];
	echo "<center><h1>Welcome</center></h1>";
	echo "<center><h2>You are successfully logged in</center></h2>";
	echo "<h3>$firstName $lastName</h23>";
}
else {
	header("Location: index.php");
}
?>
</div>
</div>
</div>
<div style="text-align: center;"><br>
</div>
<footer> </footer>
<?php require 'footer.php';?>
</div></ul></div></body></html>