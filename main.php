<?php 
	error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
<!-- Always force latest IE rendering engine or request Chrome Frame -->
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Use title if it's in the page YAML frontmatter --><title>Student Enrollment CST-499</title>
<link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css">
<link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css">
<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body style="font-family:Impact">
<div class="jumbotron" style="background-color:">
<div class="container text-center">
<h1><b>CST499 University</b></h1>
<h3>Student Enrollment System</h3>
</div>
</div>
<li class="active"><a href="homepage.php"><span> Home</span></a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<?php
session_start();
if( isset($_SESSION['firstName']))
{
echo '<section class="top-bar-section"><!-- Right Nav Section --></section><ul class="right">';
echo '<li><a href="profile.php"><span>Profile &nbsp</span></a></li>';
echo '<li><a href="viewClassSchedule.php"><span>View Class Schedule &nbsp&nbsp</span></a></li>';
echo '<li><a href="searchClasses.php"><span>Register for Classes &nbsp</span></a></li>';
echo '<li><a href="logout.php"><span>Logout &nbsp</span></a></li>';
}
else
{
echo '<section class="top-bar-section"><!-- Right Nav Section --></section><ul class="right">';
echo '<li><a href="login.php"><span> Login &nbsp&nbsp</span></a></li>';
echo '<li><a href="registration.php"><span> Registration &nbsp&nbsp</span></a></li>';
}
?>
</ul>
</div>
</div>
</nav>
</body>
</html>