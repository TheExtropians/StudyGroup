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
$email = $_SESSION['login_user'];
$group = $_POST['resultmenu'];
$query = "INSERT INTO studyjoin (email,studyID) VALUES ('$email','$group')";
$querytest = mysqli_query($con, $query);
$_SESSION['group_num'] = $group;
header('Location: ../group.html');
?>