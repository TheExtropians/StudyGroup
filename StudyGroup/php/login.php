<?php
session_start();
$error = '';
$email=$_POST['username'];
$pass=$_POST['password'];

$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="studygroup";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

$query = mysqli_query($con, "SELECT * FROM student WHERE password='$pass' AND email='$email'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$email; // Initializing Session
$firsttime = mysqli_fetch_array($query);
	if ($firsttime['firstVisit'] == 0) {
		header('Location: ../firsttimesigninpage.html');
	}
	else {
		header('Location: ../sidebar.html');
	}
}
else {
	header('Location: ../login.html');
}
?>