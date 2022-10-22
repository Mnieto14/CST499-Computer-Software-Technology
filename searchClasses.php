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
<div style='margin-bottom:60px' class="container text-center">

<div class="container text-center">
<h1>Class enrollment</h1>
<h3>Please choose a semester and year<h3>
</div></div>
<?php
$newConn = $newCon->connection;
?>

<div style='margin-bottom:60px' class="container">
<form class="padding-top" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="form-row">
<div class="form-group col-md-6" id="no-padding-left">
<label for="inputSemester">Semester</label>
<select id="inputSemester" class="form-control" name="semester" required>
<option>Choose...</option>
<?php
$semesterArray = array();
$semesterArray = availableSemester($newConn);
foreach($semesterArray as $data) {
    echo "<option>".$data['semester']."</option>";
}
?>
</select>
</div>
<div class="form-group col-md-6" id="no-padding-left">
<label for="inputYear">Year</label>
<select id="inputYear" class="form-control" name="year" required>
<option>Choose...</option>
<?php
$yearsArray = array();
$yearsArray = availableYear($newConn);
foreach($yearsArray as $data) {
    echo "<option>".$data['year']."</option>";
}
?>
</select>
</div>
</div>
<button type="submit" class="btn btn-primary" name="search_classes">Submit</button>
<?php
if (isset($_POST['search_classes'])) {
$_SESSION['selectedSemester'] = $_POST["semester"];
$_SESSION['selectedYear'] = $_POST["year"];

header('location: registerForClass.php');
}

?>
</form>
</div>
<?php
function availableYear($connection) {
    $items = array();
    
    $getSemester =  "SELECT DISTINCT year FROM semester";
    $res = mysqli_query($connection, $getSemester); 
    while($row = mysqli_fetch_assoc($res)) {
    $items[] = $row;
    }
    print_r($items);
    return $items;
    }

function availableSemester($connection) {
$items = array();

$getSemester =  "SELECT DISTINCT semester FROM semester";
$res = mysqli_query($connection, $getSemester); 
while($row = mysqli_fetch_assoc($res)) {
$items[] = $row;
}
print_r($items);
return $items;
}
?>