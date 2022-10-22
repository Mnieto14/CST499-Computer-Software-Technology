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
<div style='margin-bottom:60px' class="container text-center">

<div class="container text-center">
<?php
$newConn = $newCon->connection;
?>
</div>
<div style='margin-bottom:60px' class="container">
<form class="padding-top" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="form-row">
<div class="form-group col-md-12" id="no-padding-left">
<label for="inputClass">Class</label>
<select id="inputClass" class="form-control" name="class" required>
<option>Choose...</option>
<?php

$availableClasssArray = array();
$availableClasssArray = availableClasses($newConn,$_SESSION['selectedYear'],$_SESSION['selectedSemester']);
foreach($availableClasssArray as $data) {
echo "<option>".$data['className']."</option>";
}

?>
</select>
</div>
</div>
<button type="submit" class="btn btn-primary" name="select_class">Submit</button>
<?php 
if (isset($_POST['select_class'])) {
$_SESSION['selectedClass'] = $_POST["class"];
getSemesterId($newConn,$_SESSION['selectedClass'],$_SESSION['selectedYear'],$_SESSION['selectedSemester']);
checkRegistration($newConn,$_SESSION['studentId'],$_SESSION['selectedSemesterId']);
if ($_SESSION['registered'] == 1) {
echo "<p style='padding-top:15px'>Already registered for this class.  Please choose another class.</p>";
} else if ($_SESSION['registered'] == 0) {
numStudentsEnrolled($newConn,$_SESSION['selectedSemesterId']);
maxStudentsInClass($newConn,$_SESSION['selectedSemesterId']);
if ($_SESSION['numStudentsEnrolled'] < $_SESSION['maxStudents']) {
registerForClass($newConn,$_SESSION['studentId'],$_SESSION['selectedSemesterId']);
echo "<p style='padding-top:15px'>You are now registered for ".$_SESSION['selectedClass']." for ".$_SESSION['selectedSemester']." ".$_SESSION['selectedYear'].".</p>";
} 
}
}                
?>
</form>
</div>
<?php require_once 'footer.php';?>
</body>
</html>

<?php
function availableClasses($connection,$year,$semester) {
$items = array();
$getSemester =  "SELECT class.className
FROM class
INNER JOIN semester ON class.class_id = semester.class_id
AND semester.year = $year
AND semester.semester = '$semester'";
$res = mysqli_query($connection, $getSemester); 
while($row = mysqli_fetch_assoc($res)) {
$items[] = $row;
}
print_r($items);
return $items;
}

function getSemesterId($connection,$className,$year,$semester) {
$semesterIdQuery = "SELECT semester.semester_id
FROM semester
INNER JOIN class ON semester.class_id = class.class_id
AND semester.year = $year
AND semester.semester = '$semester'
AND class.className = '$className'";
$res = mysqli_query($connection, $semesterIdQuery);
if (mysqli_num_rows($res) != 0) { 
while($row = mysqli_fetch_assoc($res)) {
$_SESSION['selectedSemesterId'] = $row['semester_id'];
}
}
}

function checkRegistration($connection,$studentId,$semesterId) {
$checkIfRegisteredQuery =  "SELECT COUNT(*) as count
FROM enrollment
WHERE student_id = $studentId AND semester_id = $semesterId";
$res = mysqli_query($connection, $checkIfRegisteredQuery);
if (mysqli_num_rows($res) == 1) { 
while($row = mysqli_fetch_assoc($res)) {
$_SESSION['registered'] = $row['count'];
};
};
};

function numStudentsEnrolled($connection,$semesterId) {
$numStuEnrolledQuery =  "SELECT COUNT(enrollment.semester_id) as 'count'
FROM enrollment
WHERE semester_id = $semesterId";
$res = mysqli_query($connection, $numStuEnrolledQuery);
if (mysqli_num_rows($res) == 1) { 
while($row = mysqli_fetch_assoc($res)) {
$_SESSION['numStudentsEnrolled'] = $row['count'];
};
};
};

function maxStudentsInClass($connection,$semesterId) {
$maxStudentsQuery =  "SELECT class.maxStudents
FROM class
INNER JOIN semester ON semester.class_id = class.class_id
AND semester.semester_id = $semesterId";
$res = mysqli_query($connection, $maxStudentsQuery);
if (mysqli_num_rows($res) == 1) { 
while($row = mysqli_fetch_assoc($res)) {
$_SESSION['maxStudents'] = $row['maxStudents'];
};
};
};

function registerForClass($connection,$studentId,$semesterId) {
$registerQuery =  "INSERT INTO enrollment (student_id, semester_id)
VALUES 
($studentId,$semesterId)";
$res = mysqli_query($connection, $registerQuery);
}
?>