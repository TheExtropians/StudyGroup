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

$graduateyear = $_POST['year'];
$email = $_SESSION['login_user']; 
$major = $_POST['major']; 
$minor = $_POST['minor']; 
$concentration = $_POST['concentration'];
	

	if ($query = mysqli_query($con, "UPDATE student SET graduateYear='$graduateyear',major='$major',minor='$minor',concentration='$concentration' WHERE email='$email'")) {
		header('Location: ../profile.html');
	}
	else {
		echo 'Connection Failed.';
	}
?>