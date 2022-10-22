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
	$email = $_SESSION['email'];
	$firstName = $_SESSION['firstName'];
	$lastName = $_SESSION['lastName'];
	$address = $_SESSION['address'];
	$phone = $_SESSION['phone'];
	$program = $_SESSION['program'];
	echo "<center><h1>Welcome to Your Profile Page</center></h1>";
	echo "<div class='row'>";
    echo "<div class='col-md-6 text-left'>";
	echo "<h3>&emsp;&emsp; <b>Email:</b>  $email	&emsp;&emsp;&nbsp;	<b>Address:</b> $address</h3>";
	echo "<h3>&emsp;&emsp; <b>First Name:</b> $firstName	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <b>Phone:</b> $phone</h3>";
	echo "<h3>&emsp;&emsp; <b>Last Name:</b> $lastName &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <b>Program:</b> $program</h3>";
	echo "</div>";
	echo "</div>";
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