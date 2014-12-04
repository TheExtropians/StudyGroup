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
$comment = $_POST['comment'];
$commentTime = date('m/d/Y H:i:s');
$email = $_SESSION['login_user'];
$query = mysqli_query($con, "SELECT * FROM student WHERE email='$email'");
$result = mysqli_fetch_array($query);
$firstname = $result['firstName'];
$lastname = $result['lastName'];
$creator = $firstname.' '.$lastname;
	if ($query = mysqli_query($con, "INSERT INTO comment (studyID,comment,commentTime,creator) VALUES ('$group','$comment','$commentTime','$creator')")) {
		header('Location: ../group.html');
	}
	else {
		echo 'Connection Failed.';
	}
?>