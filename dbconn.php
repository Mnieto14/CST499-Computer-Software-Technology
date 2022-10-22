<?php

class dbconn {
	public $conn;

	function __construct() {
		$this->connection = new mysqli('localhost', 'root', '', 'student_enrollment') or die;
	}
	
    function executeSelectQuery($con,$sql) {
        $result = mysqli_query($con, $sql);
    }
	
	function executeQuery($con,$sql) {
        $result = mysqli_query($con, $sql);
    }
}

$newCon = new dbconn();
?>