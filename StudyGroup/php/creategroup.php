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

//$con->close();
$email = $_SESSION['login_user'];
$title = htmlentities(htmlspecialchars ($_POST['title']), ENT_QUOTES); 
$classnum = htmlentities(htmlspecialchars ($_POST['classnum']), ENT_QUOTES);
$studyLocation = htmlentities(htmlspecialchars ($_POST['location']), ENT_QUOTES);
$studyTime = htmlentities(htmlspecialchars ($_POST['time']), ENT_QUOTES);
//Find Students Federal Code.
$query = mysqli_query($con, "SELECT * FROM student WHERE email='$email'");
$queryarray = mysqli_fetch_array($query);
$federalcode = $queryarray['federalCode'];
//Create Class in DB
$query = "INSERT INTO class (federalCode,section,name) VALUES ('$federalcode','$classnum','$title')"; 
$querytest = mysqli_query($con, $query);
 
//Add class to student
$class = mysqli_insert_id($con);

//Create a new Study Group
$desc = htmlentities(htmlspecialchars ($_POST['desc']), ENT_QUOTES);
$query = mysqli_query($con, "SELECT * FROM student WHERE email='$email'");
$result = mysqli_fetch_array($query);
$firstname = $result['firstName'];
$lastname = $result['lastName'];
$creator = $firstname.' '.$lastname;
$query = "INSERT INTO studygroup (classID,description,creator,studyLocation,studyTime) VALUES ('$class','$desc','$creator','$studyLocation','$studyTime')";
if ($querytest = mysqli_query($con, $query)) {
	}
	else {
		echo 'Connection Error.';
		echo $class;
		echo $query;
	}
//Add the student to the group
$group = mysqli_insert_id($con);
$query = "INSERT INTO studyjoin (email,studyID) VALUES ('$email','$group')";
if ($querytest = mysqli_query($con, $query)) {
	$_SESSION['group_num'] = $group;
		header('Location: ../group.html');
	}
	else {
		echo 'Connection Error.';
		echo $class;
		echo $query;
	}


	
?>