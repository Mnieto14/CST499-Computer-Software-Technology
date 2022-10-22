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
<?php
$newConn = $newCon->connection;
if(isset($_SESSION['firstName'])) {
echo "<h1>".$_SESSION['firstName'].' '.$_SESSION['lastName'].", Class schedule</h1>";
echo "<br>";
showClassSchedule($newConn,$_SESSION['studentId']);
}
else {
echo "<h3>Please log in or register</h3>";
};

if (isset($_POST['dropButton'])) {  
echo "<meta http-equiv='refresh' content='0'>";
$_SESSION['dropsemesterId'] = $_POST["drop"];                
dropClass($newConn,$_SESSION['studentId'],$_SESSION['dropsemesterId']);
echo "<p style='padding-top:15px'>Successfully dropped.".$_SESSION['dropClassName']." from ".$_SESSION['dropSemester']." ".$_SESSION['dropYear']."</p>";
numStudentsEnrolled($newConn,$_SESSION['dropsemesterId']);
maxStudentsInClass($newConn,$_SESSION['dropsemesterId']);
};
?>
</div>
<?php include 'footer.php';?>
</body>
</html>
<?php

function showClassSchedule($conn,$studentId) {
$getSchedule =  "SELECT enrollment.student_id, semester.semester_id, class.className, semester.year, semester.semester
FROM ((enrollment
INNER JOIN semester ON enrollment.semester_id = semester.semester_id
AND enrollment.student_id = $studentId)
INNER JOIN class ON class.class_id = semester.class_id)";
$res = mysqli_query($conn, $getSchedule); 
if (mysqli_num_rows($res) != 0) { 
while($row = mysqli_fetch_assoc($res)) {
$semesterId = $row['semester_id'];
$className = $row['className'];
$classYear = $row['year'];
$classSemester = $row['semester'];

echo "<div class='row'>";
echo "<form method='post'>";
echo "<input type='hidden' name='drop' value=".$semesterId.">";
echo "<h2>";
echo "<div class='col-md-6 text-right' >$className &nbsp; $classSemester &nbsp;$classYear &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button style='font-family:sans-serif' type='submit' class='btn btn-danger' name='dropButton'>DROP</button></div>";
echo "</form>";
echo "</div>";
}
} 
};

function dropClass($conn,$studentId,$semesterId) {
$dropQuery =  "DELETE FROM enrollment
WHERE student_id = $studentId AND semester_id = $semesterId";
$res = mysqli_query($conn, $dropQuery);

$getClassInfo =  "SELECT class.className, semester.semester, semester.year
FROM class
INNER JOIN semester ON class.class_id = semester.class_id
AND semester.semester_id = $semesterId";
$res = mysqli_query($conn, $getClassInfo);
if (mysqli_num_rows($res) == 1) { 
while($row = mysqli_fetch_assoc($res)) {
$_SESSION['dropClassName'] = $row['className'];
$_SESSION['dropSemester'] = $row['semester'];
$_SESSION['dropYear'] = $row['year'];
};
};
};

function numStudentsEnrolled($conn,$semesterId) {
$numStuEnrolledQuery =  "SELECT COUNT(enrollment.semester_id) as 'count'
FROM enrollment
WHERE semester_id = $semesterId";
$res = mysqli_query($conn, $numStuEnrolledQuery);
if (mysqli_num_rows($res) == 1) { 
while($row = mysqli_fetch_assoc($res)) {
$_SESSION['numStudentsEnrolled'] = $row['count'];
};
};
};

function maxStudentsInClass($conn,$semesterId) {
$maxStudentsQuery =  "SELECT class.maxStudents
FROM class
INNER JOIN semester ON semester.class_id = class.class_id
AND semester.semester_id = $semesterId";
$res = mysqli_query($conn, $maxStudentsQuery);
if (mysqli_num_rows($res) == 1) { 
while($row = mysqli_fetch_assoc($res)) {
$_SESSION['maxStudents'] = $row['maxStudents'];
};
};
};

function informStudent($conn,$studentId,$semesterId) {
$createInform =  "INSERT INTO inform (student_id, semester_id)
VALUES 
($studentId,$semesterId)";
$res = mysqli_query($conn, $createInform);
};

function registerForClass($conn,$studentId,$semesterId) {
$registerQuery =  "INSERT INTO enrollment (student_id, semester_id)
VALUES 
($studentId,$semesterId)";
$res = mysqli_query($conn, $registerQuery);
}

?>