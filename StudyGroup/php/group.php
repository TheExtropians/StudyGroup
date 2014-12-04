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
$group = $_GET['group'];
$_SESSION['group_num'] = $group;
header('Location: ../group.html');
?>