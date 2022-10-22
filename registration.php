<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once('dbconn.php');
?>
<!DOCTYPE html>
<html lang="en"><head><title>Registration Student Enrollment</title>
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
<h2 style="text-align: center;">Registration Page</h1>
<div class="container">
<div class="form-row">
<div class="form-group col-md-6" id="no-padding-left">
<label for="inputEmail">Email</label>
<input type="email" class="form-control" id="inputEmail" autocomplete="off" name="email" required>
</div>
<div class="form-group col-md-6" id="no-padding-right">
<label for="inputPassword">Password</label>
<input type="password" class="form-control" id="inputPassword" autocomplete="off" name="password" required>
</div>
<div class="form-group col-md-6" id="no-padding-left">
<label for="inputFirstName">First Name</label>
<input type="firstName" class="form-control" id="inputFirstName" autocomplete="off" name="firstName" required>
</div>
<div class="form-group col-md-6" id="no-padding-left">
<label for="inputLastName">Last Name</label>
<input type="lastName" class="form-control" id="inputLastName" autocomplete="off" name="lastName" required>
</div>
<div class="form-group col-md-6" id="no-padding-left">
<label for="inputAddress">Address</label>
<input type="text" class="form-control" id="inputAddress" name="address" required>
</div>
<div class="form-group col-md-6" id="no-padding-left">
<label for="inputCity">City</label>
<input type="text" class="form-control" id="inputCity" name="city" required>
</div>
<div class="form-group col-md-6">
<label for="inputState">State</label>
<input type="lastName" class="form-control" id="inputState" name="state" required>
</div>
<div class="form-group col-md-6" id="no-padding-left">
<label for="inputPhone">Phone</label>
<input type="text" class="form-control" id="inputPhone" name="phone" required>
</div>
<div class="form-group col-md-6" id="no-padding-left">
<label for="inputPhone">Program</label>
<input type="text" class="form-control" id="inputPhone" name="program" required>
</div>
<center><button type="submit" class="btn btn-primary" name="register_user">Register</button></center>
</div>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $email = $_REQUEST["email"];
 $password = $_REQUEST["password"];
 $firstName = $_REQUEST["firstName"];
 $lastName = $_REQUEST["lastName"];
 $address1 = $_REQUEST["address"];
 $city = $_REQUEST["city"];
 $state = $_REQUEST["state"];
 $phone = $_REQUEST["phone"];
 $program = $_REQUEST["program"];
 $address = $address1." ".$city." ".$state." ";
}
if (isset ($email)) {
 $sql = "INSERT INTO `student` (email, password, firstName, lastName, address, phone, program) 
 VALUES ('$email', '$password', '$firstName', '$lastName', '$address', '$phone', '$program')";
 $newCon->executeQuery($newCon->connection, $sql);

 echo "<center><h2>You have successfully registered; please log in.</center></h2>"; 
}
;?>
</div>
</div>
</div>
</div>
<div style="text-align: center;"><br>
</div>
<footer> </footer>
<?php require 'footer.php';?>
</div></ul></div></body></html>