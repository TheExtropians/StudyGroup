<?php
session_start();

$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="studygroup";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

$group = $_SESSION['group_num']; 
$location = $_POST['location']; 
$time = $_POST['time']; 
$description = $_POST['description'];
	

	if ($query = mysqli_query($con, "UPDATE studygroup SET studyLocation='$location',studyTime='$time',description='$description' WHERE studyID='$group'")) {
		header('Location: ../group.html');
	}
	else {
		echo 'Connection Failed.';
	}
?>