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

$currentyear = $_POST['currentyear']; 
$graduationdate = $_POST['graduationdate']; 
$email = $_SESSION['login_user']; 
$major = $_POST['major']; 
$minor = $_POST['minor']; 
$concentration = $_POST['concentration'];
	

	if ($query = mysqli_query($con, "UPDATE student SET currentYear='$currentyear',graduateYear='$graduationdate',major='$major',minor='$minor',concentration='$concentration',firstVisit='1' WHERE email='$email'")) {
		header('Location: ../sidebar.html');
	}
	else {
		echo 'Connection Failed.';
	}
?>